@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Product List</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>${{ $product->price }}</td>
                            <td>
                                <a href="{{ route('pembeli.products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('pembeli.orders.create', $product->id) }}" class="btn btn-primary btn-sm">Buy Now</a>
                                <form action="{{ route('pembeli.products.purchase', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <!-- <button type="submit" class="btn btn-primary btn-sm">Buy Now</button> -->
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
