<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebhookController extends Controller{

    public function handle(Request $request) {
        $request->validate([
            'guid' => 'required',
            'status' => 'required',
            'url' => 'required',
        ]);

        $bunnyVideoId = $request->guid;

        // UploadedVideo::where('bunny_video_id', $bunnyVideoId)->update([
        //     'status' => $request->status,
        //     'url' => $request->url,
        // ]);

        return response()->json([
            'success' => true,
        ]);
    }

}