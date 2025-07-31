<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function indexPage(){
         return view('main');
    }
    public function homePage(){
        return view('home');
    }
}
