<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ProductController;
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

// Route::get("/", [WebsiteController::class, 'indexPage']);
// Route::get("/home", [WebsiteController::class, 'homePage']);
// Route::post('/login', [FormController::class, 'userLogin']);

// Website routes
Route::get('/web/master',[WebsiteController::class, 'masterPage'])->name('web-master');
Route::get('/web/',[WebsiteController::class, 'indexPage'])->name('web-index');
Route::get('/web/shop',[WebsiteController::class, 'shopPage'])->name('web-shop');

Route::get('/web/checkout', [WebsiteController::class, 'webCheckoutPage'])->name('web-checkout');
Route::post('/web/placeorder', [WebsiteController::class, 'placeorder'])->name('web-place-order');

// https://127.0.0.1:5467/web/addtocart/1
// https://127.0.0.1:5467/web/addtocart/2
// https://127.0.0.1:5467/web/addtocart/3
// https://127.0.0.1:5467/web/addtocart/4

Route::get('/web/addtocart/{id}', [ProductController::class, 'addToCart'])->name('web-add-to-cart');
Route::get('/web/removefromcart/{id}', [ProductController::class, 'removeFromCart'])->name('web-remove-from-cart');
Route::get('/web/showcart', [ProductController::class, 'showCart'])->name('web-show-cart');
Route::get('/web/emptycart', [ProductController::class, 'emptyCart'])->name('web-empty-cart');


Route::get('/admin/index', [WebsiteController::class, 'adminIndexPage'])->name('admin-index');
Route::get('/admin/master', [WebsiteController::class, 'adminMasterPage'])->name('admin-master');
Route::get('/admin/orders', [WebsiteController::class, 'orders'])->name('admin-orders');
Route::get('admin/orders/delete/{id}', [WebsiteController::class, 'deleteOrder'])->name('delete-order');



Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin-product-create');
Route::post('admin/products/store', [ProductController::class, 'store'])->name('admin-products-store');
Route::get('admin/products/delete/{id}', action: [ProductController::class, 'delete'])->name('admin-products-delete');
Route::get('admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin-products-edit');
Route::put('admin/products/update', [ProductController::class, 'update'])->name('admin-products-update');

