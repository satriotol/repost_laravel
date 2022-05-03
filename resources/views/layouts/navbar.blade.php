<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            {{-- <h1><a href="{{ route('home') }}">PT BPS</a></h1> --}}
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="{{ route('home') }}"><img src="{{ asset('logo.png') }}" alt="" class="img-fluid"></a>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Beranda</a></li>
                <li><a class="nav-link {{ Request::routeIs('galleries') ? 'active' : '' }}"
                        href="{{ route('galleries') }}">Gallery</a></li>
                <li><a class="nav-link {{ Request::routeIs('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">Kontak</a></li>
                <li><a class="nav-link">Investasi</a></li>
                <li><a class="nav-link">Karir</a></li>
                <li><a class="nav-link">FPKK 01</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
