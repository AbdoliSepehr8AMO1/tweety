<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //load the user's timeline
    public function index()
    {
        return view('home', [
            'tweets' => auth()->user()->timeline()
        ]);
    }
}
