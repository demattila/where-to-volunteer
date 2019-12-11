<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function index($locale) {
        app()->setLocale($locale);
        if(in_array($locale,['en','ro','hu'])){
            session(['locale'=> $locale]);
        }
        return back();
    }

}
