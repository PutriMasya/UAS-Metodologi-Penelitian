@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Konfirmasi Pembelian</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h3>{{ $product->name }}</h3>
            <p><strong>Price:</strong> ${{ $product->price }}</p>
            <p>{{ $product->description }}</p>

            <form action="{{ route('pembeli.products.purchase', $product->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1" required>
                </div>
                <button type="submit" class="btn btn-primary">Place Order</button>
            </form>
        </div>
    </div>
</div>
@endsection
