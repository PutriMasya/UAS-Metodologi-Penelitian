<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route(auth()->user()->role . '.dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route(auth()->user()->role . '.dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Nav Item - Produk (for Admin and Penjual) -->
  @if (auth()->user()->role == 'admin' || auth()->user()->role == 'penjual')
    <li class="nav-item">
      <a class="nav-link" href="{{ route(auth()->user()->role . '.products.index') }}">
        <i class="fas fa-fw fa-box"></i>
        <span>Produk</span>
      </a>
    </li>
  @endif

  <!-- Nav Item - Pesanan (for Penjual) -->
  @if (auth()->user()->role == 'penjual')
    <li class="nav-item">
      <a class="nav-link" href="{{ route('penjual.orders.index') }}">
        <i class="fas fa-fw fa-shopping-cart"></i>
        <span>Pesanan</span>
      </a>
    </li>
  @endif

  <!-- Nav Item - Produk (for Pembeli) -->
  @if (auth()->user()->role == 'pembeli')
    <li class="nav-item">
      <a class="nav-link" href="{{ route('pembeli.products.index') }}">
        <i class="fas fa-fw fa-box"></i>
        <span>Produk</span>
      </a>
    </li>
  @endif

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>