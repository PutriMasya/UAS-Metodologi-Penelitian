<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PenjualOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['product', 'user'])->whereHas('product', function($query) {
            $query->where('user_id', auth()->id());
        })->get();

        return view('penjual.orders.index', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('penjual.orders.index')->with('success', 'Order status updated successfully!');
    }
}
