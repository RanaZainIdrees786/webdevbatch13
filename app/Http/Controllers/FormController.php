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

}
