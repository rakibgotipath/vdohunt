<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index(){

        $pageTitle = 'Home Page';
        return view('home',compact('pageTitle'));
    }
}
