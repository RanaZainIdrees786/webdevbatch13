<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\File;


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
                "quantity" => 1,
                "brand" => $product->brand->name
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

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('web-shop');
    }


    function create()
    {
        $brands = Brand::all();
        // dd($brands);
        return view('admin.create_prod_form', [
            'brands' => $brands
        ]);
    }


    function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        // new record in data
        $product->save();

        if ($request->image != "") {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext; // Unique image name;

            // save image to products directory
            $image->move(public_path('/uploads/products'), $imageName);

            // save image name in the database
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route("admin-index");
    }

    function delete($id)
    {
        $product = Product::findOrFail($id);
        // if ($product->image != "") {
        //     // delete associated image file
        //     File::delete(public_path('/uploads/products/' . $product->image));
        // }
        $product->delete();

        return redirect()->route('admin-index');
    }

    function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        return view('admin.edit_prod_form', [
            'product' => $product,
            'brands' => $brands
        ]);
    }

    function update(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->save();

        // if ($request->image != "") {
        //     // delete old image
        //     File::delete(public_path('uploads/products/' . $product->image));
        //     // Create new image file name
        //     $image = $request->image;
        //     $ext = $image->getClientOriginalExtension();
        //     $imageName = time() . '.' . $ext; // unique Image Name

        //     //save image to the public directory
        //     $image->move(public_path('uploads/products/'), $imageName);
        //     $product->image = $imageName;
        //     $product->save();
        // }

        return redirect()->route('admin-index');
    }



}
