<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderManager extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function paymentProcess(Request $request)
    {
        $request->validate([
            'cardName' => 'required',
            'cardNumber' => 'required',
            'expiryDate' => 'required',
            'cvv' => 'required',
        ]);
        $products = DB::table('cart')
        ->select('cart.product_id', DB::raw('count(*) as quantity'), 'products.title', 'products.price')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('user_id', Auth::id())
        ->groupBy('cart.product_id', 'products.title', 'products.price')
        ->get();
        $products = DB::table(table: 'cart')
            ->select('cart.product_id', DB::raw('count(*) as quantity'), 'products.price')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('user_id', Auth::id())
            ->groupBy('cart.product_id', 'products.price')
            ->get();
        
        $order = new Order();
        $order->user_id = Auth::id();
        $order->product_id = 1;
        $order->address = 'İstanbul/Sancaktepe';
        $order->phone = '5555555555';
    
        // $order->quantity = $products->quantity;
        foreach ($products as $product) {
            $order->total_price += $product->price * $product->quantity;
            $order->quantity = $product->quantity;
        }

        if ($products->isEmpty()) {
            return redirect()->route('showCart')->with('error', 'Sepetinizde ürün bulunamadı');
        } elseif ($order->save()) {
            DB::table('cart')->where('user_id', Auth::id())->delete();
            return redirect()->route('showCart')->with('success', 'Order placed successfully');
        } else {
            return redirect()->route('checkout')->with('error', 'Order failed to place');
        }
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders', compact('orders'));
    }
}
