<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe -  Cart</title>
<!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-klassy-cafe.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">

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


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="{{ asset('assets/images/klassy-logo.png') }}" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ route('site-url') }}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>

                        <!--
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>
                            <li class="scroll-to-section">
                                <a href="{{ route('show-cart', Auth::user()->id) }}"><i class="fa fa-shopping-cart"></i>
                                    <span  class="lea-cart-num">
                                        @auth
                                            {{ $count }}
                                        @endauth
                                        @guest
                                            0
                                        @endguest
                                    </span></a>
                            </li>

                            @if (Route::has('login'))
                                @auth
                                    <li><x-app-layout></x-app-layout></li>
                                @else
                                    <li><a href="{{ route('login') }}" class="">Log in</a></li>

                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}" class="">Register</a></li>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Klassy Week</h6>
                        <h2>Your Cart</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b">

                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible flex justify-between pr-4 text-xl align-items-center">
                                    <strong>{{ session()->get('success') }}</strong>
                                    <a href="#" class="close text-4xl" data-dismiss="alert" aria-label="close">&times;</a>
                                </div>
                            @endif

                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="text-center">
                                        <th class="border py-2 px-1 w-16">Id</th>
                                        <th class="border py-2 px-1 w-28">Image</th>
                                        <th class="border py-2 px-1">Name</th>
                                        <th class="border py-2 px-1 w-1/6">Price</th>
                                        <th class="border py-2 px-1">Quantity</th>
                                        <th class="border py-2 px-1 w-1/6">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        function getImageUrl($image) {
                                            if(str_starts_with($image, 'http')) {
                                                return $image;
                                            }
                                            return asset('storage/uploads') . '/' . $image;
                                        }
                                    @endphp

                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td class="border py-2 px-1 w-8 text-center">
                                                {{ $cart->id }}
                                            </td>
                                            <td class="border py-2 px-1 text-center">
                                                <img src="{{ getImageUrl($cart->foodimage) }}" class="mx-auto rounded w-20 h-20" alt="">
                                            </td>
                                            <td class="border py-2 px-1 text-center text-capitalize">
                                                {{ $cart->name }}
                                            </td>
                                            <td class="border py-2 px-1 text-center font-bold">
                                                ${{ $cart->price }}
                                            </td>
                                            <td class="border py-2 px-1 text-center">
                                                {{ $cart->quantity }}
                                            </td>
                                            <td class="border py-2 px-1 text-center">
                                                <div class="flex justify-center">
                                                    {{-- <a href="{{ route('edit-food', $food->id) }}" class="text-white bg-emerald-400 px-3 py-1 mr-2">Edit</a> --}}
                                                    <a href="{{ route('remove-cart', $cart->id) }}" onclick="return confirm('Are you sure to remove this?')" class="text-white bg-red-500 hover:bg-red-600  px-3 py-1 mr-2 capitalize">remove</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="text-center mt-4">
                                <button id="order-form" class="btn btn-primary">Order Now</button>
                            </div>

                            <div class="order-form" id="apper" style="max-width: 480px; margin: 0 auto; display: none;">

                                <div class="mt-6">
                                    <div class="mt-4 flex justify-between">
                                        <label for="name" class="formLabel">Name:</label>
                                        <input type="text" name="name" class="formInput" value="{{ old('name') }}">

                                        @error('name')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-4 flex justify-between">
                                        <label for="price" class="formLabel">phone:</label>
                                        <input type="text" name="price" class="formInput" value="{{ old('price') }}">

                                        @error('price')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-4 flex justify-between">
                                        <label for="address" class="formLabel">Addess:</label>
                                        <textarea name="address" id="address" cols="35" rows="5"></textarea>

                                        @error('address')
                                            <p class="text-red-700 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-6 flex justify-center">
                                        <button type="submit" class="px-8 py-2 mx-1 text-base uppercase bg-emerald-600 hover:bg-emerald-700 text-white rounded-md transition-all">Confirm Order</button>
                                        <button id="close" class="btn btn-danger mx-1">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.

                        <br>Design: TemplateMo</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/accordions.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>

    <script>
        $("#order-form").click(function() {
            $("#apper").show();
        })

        $("#close").click(function() {
            $("#apper").hide();
        })
    </script>

    <!-- Global Init -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
  </body>
</html>
