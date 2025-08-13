<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function addToCart(string $id)
    {
        // dd($id);
        // session based cart
        // cart structure
        // $cart = [
        //     '18' => [
        //         'name' => 'abc',
        //         'price' => 239,
        //         'sku' => '3939UU',
        //         'description' => "lorem ipsum",
        //         'image' => '399303393.jpg',
        //         'quantity' => 5
        //     ],
        //     '21' => [
        //     ],
        //     '22' => [
        //         'name' => 'abc',
        //         'price' => 239,
        //         'sku' => '3939UU',
        //         'description' => "lorem ipsum",
        //         'image' => '399303393.jpg',
        //         'quantity' => 3
        //          ]
        // ];

        // extracting product from db
        $product = Product::findOrFail($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // when product will be added first time in the cart
            $cart[$id] = [
                "name" => $product->name,
                "sku" => $product->sku,
                "price" => $product->price,
                "description" => $product->description,
                "image" => $product->image,
                "quantity" => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function showCart()
    {
        $cart = session()->get('cart');
        dump($cart);
    }


    public function emptyCart()
    {
        session()->forget('cart');
        echo "cart is empty now";
    }
}
