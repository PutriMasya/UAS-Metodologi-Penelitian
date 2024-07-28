@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Order Details</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" value="{{ $order->product->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" value="{{ $order->product->price }}" readonly>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" value="{{ $order->quantity }}" readonly>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" value="{{ $order->address }}"  required>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <input type="text" class="form-control" id="payment_method" value="{{ $order->payment_method }}" readonly>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" value="{{ $order->status }}" readonly>
            </div>
        </div>
    </div>
</div>
@endsection
