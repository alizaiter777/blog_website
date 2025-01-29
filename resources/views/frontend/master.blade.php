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
                
                    @auth
                        <!-- User is logged in -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile.show') }}">Profile</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <!-- User is logged out -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
                <!-- Social Links -->
               
              
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Featured Section -->
    <section class="featured">
        @yield('featured')
    </section>

    @if (!request()->is('about','profile'))
    <div class="container d-flex justify-content-center">
        <div class="col-md-6">
        <form method="get" action="/search">
            <div class="input-group input-group-sm">
                <input 
                    type="text" 
                    class="form-control rounded-start w-70" 
                    name="search" 
                    placeholder="Search..." 
                    value="{{ request()->input('search') ?? '' }}"
                    aria-label="Search">

                <button 
                    type="submit" 
                    class="btn btn-primary rounded-end">Search</button>
            </div>
        </form>
    </div>
    </div>
    @endif
    
    <!-- Main Content -->
    <section class="content">
        <div class="container">
            @yield('content')
        </div>
    </section>

    <section class="trending">
        <div class="container">
            @yield('trending')
        </div>
    </section>

    <!-- Instagram Section -->
    <section class="instagram">
        <a href="https://www.instagram.com/blogger/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i> <span>@Blogge</span></a>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="instagram-item">
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="instagram-item-thum">
                                <img src="{{ asset('images/blog/p' . $i . '.png') }}" alt="Image {{ $i }}">
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

    <!-- Vendor JS -->
    <script src="{{ asset('vendor/jQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Additional Scripts -->
    @yield('scripts')
</body>

</html>
