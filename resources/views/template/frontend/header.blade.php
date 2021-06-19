<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo">
            <a href="{{ webPath('/') }}">
                <img src="{{ asset('vendor/front/assets/example/img/favicon.png') }}" alt="Logo">
            </a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="{{ webPath('/profiles') }}">PROFILE</a></li>
                <li><a class="nav-link scrollto" href="{{ webPath('/programs') }}">PROGRAM</a></li>
                <li><a class="nav-link scrollto" href="{{ webPath('/donation') }}">DONATION</a></li>
                <li><a class="nav-link scrollto" href="{{ webPath('/gallery') }}">GALLERY</a></li>
                <li><a class="nav-link scrollto" href="{{ webPath('/regions') }}">REGIONAL</a></li>
                <li><a class="nav-link scrollto" href="{{ webPath('/contact') }}">CONTACT</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->