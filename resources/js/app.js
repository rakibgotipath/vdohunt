import './bootstrap';

import '@uppy/core/dist/style.min.css';
import '@uppy/dashboard/dist/style.min.css';

import Uppy from '@uppy/core';
import Dashboard from '@uppy/dashboard';
import Tus from '@uppy/tus';
import { sha256 } from 'js-sha256';


const libraryId = '159432';
const accessKey = '778a3f1e-b1a5-49d9-bd75950f187d-0635-42f6';
const collectionId = 'c4938419-1616-40bb-afa2-5e6913e08e2b';
let videoId;

async function createVideoInBunny(file){
    const res = await fetch(`https://video.bunnycdn.com/library/${libraryId}/videos`, {
        method: 'POST',
        headers: {
            'accept': 'application/json',
            'content-type': 'application/*+json',
            AccessKey: accessKey,
        },
        body: JSON.stringify({
            collectionId: collectionId,
            title: file.name,
        }),
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error('Network response was not ok, ' + response.status + ' ' + response.statusText);
        }
        return response.json();
    }).catch((error) => {
        alert(error)
        throw error;
    });

    return res.guid;
}

async function setVideoId(file){
    if(!videoId){
        videoId = await createVideoInBunny(file);
    }
}

const uppy = new Uppy({
    onBeforeFileAdded(file, files){
        setVideoId(file);
    }
})
uppy.use(Dashboard, {
    target: '#uppy',
    inline: true,
    autoProceed: true,
    maxNumberOfFiles: 1,
    showProgressDetails: true,
    // hidePauseResumeButton: true,
    hideProgressAfterFinish: true,
    note: 'Video only, 10MB max, one file',
    restrictions: {
        maxFileSize: 10000000,
        allowedFileTypes: ['video/*']
    },
    locale: {
        strings: {
            dropPaste: 'Drop video here or %{browse}',
            browse: 'browse'
        }
    }
    
})
.use(Tus, { 
    endpoint: `https://video.bunnycdn.com/tusupload`, 
    headers: (file) => {
        const expirationTime = file.meta.expires > Date.now() ? file.meta.expires : Date.now() + 60 * 60 * 1000;
        return {
            AuthorizationSignature: sha256(libraryId + accessKey + expirationTime + videoId),
            AuthorizationExpire: expirationTime,
            VideoId: videoId,
            LibraryId: libraryId,
        };
    },
    onShouldRetry(err, retryAttempt, options, next) {
        if (err?.originalResponse?.getStatus() === 401) {
            return true;
        }
        return next(err);
    },
    async onAfterResponse(req, res) {
        console.log(req, res);
    },
})
.on('complete', (result) => {
    result.successful.forEach(function(file) {
        $.ajax({
            url: window.appConfig.uploadUrl,
            type: "POST",
            data: {
                name: file.name,
                bunny_id: videoId,
            },
            headers: {
                'X-CSRF-TOKEN': window.appConfig.token,
            },
            success: function(response) {
                console.log(response)
                if (response.status == 'success') {
                    window.location.href = window.appConfig.uploadUrl;
                }
            }
        })
    })
})