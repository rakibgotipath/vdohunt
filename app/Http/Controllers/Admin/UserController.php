<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $pageTitle = 'All Users';
        $users = User::orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.user.index', compact('pageTitle', 'users'));
    }

    public function verified()
    {
        $pageTitle = 'Verified Users';
        $users = User::whereNotNull('email_verified_at')->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.user.index', compact('pageTitle', 'users'));
    }

    public function unverified()
    {
        $pageTitle = 'Unverified Users';
        $users = User::whereNull('email_verified_at')->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.user.index', compact('pageTitle', 'users'));
    }
}
