@extends('layouts.app')  <!-- Pastikan layout ini benar-benar ada di direktori layouts -->

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard Pembeli</h1>

    <div class="row">
        <!-- Card untuk Produk yang Dibeli -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Produk yang Dibeli</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">15 Produk</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card untuk Jumlah Pesanan -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8 Pesanan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-receipt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Seksi Info -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card bg-light text-dark shadow">
                <div class="card-body">
                    Selamat datang di Dashboard Pembeli! Di sini, Anda dapat melihat produk-produk yang telah Anda beli dan memantau status pesanan Anda. Kami berkomitmen untuk memberikan pengalaman berbelanja yang terbaik bagi Anda. Jika Anda memiliki pertanyaan atau memerlukan bantuan, jangan ragu untuk menghubungi kami.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
