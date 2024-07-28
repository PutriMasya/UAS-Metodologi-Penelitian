<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Metode untuk menampilkan daftar produk
    public function adminIndex()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Metode untuk menampilkan formulir pembuatan produk
    public function adminCreate()
    {
        return view('admin.products.create');
    }

    // Metode untuk menyimpan produk baru
    public function adminStore(Request $request)
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
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    // Metode untuk menampilkan formulir edit produk
    public function adminEdit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Metode untuk memperbarui produk
    public function adminUpdate(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price', 'stock']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    // Metode untuk menghapus produk
    public function adminDestroy(Product $product)
    {
        // Delete product image if exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    // Metode untuk dashboard admin
    public function index()
    {
        $productsPurchased = Order::count(); // Menghitung jumlah produk yang terjual
        $buyersCount = User::has('orders')->count(); // Menghitung jumlah pembeli yang telah melakukan pemesanan

        return view('admin.dashboard', compact('productsPurchased', 'buyersCount'));
    }
}
