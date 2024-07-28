<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard - Kerajinan Tangan</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fc;
    }
    .navbar-custom {
      background-color: #4e73df;
    }
    .hero-section {
      background-color: #ffffff;
      padding: 100px 0;
      text-align: center;
      color: #333;
      border-bottom: 2px solid #4e73df;
    }
    .hero-section h1 {
      font-size: 4rem;
      margin-bottom: 20px;
    }
    .hero-section p {
      font-size: 1.5rem;
      margin-bottom: 30px;
    }
    .btn-custom {
      padding: 10px 20px;
      font-size: 1.2rem;
      border-radius: 25px;
      transition: all 0.3s ease;
    }
    .btn-custom-primary {
      background-color: #4e73df;
      color: white;
    }
    .btn-custom-secondary {
      background-color: #36b9cc;
      color: white;
    }
    .btn-custom-primary:hover {
      background-color: #2e59d9;
    }
    .btn-custom-secondary:hover {
      background-color: #2c9faf;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom navbar-light">
    <a class="navbar-brand text-white" href="#">Kerajinan Tangan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="hero-section">
    <div class="container">
      <h1>Selamat Datang di Dashboard Kerajinan Tangan</h1>
      <p>Temukan produk kerajinan tangan terbaik di sini. Bergabunglah dengan kami untuk mendapatkan lebih banyak informasi.</p>
      <a href="{{ route('login') }}" class="btn btn-custom btn-custom-primary mr-2">Login</a>
      <a href="{{ route('register') }}" class="btn btn-custom btn-custom-secondary">Register</a>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>
