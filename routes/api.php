<?php

use App\Http\Controllers\RiderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Rider;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('getriders', [RiderController::class, 'getAllRiders']);
Route::post('/createRider', action: [RiderController::class, 'createRider']);
