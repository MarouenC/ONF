<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Newhomecontroller extends Controller{
    public function index()
    {
        return view('home');
    }
}
