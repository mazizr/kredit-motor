@section('css')
    <style>
        .teks-putih {
            color: beige;
        }
    </style>
@endsection
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container">
    <a class="navbar-brand teks-putih" href="{{ url('/') }}">KreMo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active teks-putih"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
        <li class="nav-item active teks-putih"><a href="{{ url('/shop') }}" class="nav-link">Penjualan</a></li>
        <li class="nav-item teks-putih"><a href="{{ url('/about') }}" class="nav-link">Tentang Kami</a></li>
    </ul>
    </div>
</div>
</nav>
<!-- END nav -->