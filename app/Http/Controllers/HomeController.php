<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product_categories_options = Product::getCategoriesOptions();
        $product_location_options = Product::getLocationOptions();
        return view ('home', compact('product_categories_options', 'product_location_options'));    }
}
