<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::take(6)->get();
        $products = Product::with(['galleries'])->take(8)->get();

        return view('pages.home',[
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function search(Request $request) {
        if($request->has('search')) {
            $products = Product::where('name','LIKE','%'.$request->search.'%')->get();
        }
        else {
            $products = Product::all();
        }
        return view('products.index',['products' => $products]);
    }
}