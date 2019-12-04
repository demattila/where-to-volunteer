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
//        $this->middleware('auth:web')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function home()
    {
        return view('shared.home');
    }

    public function about(){
        if(auth()->guard('web')->check()){
            $user = auth()->guard('web')->user();
        }
        if(auth()->guard('web_organization')->check()){
            $user = auth()->guard('web_organization')->user();
        }
        return view('shared.about',['user' => $user]);
    }
}
