<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <h2>Sixteen <em>Clothing</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="products.html">Our Products</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="/">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Contact Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('showcart') }}"><img width="22" height="22"
                                    style="margin-right: 5px"
                                    src="https://img.icons8.com/color/22/shopping-cart--v1.png"
                                    alt="shopping-cart--v1" />Cart
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                    style="margin-left: 5px">
                                    {{Auth::id() ? count($carts) : "" }}
                                    {{-- <span class="visually-hidden">unread messages</span> --}}
                                </span></a>
                        </li>


                        <li class="nav-item">
                            @if (Route::has('login'))

                                @auth

                                    @if (auth()->user()->usertype == 1)
                            <li> <a href="{{ url('/dashboard') }} "class="nav-link ">Dashboard</a> </li>
                            @endif
                        @else
                            <li> <a href="{{ route('login') }}" style="margin-inline-end: 5px" class=" nav-link btn btn-outline-danger btn-sm">Log in</a>
                            </li>

                            @if (Route::has('register'))
                                <li> <a href="{{ route('register') }}"
                                        class=" nav-link btn btn-outline-primary btn-sm">Register</a> </li>
                            @endif


                        @endauth

                        @endif
                        </li>


                    </ul>
                    @auth
                        <div class="dropdown col-md-2">
                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->name }}
                            </button>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ url('/orders')}}">Orders</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li><button class="dropdown-item" type="submit">Logout</button></li>
                                </form>
                            </ul>
                        </div>

                    @endauth

                </div>
            </div>
        </nav>
    </header>