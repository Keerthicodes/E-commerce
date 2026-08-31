<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        /** @disregard P1013 Undefined method */
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }
    public function checkout(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        if (count($cart) == 0) {
            return redirect('/cart');
        }

        $total = 0;

        foreach ($cart as $id => $item) {

            $product = Product::findOrFail($id);

            if ($product->stock < $item['quantity']) {
                return redirect('/cart')
                    ->with('error', 'Not enough stock for ' . $product->name);
            }

            $total += $item['price'] * $item['quantity'];
        }

        /** @disregard P1013 Undefined method */
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
        ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        foreach ($cart as $id => $item) {

            $product = Product::findOrFail($id);

            $product->stock -= $item['quantity'];

            $product->save();
        }

        $request->session()->forget('cart');

        return redirect('/order/' . $order->id);
    }

    public function show($id)
    {
        /** @disregard P1013 Undefined method */
        $order = Order::with('items')
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('orders.show', compact('order'));
    }
}
