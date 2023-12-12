<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::any('/videos/bunny-webhook', function (Request $request) {

    logger($request->all());

    $video = \App\Models\Video::where('bunny_id', $request->VideoGuid)->first();

    if ($video && in_array($request->Status, [1, 2, 3, 4, 5])) {
        $video->update([
            'video_status' => $request->Status
        ]);
    }
    return response()->json(['success' => true]);
});

// vz-3f49454f-315.b-cdn.net/{video_id}/playlist.m3u8
//https://{pull_zone_url}.b-cdn.net/{video_id}/1.jpg
//https://{pull_zone_url}.b-cdn.net/{video_id}/preview.webp