<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        $pageTitle = 'Upload';
        return view('user.upload', compact('pageTitle'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bunny_id' => 'required',
        ]);

        $video = new Video();
        $video->user_id = auth()->user()->id;
        $video->name = $request->name;
        $video->bunny_id = $request->bunny_id;
        $video->save();

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Video uploaded successfully',
                'video' => $video,
            ]
        );
    }
}
