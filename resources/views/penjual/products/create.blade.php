@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800"></h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penjual.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" name="price" class="form-control" id="price" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stok</label>
                    <input type="number" name="stock" class="form-control" id="stock" required>
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Tambah Produk</button>
    </form>
</div>
@endsection
