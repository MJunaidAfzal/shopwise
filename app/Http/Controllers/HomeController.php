<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->type == 'user'){
            $title = 'User Dashboard';
            return view('user.dashboard', compact('title'));
        }
        elseif(auth()->user()->type == 'reader'){
            $title = 'Reader Dashboard';
            return view('reader.dashboard',compact('title'));
        }
    }
}
