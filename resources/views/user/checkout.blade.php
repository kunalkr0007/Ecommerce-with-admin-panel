<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

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
                        <li class="nav-item">
                            <a class="nav-link" href="products.html">Our Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('showcart') }}">Cart</a>
                        </li>


                        <li class="nav-item">
                            @if (Route::has('login'))

                                @auth
                            <li> <a href="{{ url('/dashboard') }} "class="nav-link">Dashboard</a> </li>

                            <li class="nav-item"> <x-app-layout>
                                </x-app-layout> </li>
                        @else
                            <li> <a href="{{ route('login') }}" class=" nav-link btn btn-outline-danger btn-sm">Log in</a>
                            </li>

                            @if (Route::has('register'))
                                <li> <a href="{{ route('register') }}"
                                        class=" nav-link btn btn-outline-primary btn-sm">Register</a> </li>
                            @endif
                        @endauth

                        @endif
                        </li>



                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->

    <!-- Banner Ends Here -->

    <div class="container" style="padding: 120px">
        <div class="table-responsive">
            <table class="table table-bordered  text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col" style="width: 100px">Total</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sno = 1;
                    @endphp
                    <form method="post" action="{{url('/checkout')}}">
                        @csrf

                    @foreach ($carts as $cart)
                        <tr>


                            <th scope="row">{{ $sno }}</th>
                            {{-- {{dd($product-)}} --}}
                            <td>{{ $cart->title }} </td>
                            <input type="hidden" name="title[]" value="{{ $cart->title }}">
                            <td> <img src="{{ asset('storage/' . $cart->image) }}"
                                    style="width: 100px;height:70px;border-radius:0" alt="">
                            </td><input type="hidden" name="image[]" value="{{ $cart->image }}">
                            <td>{{ $cart->description }}</td><input type="hidden" name="description[]" value="{{ $cart->description }}">
                            <td>{{ $cart->price }} </td><input type="hidden" name="price[]" value="{{ $cart->price }}">
                            <td>x {{ $cart->quantity }}</td><input type="hidden" name="quantity[]" value="{{ $cart->quantity }}">
                            <td>{{ $cart->quantity * $cart->price }}</td>
                            <td> <a href="{{url('/deletecart',$cart->id)}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @php
                            $sno++;
                        @endphp
                    @endforeach
                     

                    <tr class="">
                        <th colspan="6">Final</th>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($carts as $cart)
                            @php
                                $total = $total + $cart->quantity * $cart->price;

                            @endphp
                        @endforeach
                        <td> {{ $total }} </td>
                        <td><button type="submit" class="btn btn-success">Checkout</button></td>
                    </tr>

                    </form>

                </tbody>
            </table>

        </div>
    </div>





    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.

                            - Design: <a rel="nofollow noopener" href="https://templatemo.com"
                                target="_blank">TemplateMo</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>


</body>

</html>
