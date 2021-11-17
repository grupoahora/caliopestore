<!DOCTYPE html>
<html class="no-js" lang="es">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Caliope')">

    <!-- Site title -->
    @yield('title', 'Caliope')
    @stack('styles')
    <!-- Favicon -->
    <link rel="shortcut icon" href="/galio/assets/img/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    {!! Html::style('galio/assets/css/bootstrap.min.css') !!}
    <!-- Font-Awesome CSS -->
    {!! Html::style('galio/assets/css/font-awesome.min.css') !!}
    <!-- helper css -->
    {!! Html::style('galio/assets/css/helper.min.css') !!}
    <!-- Plugins CSS -->
    {!! Html::style('galio/assets/css/plugins.css') !!}
    <!-- Main Style CSS -->
    {!! Html::style('galio/assets/css/style.css') !!}
    {!! Html::style('galio/assets/css/skin-default.css') !!}
    {!! Html::style('css/jquery-ui.min.css') !!}
    {!! Html::style('bootstrap_star_rating/themes/krajee-fa/theme.css')!!}
{!! Html::style('bootstrap_star_rating/css/star-rating.css')!!}
    @yield('styles')
    
    
</head>

<body>

    
        <!-- header area start -->
        <header>
            <div class="wrapper box-layout">
            <!-- header top start -->
                <div class="sticky-top header-top-area bg-gray text-center text-md-left">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2 col-md-5 my-auto">
                                <div class="header-call-action">
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                        info@caliope.com.co
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-phone"></i>
                                        313-313-1442
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-5 my-auto">
                                <div class="main-header-inner border-0">
                                    <div class="main-menu border-0">
                                        <nav id="mobile-menu">
                                            <ul>
                                                <li class="active p-0"><a href="{{route('web.welcome')}}"><i class="fa fa-home"></i>Inicio {{-- <i class="fa fa-angle-down"></i> --}}</a>
                                                    {{-- <ul class="dropdown">
                                                        <li><a href="index.html">Home version 01</a></li>
                                                        <li><a href="index-2.html">Home version 02</a></li>
                                                        <li><a href="index-3.html">Home version 03</a></li>
                                                        <li><a href="index-4.html">Home version 04</a></li>
                                                    </ul> --}}
                                                </li>
                                                {{-- <li class="static p-0"><a href="#">pages <i class="fa fa-angle-down"></i></a>
                                                    <ul class="megamenu dropdown">
                                                        <li class="mega-title"><a href="#">column 01</a>
                                                            <ul>
                                                                <li><a href="shop-grid-left-sidebar.html">shop grid left sidebar</a></li>
                                                                <li><a href="shop-grid-right-sidebar.html">shop grid right sidebar</a></li>
                                                                <li><a href="shop-grid-full-3-col.html">shop grid full 3 column</a></li>
                                                                <li><a href="shop-grid-full-4-col.html">shop grid full 4 column</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-title"><a href="#">column 02</a>
                                                            <ul>
                                                                <li><a href="product-details.html">product details</a></li>
                                                                <li><a href="product-details-affiliate.html">product details
                                                                        affiliate</a></li>
                                                                <li><a href="product-details-variable.html">product details
                                                                        variable</a></li>
                                                                <li><a href="product-details-group.html">product details group</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-title"><a href="#">column 03</a>
                                                            <ul>
                                                                <li><a href="cart.html">cart</a></li>
                                                                <li><a href="{{route('web.checkout')}}">checkout</a></li>
                                                                <li><a href="compare.html">compare</a></li>
                                                                <li><a href="wishlist.html">wishlist</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-title"><a href="#">column 04</a>
                                                            <ul>
                                                                <li><a href="my-account.html">my-account</a></li>
                                                                <li><a href="login-register.html">login-register</a></li>
                                                                <li><a href="about-us.html">about us</a></li>
                                                                <li><a href="contact-us.html">contact us</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li> --}}
                                                <li class="p-0"><a href="{{route('web.shop_grid')}}">Tienda <i class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="#">Categorias <i class="fa fa-angle-right"></i></a>
                                                            <ul class="dropdown">
                                                                <li><a href="shop-grid-left-sidebar.html">categoria 1</a></li>
                                                                <li><a href="shop-grid-left-sidebar-3-col.html">categoria 2</a></li>
                                                                <li><a href="shop-grid-right-sidebar.html">categoria 3</a></li>
                                                                <li><a href="shop-grid-right-sidebar-3-col.html">categoria 4</a></li>
                                                                <li><a href="shop-grid-full-3-col.html">categoria 5</a></li>
                                                                <li><a href="shop-grid-full-4-col.html">categoria 6</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Sub-Categorias<i class="fa fa-angle-right"></i></a>
                                                            <ul class="dropdown">
                                                                <li><a href="shop-list-left-sidebar.html">sub-categoria 1</a></li>
                                                                <li><a href="shop-list-right-sidebar.html">sub-categoria 2</a></li>
                                                                <li><a href="shop-list-full.html">sub-categoria 3</a></li>
                                                            </ul>
                                                        </li>
                                                        {{-- <li><a href="#">products details <i class="fa fa-angle-right"></i></a>
                                                            <ul class="dropdown">
                                                                <li><a href="product-details.html">product details</a></li>
                                                                <li><a href="product-details-affiliate.html">product details
                                                                    affiliate</a></li>
                                                                <li><a href="product-details-variable.html">product details
                                                                    variable</a></li>
                                                                <li><a href="product-details-group.html">product details group</a></li>
                                                                <li><a href="product-details-box.html">product details box slider</a></li>
                                                            </ul>
                                                        </li> --}}
                                                    </ul>
                                                </li>
                                                {{-- <li class="p-0"><a href="#">Blog <i class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>
                                                        <li><a href="blog-left-sidebar-2-col.html">blog left sidebar 2 col</a></li>
                                                        <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                                        <li><a href="blog-full-2-column.html">blog full 2 column</a></li>
                                                        <li><a href="blog-full-3-column.html">blog full 3 column</a></li>
                                                        <li><a href="blog-details.html">blog details</a></li>
                                                        <li><a href="blog-details-audio.html">blog details audio</a></li>
                                                        <li><a href="blog-details-video.html">blog details video</a></li>
                                                        <li><a href="blog-details-image.html">blog details image</a></li>
                                                    </ul>
                                                </li> --}}
                                                <li class="p-0"><a href="{{route('web.contact_us')}}">Contactanos</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-3 col-md-7 my-auto">
                                <div class="header-top-right float-md-right float-none">
                                    <nav>
                                        <ul>
                                            @guest
                                                <li>
                                                    <a href="{{route('web.login_register')}}">Iniciar Sesión</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('web.login_register')}}">registro</a>
                                                </li>
                                            @else
                                            <li>
                                                <div class="dropdown header-top-dropdown">
                                                    <a class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Mi Cuenta
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="myaccount">
                                                        <a class="dropdown-item" href="{{route('web.my_account')}}">Mi Cuenta</a>
                                                        {{-- <a class="dropdown-item" href="{{route('web.login_register')}}"> Iniciar Sesión</a> --}}
                                                        {{-- <a class="dropdown-item" href="{{route('web.login_register')}}">Registrarse</a> --}}
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"">Cerrar Sesión</a>
                                                       
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                            @endguest
                                            {{-- <li>
                                                <a href="#">mis deseo</a>
                                            </li> --}}
                                            <li>
                                                <a href="{{route('web.cart')}}">Mi carrito</a>
                                            </li>
                                            <li>
                                                <a href="{{route('web.checkout')}}">Checkout</a>
                                            </li>
                                            
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-12 d-block d-lg-none text-right h6 "><div class="mobile-menu"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- header middle start -->
            <div class="header-middle-area pt-20 ">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-lg-1 ml-auto">
                            <div class="brand-logo p-0 mx-auto">
                                <a href="#">
                                    
                                        
                                    <img src="{{$web_company->logo}}" alt="{{$web_company->name}}">
                                    
                                </a>
                            </div>
                        </div> <!-- end logo area -->
                        <div class="col-lg-10 px-3 mr-auto">
                            
                                <div class="header-middle-right mx-3">
                                    <div class="header-middle-shipping mb-20 ">
                                                <div class="single-block-shipping">
                                                    <div class="shipping-icon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                    <div class="shipping-content">
                                                        <h5>Abierto</h5>
                                                        <span>24 Horas</span>
                                                    </div>
                                                </div> <!-- end single shipping -->
                                                <div class="single-block-shipping">
                                                    <div class="shipping-icon">
                                                        <i class="fa fa-truck"></i>
                                                    </div>
                                                    <div class="shipping-content">
                                                        <h5>Envio Gratis</h5>
                                                        <span>Pedidos mayores a 30.000$ pesos Cop</span>
                                                    </div>
                                                </div> <!-- end single shipping -->
                                                <div class="single-block-shipping">
                                                    <div class="shipping-icon">
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                    <div class="shipping-content">
                                                        <h5>DEVOLUCIÓN DE DINERO 100%</h5>
                                                        <span>Dentro de los 30 días posteriores a la entrega</span>
                                                    </div>
                                                </div> <!-- end single shipping -->
                                    </div>
                                </div>
                            
                            
                                <div class="header-middle-right">
                                    <div class="header-middle-block ">
                                        <div class="col-12">
                                            <div class="row " >
                                                <div class="col-9 col-lg-10 ">
                                                    <div class="header-middle-searchbox">
                                                    <form action="{{route('web.search_products')}}" method="GET" >
                                                        <div class="">
                                                            <input id="search_products" name="search_words" type="text" class="form-control" placeholder="Buscando...">
                                                            <div class="d-block">
                                                                <button  class="search-btn"><i class="fa fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                        {{-- @include('layouts._search_products') --}}
                                                    </div>
                                                </div>
                                                <div class="col-3 col-lg-2 px-0 ">
                                                    @include('layouts._mini_cart')
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- header middle end -->

            <!-- main menu area start -->
            
            <!-- main menu area end -->

        </header>
        <!-- header area end -->
        
        @yield('content')
        <!-- footer area start -->

        @stack('modal')
        <footer>
            <!-- footer top start -->
            <div class="footer-top bg-black pt-14 pb-14">
                <div class="container-fluid">
                    <div class="row w-25 mx-auto ">

                        @if (session('mensaje'))
                        <div class="alert alert-success">
                            <strong>{{ session('mensaje') }}</strong>
                        </div>
                        
                        @endif

                        @if ($errors->has('subscription_email'))
                        <div class="alert alert-danger">
                            {{$errors->first('subscription_email')}}
                        </div>
                        
                        @endif
                    </div>
                    <div class="footer-top-wrapper">
                        <div class="newsletter__wrap">
                            <div class="newsletter__title">
                                <div class="newsletter__icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="newsletter__content">
                                    <h3>sign up for newsletter</h3>
                                    <p>Duis autem vel eum iriureDuis autem vel eum</p>
                                </div>
                            </div>
                            <div class="newsletter__box">
                                <form action="{{route('web.subscription_email')}}" method="POST">
                                    @csrf
                                    <input type="email" name="subscription_email" autocomplete="off" placeholder="Email">
                                    <button type="submit" >subscribe!</button>
                                </form>
                            </div>
                            <!-- mailchimp-alerts Start -->
                            {{-- <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div> --}}
                            <!-- mailchimp-alerts end -->
                        </div>
                        <div class="social-icons">
                            @foreach ($web_socialmedias as $socialmedia)
                                <a href="{{$socialmedia->url}}" data-toggle="tooltip" data-placement="top" title="{{$socialmedia->name}}"><i class="fa {{$socialmedia->icon}}"></i></a>
                                
                            @endforeach
                            {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer top end -->

            <!-- footer main start -->
            <div class="footer-widget-area pt-40 pb-38 pb-sm-4 pt-sm-30">
                <div class="container-fluid">
                    <div class="row mx-5">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Contactanos</h4>
                                </div>
                                <div class="widget-body">
                                    <ul class="location">
                                        
                                            <li><i class="fa fa-envelope"></i>
                                                {{$web_company->mail}}
                                            </li>
                                            
                                            <li><i class="fa fa-phone"></i> (+57){{$web_company->phone}}</li>
                                            <li><i class="fa fa-map-marker"></i>{{$web_company->address}}</li>
                                        
                                    </ul>
                                    <a class="map-btn" href="{{url($web_company->google_maps_link)}}" target="_blank">Ver en Google Maps</a>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->

                        <!-- Authentication Links -->
                        @guest
                            {{-- login --}}
                            @if (Route::has('register'))
                                {{-- register --}}
                            @endif
                        @else
                        {{-- {{ Auth::user()->name }}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> --}}
                            <div class="col-md-3 col-sm-6">
                                <div class="footer-widget mb-sm-26">
                                    <div class="widget-title mb-10 mb-sm-6">
                                        <h4>Mi cuenta</h4>
                                    </div>
                                    <div class="widget-body">
                                        <ul>
                                            <li><a href="{{route('web.my_account')}}">Mi Cuenta</a></li>
                                            <li><a href="{{route('web.cart')}}">my cart</a></li>
                                            <li><a href="{{route('web.checkout')}}">checkout</a></li>
                                            <li><a href="#">my wishlist</a></li>
                                            <li><a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"">Cerrar Sesión</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </div> <!-- single widget end -->
                            </div> <!-- single widget column end -->
                        @endguest

                        


                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>short code</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        <li><a href="#">gallery</a></li>
                                        <li><a href="#">accordion</a></li>
                                        <li><a href="#">carousel</a></li>
                                        <li><a href="#">map</a></li>
                                        <li><a href="#">tab</a></li>
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>product tags</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        <li><a href="#">computer</a></li>
                                        <li><a href="#">camera</a></li>
                                        <li><a href="#">smart phone</a></li>
                                        <li><a href="#">watch</a></li>
                                        <li><a href="#">tablet</a></li>
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                    </div>
                </div>
            </div>
            <!-- footer main end -->

            <!-- footer bootom start -->
            <div class="footer-bottom-area bg-gray pt-20 pb-20">
                <div class="container">
                    <div class="footer-bottom-wrap">
                        
                        <div class="payment-method-img">
                            <img src="/galio/assets/img/payment.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer bootom end -->

        </footer>
        <!-- footer area end -->

    </div>


    <!-- Quick view modal start -->
    
    <!-- Quick view modal end -->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->


    {!! Html::script('js/jquery-3.6.0.min.js') !!}
    
    {!! Html::script('js/jquery-ui.min.js') !!}
    

    <script>
        /* $(function(){ */
            /* var prueba = ['asd', 'vcs']; */

            $('#search_products').autocomplete({
                source: function(request, response){
                    $.ajax({
                        url: "{{route('products.json')}}",
                        dataType: 'json',
                        data:{
                            term: request.term
                        },
                        success: function (data) {
                            response(data)
                        },
                        /* console.log('data'); */
                    });
                }
                
            });
        /* }); */
        
        </script>
        
    <!--All jQuery, Third Party Plugins & Activation (main.js) Files-->
    {!! Html::script('/galio/assets/js/vendor/modernizr-3.6.0.min.js') !!}
    <!-- Jquery Min Js -->
    {!! Html::script('/galio/assets/js/vendor/jquery-3.3.1.min.js') !!}
    <!-- Popper Min Js -->
    {!! Html::script('/galio/assets/js/vendor/popper.min.js') !!}
    <!-- Bootstrap Min Js -->
    {!! Html::script('/galio/assets/js/vendor/bootstrap.min.js') !!}
    <!-- Plugins Js-->
    {!! Html::script('/galio/assets/js/plugins.js') !!}
    <!-- Ajax Mail Js -->
    {!! Html::script('/galio/assets/js/ajax-mail.js') !!}
    <!-- Active Js -->
    {!! Html::script('/galio/assets/js/main.js') !!}
    <!-- Switcher JS [Please Remove this when Choose your Final Projct] -->
    {!! Html::script('/galio/assets/js/switcher.js') !!}
    {!! Html::script('js/star-rating.js')!!}
    {!! Html::script('js/es.js')!!}
    {!! Html::script('js/theme.js')!!}
    @yield('scripts')
    @stack('scripts')
    
</body>


</html>