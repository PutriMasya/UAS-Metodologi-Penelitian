<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PembeliOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        return view('pembeli.orders.index', compact('orders'));
    }

    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('pembeli.orders.create', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'address' => 'required|string'
        ]);

        $order = new Order();
        $order->product_id = $request->product_id;
        $order->user_id = auth()->id();
        $order->quantity = $request->quantity;
        $order->payment_method = $request->payment_method;
        $order->address = $request->address;
        $order->status = 'Ordered'; // Status default
        $order->save();

        return redirect()->route('pembeli.orders.index')->with('success', 'Order placed successfully!');
    }

    public function show($id)
    {
        $order = Order::with(['product', 'user'])->findOrFail($id);
        return view('pembeli.orders.show', compact('order'));
    }
}
