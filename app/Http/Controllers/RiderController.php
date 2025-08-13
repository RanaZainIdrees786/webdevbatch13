<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Rider;

class RiderController extends Controller
{
    public function getAllRiders(Request $request)
    {
        // gettting data from database using model
        $riders = Rider::all();

        // sending data in the json format to the end user
        return response()->json([
            'riders' => $riders,
        ], 200);

    }
    public function createRider(Request $request)
    {
        $newRider = new Rider();
        $newRider->name = $request->name;
        $newRider->email = $request->email;
        $newRider->password = $request->password;
        $newRider->phone = $request->phone;
        $newRider->save();

        return response()->json([
            'message' => "rider created succesfully"
        ], $status = 201);

    }
}
