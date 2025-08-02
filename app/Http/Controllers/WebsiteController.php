<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Rider;


class WebsiteController extends Controller
{
    public function indexPage(){
         return view('main');
    }
    public function homePage(){
        // ----> sql ---> select * from riders;
        $riders = Rider::all();
        return view('home', ['riders' => $riders]);
    }
}
