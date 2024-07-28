<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class PembeliController extends Controller
{
    // Metode untuk menampilkan daftar produk
    public function pembeliIndex()
    {
        $products = Product::all();
        return view('pembeli.products.index', compact('products'));
    }

    // Metode untuk menampilkan detail produk
    public function pembeliShow(Product $product)
    {
        return view('pembeli.products.show', compact('product'));
    }

    // Metode untuk menampilkan formulir pemesanan
    public function buyNow(Product $product)
    {
        return view('pembeli.products.purchase', compact('product'));
    }

    // Metode untuk menyimpan pesanan
    public function purchase(Request $request, Product $product)
    {
        $user = auth()->user();
        
        // Validasi data pesanan
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Membuat pesanan
        Order::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => $request->input('quantity'),
            'status' => 'pending',
        ]);

        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('pembeli.dashboard')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function ordersIndex()
{
    $orders = Order::where('user_id', auth()->id())->get();
    return view('pembeli.orders.index', compact('orders'));
}

// Metode untuk menampilkan detail pesanan
public function orderShow(Order $order)
{
    // Pastikan hanya pesanan milik pengguna yang bisa dilihat
    if ($order->user_id !== auth()->id()) {
        abort(403);
    }
    return view('pembeli.orders.show', compact('order'));
}
    
    
    // Metode untuk dashboard pembeli
    public function index()
    {
        return view('pembeli.dashboard');
    }
}
