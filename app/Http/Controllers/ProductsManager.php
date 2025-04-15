<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsManager extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
}
