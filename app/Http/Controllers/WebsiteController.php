<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rider;
use App\Models\Brand;
use App\Models\Product;

class WebsiteController extends Controller
{
    public function indexPage()
    {
        //  return view('main');
        return view('web.index');
    }
    public function homePage()
    {
        // ----> sql ---> select * from riders;
        // $riders = Rider::all();
        // return view('home', ['riders' => $riders]);
        return view('home');
    }
    public function shopPage()
    {
        $product = Product::findOrFail(1);
        // dd($product->brand->name);

        // dd($product);
        $brands = Brand::all();
        $products = Product::all();
        return view('web.shop', [
            'brands' => $brands,
            'products' => $products
        ]);
    }

    public function masterPage()
    {
        return view('web.master');
    }


    public function webCheckoutPage()
    {
        return view('web.checkout');
    }

    public function placeorder(Request $request)
    {
        // Not Implemented yet

    }

}
