<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pageTitle = "Dashboard";

        $widget['total_videos'] = Video::count();
        $widget['pending_videos'] = Video::where('status', 0)->count();
        $widget['approved_videos'] = Video::where('status', 1)->count();
        $widget['rejected_videos'] = Video::where('status', 2)->count();

        return view('admin.dashboard', compact('pageTitle', 'widget'));
    }
}
