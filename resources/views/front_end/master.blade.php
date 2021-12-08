
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url('/')}}/front_end/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_end/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_end/css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_end/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_end/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_end/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_end/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_end/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_end/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_end/css/style.css" type="text/css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @stack('css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__cart">
            <div class="offcanvas__cart__links">
                <a href="#" class="search-switch"><img src="{{url('/')}}/front_end/img/icon/search.png" alt=""></a>
                <a href="#"><img src="{{url('/')}}/front_end/img/icon/heart.png" alt=""></a>
            </div>
            <div class="offcanvas__cart__item">
                <a href="#"><img src="{{url('/')}}/front_end/img/icon/cart.png" alt=""> <span>0</span></a>
                <div class="cart__price">Cart: <span>$0.00</span></div>
            </div>
        </div>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="{{url('/')}}/front_end/img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__option">
            <ul>
                <li>USD <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>EUR</li>
                        <li>USD</li>
                    </ul>
                </li>
                <li>ENG <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>Spanish</li>
                        <li>ENG</li>
                    </ul>
                </li>
                <li><a href="#">Sign in</a> <span class="arrow_carrot-down"></span></li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
     @include('front_end.inc.header')
    <!-- Header Section End -->

   @yield('content')

    <!-- Footer Section Begin -->
   @include('front_end.inc.footer')
<!-- Footer Section End -->

<!-- Search Begin -->
@include('front_end.inc.searchModal')
<!-- Search End -->

<!-- Js Plugins -->
<script src="{{url('/')}}/front_end/js/jquery-3.3.1.min.js"></script>
<script src="{{url('/')}}/front_end/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/front_end/js/jquery.nice-select.min.js"></script>
<script src="{{url('/')}}/front_end/js/jquery.barfiller.js"></script>
<script src="{{url('/')}}/front_end/js/jquery.magnific-popup.min.js"></script>
<script src="{{url('/')}}/front_end/js/jquery.slicknav.js"></script>
<script src="{{url('/')}}/front_end/js/owl.carousel.min.js"></script>
<script src="{{url('/')}}/front_end/js/jquery.nicescroll.min.js"></script>
<script src="{{url('/')}}/front_end/js/main.js"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

@stack('js')
</body>

</html>
