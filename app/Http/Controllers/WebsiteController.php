<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rider;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Order;

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
        // $product = Product::findOrFail(1);
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
        $order = new Order();
        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->address = $request->address;
        $order->contact = $request->contact;
        $order->email = $request->email;
        $order->total = $request->total; // input type hidden

        $order->save();
        // Empty the Cart
        session()->forget(keys: 'cart');

        // Flash Message
        session()->flash('success', '🎉 Your order has been placed successfully!');

        return redirect()->back();

    }

    public function adminIndexPage()
    {
        // fetching data from database
        $products = Product::all();

        return view('admin.adminindex', [
            'products' => $products
        ]);
    }

    public function adminMasterPage()
    {
        return view('admin.adminmaster');
    }

    public function orders()
    {

        $orders = Order::all();
        return view('admin.orders', [
            'orders' => $orders
        ]);
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back();
    }
}
