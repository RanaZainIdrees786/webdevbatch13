<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rider;

class FormController extends Controller
{
    public function userLogin(Request $request)
    {
        if ($request->email == 'abc@gmail.com' && $request->password == 'pak12345') {
            echo 'login successfull';
        } else {
            echo 'Invalid Credentials';
        }
    }
    public function createRider(Request $request){
        $newRider = new Rider();
        $newRider->name = "mubeen";
        $newRider->email = "mubeen@gmail.com";
        $newRider->password = "mubeen123";
        $newRider->phone = "1234567890";
        $newRider->save();
        echo "rider created successfully";
    }
}
