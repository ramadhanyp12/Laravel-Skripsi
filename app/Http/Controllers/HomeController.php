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
        $products = Product::with(['galleries'])->where('stock','!=',0)->get();

        return view('pages.home',[
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function search(Request $request) {
        if($request->has('search')) {
            $categories = Category::all();
            $products = Product::where('name','LIKE','%'.$request->search.'%')->get();
        }
        else {
            $categories = Category::all();
            $products = Product::all();
        }
        return view('pages.home',[
            'categories' => $categories,
            'products' => $products
        ]);
    }
}