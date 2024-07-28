@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Detail Produk</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h3>{{ $product->name }}</h3>
            <p><strong>Price:</strong> ${{ $product->price }}</p>
            <p>{{ $product->description }}</p>
            <form action="{{ route('pembeli.products.purchase', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Buy Now</button>
            </form>
        </div>
    </div>
</div>
@endsection
