<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function detail($id)
    {
        $product = Product::find($id);
        return view('/details')->with('product', $product);
    }

    public function checkout($id)
    {
        if (Auth::id() == $id) {
            $user = User::find($id);
            return view('checkout')->with('user', $user);
        } else {
            return back();
        }
    }
    public function show()
    {
        $products = Product::all();
        $products = Product::orderBy('id', 'desc')->paginate(9);
        return view('products')->with('products', $products);
    }

    public function men()
    {
        $products = Product::all();
        $products = Product::orderBy('id', 'desc')->paginate(9);
        return view('category.products-men')->with('products', $products);
    }
    public function women()
    {
        $products = Product::all();
        $products = Product::orderBy('id', 'desc')->paginate(9);
        return view('category.products-women')->with('products', $products);
    }
}
