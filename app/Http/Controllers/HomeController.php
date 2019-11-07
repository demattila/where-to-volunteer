<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        dump('User vol: '.Auth::guard('web')->user());
        dump('User org: '.Auth::guard('web_organization')->user());
        return view('index');
    }

    public function home()
    {
        return view('home');
    }

    public function about(){
        return view('about');
    }
}
