<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// http://127.0.0.1:8000/
// VERB: GET
// VERB: PUT
// VERB: POST
// VERB: DELETE

// http://127.0.0.1:8000/home
// VERB: GET
// VERB: PUT
// VERB: POST
// VERB: DELETE

// http://127.0.0.1:8000/contact
// http://127.0.0.1:8000/aboutus
// http://127.0.0.1:8000/register
// http://127.0.0.1:8000/login


// HTTP----> Hypertext transfer protocol
// [ GET, PUT, POST, DELETE ]



Route::get("/", [WebsiteController::class, 'indexPage']);
Route::get("/home", [WebsiteController::class, 'homePage']);

Route::post('/login', [FormController::class, 'userLogin']);




// Route::get('/', function () {
//     return view('welcome');
// });
