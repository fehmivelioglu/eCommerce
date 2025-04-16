<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductsManager extends Controller
{
    public function index()
    {
        $products = Product::paginate(2);
        return view('products', compact('products'));
    }

    public function details($id)
    {
        $product = Product::find($id);
        return view('details', compact('product'));
    }

    public function addToCart($id)
    {
        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->product_id = $id;
        if ($cart->save()) {
            return redirect()->back()->with('success', 'Ürün sepete eklendi');
        }
        return redirect()->back()->with('error', 'Ürün sepete eklenemedi');
    }

    public function showCart()
    {
        $products = DB::table('cart')
            ->select('cart.product_id', DB::raw('count(*) as quantity'), 'products.title', 'products.price')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('user_id', Auth::id())
            ->groupBy('cart.product_id', 'products.title', 'products.price')
            ->get();
        return view('cart', compact('products'));
    }
}
