<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow, noimageindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Blogge | Personal Blog Site')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon">

    <!-- Additional Styles -->
    @yield('styles')
</head>

<body>
    
    <!-- Navbar Start -->
    <nav class="main-nav navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="logo-main" src="{{ asset('images/logo.svg') }}" alt="Logo">
            </a>
            <!-- Toggle Button -->
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mainNav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse nav-list" id="mainNav">
                <!-- Navigation Links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                </ul>
                <!-- Social Links -->
                <ul class="main-nav-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Featured Section -->
    <section class="featured">
        @yield('featured')
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container">
            @yield('content')
        </div>
    </section>

    <!-- Instagram Section -->
    <section class="instagram">
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> <span>@Mary_Astor</span></a>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="instagram-item">
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="instagram-item-thum">
                                <img src="{{ asset('images/blog/case-studies-' . $i . '.png') }}" alt="Image {{ $i }}">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="footer-logo">
                        <img src="{{ asset('images/logo.svg') }}" alt="Logo">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="footer-nav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="sociale-icon">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="copy-right">
                        <p>© Copyright {{ date('Y') }} - All Rights Reserved by <a href=""
                                target="_blank">Ali zaiter</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9rV6yesIygoVKTD6QLf_iCa9eiIIHqZ0&libraries=geometry"></script>
    <!-- Vendor JS -->
    <script src="{{ asset('vendor/jQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('vendor/g-map/gmap.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Additional Scripts -->
    @yield('scripts')
</body>

</html>
