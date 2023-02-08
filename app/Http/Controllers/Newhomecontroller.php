<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;

class Newhomecontroller extends Controller{
    public function index()
    {
        $product_categories_options = Product::getCategoriesOptions();
        $product_location_options = Product::getLocationOptions();
        return view ('home', compact('product_categories_options', 'product_location_options'));    
    }
}
