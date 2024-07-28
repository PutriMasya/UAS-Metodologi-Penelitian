<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class PenjualController extends Controller
{
    // Metode untuk menampilkan daftar produk
    public function penjualIndex()
    {
        $products = Product::where('user_id', auth()->id())->get();
        return view('penjual.products.index', compact('products'));
    }

    // Metode untuk menampilkan formulir pembuatan produk
    public function penjualCreate()
    {
        return view('penjual.products.create');
    }

    // Metode untuk menyimpan produk baru
    public function penjualStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = $request->only(['name', 'description', 'price', 'stock']);
        $product['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $product['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($product);
        return redirect()->route('penjual.products.index')->with('success', 'Product created successfully.');
    }

    // Metode untuk menampilkan formulir edit produk
    public function penjualEdit(Product $product)
    {
        // Pastikan penjual hanya dapat mengedit produknya sendiri
        if ($product->user_id != auth()->id()) {
            abort(403);
        }

        return view('penjual.products.edit', compact('product'));
    }

    // Metode untuk memperbarui produk
    public function penjualUpdate(Request $request, Product $product)
    {
        // Pastikan penjual hanya dapat memperbarui produknya sendiri
        if ($product->user_id != auth()->id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price', 'stock']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        return redirect()->route('penjual.products.index')->with('success', 'Product updated successfully.');
    }

    // Metode untuk menghapus produk
    public function penjualDestroy(Product $product)
    {
        // Pastikan penjual hanya dapat menghapus produknya sendiri
        if ($product->user_id != auth()->id()) {
            abort(403);
        }

        $product->delete();
        return redirect()->route('penjual.products.index')->with('success', 'Product deleted successfully.');
    }

    // Metode untuk menampilkan daftar pesanan
    public function orders()
    {
        $orders = Order::with(['product', 'user'])->whereHas('product', function($query) {
            $query->where('user_id', auth()->id());
        })->get();

        return view('penjual.orders.index', compact('orders'));
    }

    // Metode untuk menampilkan detail pesanan
    public function orderShow($id)
    {
        $order = Order::with(['product', 'user'])->findOrFail($id);
        return view('penjual.orders.show', compact('order'));
    }

    // Metode untuk mengonfirmasi pesanan
    public function confirmOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Accepted';
        $order->save();

        return redirect()->route('penjual.orders.index')->with('success', 'Order confirmed successfully!');
    }

    // Metode untuk menandai produk sebagai sudah diantar
    public function markAsDelivered(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Delivered';
        $order->save();

        return redirect()->route('penjual.orders.index')->with('success', 'Order marked as delivered!');
    }

    // Metode untuk dashboard penjual
    public function index()
    {
        return view('penjual.dashboard');
    }
}
