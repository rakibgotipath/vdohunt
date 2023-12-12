<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $pageTitle = 'All Videos';
        $videos = Video::latest()->paginate(getPaginate());
        return view('admin.video.index', compact('pageTitle', 'videos'));
    }

    public function pending()
    {
        $pageTitle = 'Pending Videos';
        $videos = Video::where('status', 0)->latest()->paginate(getPaginate());
        return view('admin.video.index', compact('pageTitle', 'videos'));
    }

    public function approved()
    {
        $pageTitle = 'Approved Videos';
        $videos = Video::where('status', 1)->latest()->paginate(getPaginate());
        return view('admin.video.index', compact('pageTitle', 'videos'));
    }

    public function rejected()
    {
        $pageTitle = 'Rejected Videos';
        $videos = Video::where('status', 2)->latest()->paginate(getPaginate());
        return view('admin.video.index', compact('pageTitle', 'videos'));
    }

    public function approve($id)
    {
        $video = Video::findOrFail($id);
        $video->update(['status' => 1]);
        $notify[] = ['success', 'Video has been approved.'];
        return back()->withNotify($notify);
    }

    public function reject($id)
    {
        $video = Video::findOrFail($id);
        $video->update(['status' => 2]);
        $notify[] = ['success', 'Video has been rejected.'];
        return back()->withNotify($notify);
    }

    public function show($id)
    {
        $pageTitle = 'Video Details';
        $video = Video::findOrFail($id);
        return view('admin.video.show', compact('pageTitle', 'video'));
    }
}
