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
        <header class="sticky-top-caliope">
            <div class="wrapper box-layout ">
            <!-- header top start -->
                <div class=" header-top-area sticky-color-caliope text-center text-md-left py-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-5 my-auto">
                                <div class="header-call-action">
                                    <a href="{{route('web.contact_us')}}">
                                        <i class="fa fa-envelope"></i>
                                        {{$web_company->mail}}
                                    </a>
                                    <a href="{{route('web.contact_us')}}">
                                        <i class="fa fa-phone"></i>
                                        {{$web_company->phone}}
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5 my-auto">
                                <div class="main-header-inner border-0">
                                    <div class="main-menu border-0">
                                        <nav id="mobile-menu">
                                            <ul>
                                                <li class="{!! active_class(route('web.welcome')) !!} p-0"><a href="{{route('web.welcome')}} " class=""><i class="fa fa-home"></i>Inicio</a>
                                                   
                                                </li>
                                                
                                                <li class="{!! active_class(route('web.shop_grid')) !!} p-0"><a href="{{route('web.shop_grid')}} " class="">Tienda <i class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="#">Categorias <i class="fa fa-angle-right"></i></a>
                                                            <ul class="dropdown">
                                                                @foreach ($web_categories as $category)
                                                                    <li>
                                                                        <a href="{{route('web.search_products_by_category', $category)}}">{{$category->name}}</a>
                                                                    </li>
                                                                @endforeach
                                                                
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Sub-Categorias<i class="fa fa-angle-right"></i></a>
                                                            <ul class="dropdown">
                                                                @foreach ($web_subcategories as $subcategory)
                                                                    <li>
                                                                        <a href="{{route('web.search_products_by_category', $subcategory)}}">{{$subcategory->name}}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        
                                                    </ul>
                                                </li>
                                                
                                                <li class="{!! active_class(route('web.contact_us')) !!} p-0"><a href="{{route('web.contact_us')}}"  class="">Contactanos</a></li>
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
                                                <li >
                                                    <a  href="{{route('web.login_register')}}">Iniciar Sesión</a>
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
            

           

            <!-- main menu area start -->
            
            <!-- main menu area end -->

        </header>
        <!-- header area end -->
         <!-- header middle start -->
            <div class="header-middle-area pt-20 pb-20 bg-nav-header">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-lg-1 mx-auto">
                            <div class="brand-logo p-0">
                                <a href="/">
                                    
                                        
                                    <img src="{{$web_company->logo}}" alt="{{$web_company->name}}">
                                    
                                </a>
                            </div>
                        </div> <!-- end logo area -->
                        <div class="col-lg-10 px-3 mr-auto ml-4">
                            
                                <div class="header-middle-right mx-3">
                                    <div class="header-middle-shipping mb-20 ">
                                        <div class="single-block-shipping">
                                            <div class="shipping-icon ">
                                                <i class="fa fa-clock-o "></i>
                                            </div>
                                            <div class="shipping-content">
                                                <h5>Abierto</h5>
                                                <span>24 Horas</span>
                                            </div>
                                        </div> <!-- end single shipping -->
                                        <div class="single-block-shipping">
                                            <div class="shipping-icon ">
                                                <i class="fa fa-truck "></i>
                                            </div>
                                            <div class="shipping-content">
                                                <h5>Envio Gratis</h5>
                                                <span>Pedidos mayores a 100.000$ pesos Cop</span>
                                            </div>
                                        </div> <!-- end single shipping -->
                                        <div class="single-block-shipping">
                                            <div class="shipping-icon ">
                                                <i class="fa fa-money "></i>
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
        @yield('content')
        <!-- footer area start -->

        @stack('modal')
        <footer>
            <!-- footer top start -->
            <div class="footer-top bg-footer-caliope pt-14 pb-14">
                <div class="container-fluid">
                    <div class="row w-25 mx-auto ">

                        

                        @if ($errors->has('subscription_email'))
                        <div class="alert alert-danger">
                            {{$errors->first('subscription_email')}}
                        </div>
                        
                        @endif
                    </div>
                    <div class="footer-top-wrapper">
                        <div class="newsletter__wrap">
                            @auth
                                
                            
                                @if ($web_subscription->email === $web_email_user)
                                <div class="newsletter__title">
                                        <div class="newsletter__icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="newsletter__content">
                                            <h3>Gracias por estar subscrito al boletín ♥ </h3>
                                            {{-- <p>Conoce todas nuestras nuevas ofertas y colecciones caliope</p> --}}
                                        </div>
                                    </div>
                                    @else
                                    <div class="newsletter__title">
                                        <div class="newsletter__icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="newsletter__content">
                                            <h3 class="">suscribirse al boletín</h3>
                                            <p>Conoce todas nuestras nuevas ofertas y colecciones caliope</p>
                                        </div>
                                    </div>
                                    <div class="newsletter__box">
                                        <form action="{{route('web.subscription_email')}}" method="POST">
                                            @csrf
                                            <input type="email" name="subscription_email" autocomplete="off" placeholder="Email" value="{{auth()->user()->email}}">
                                        </div>
                                        <button type="submit" class="bg-footer-buttom-caliope" >subscribe!</button>
                                    </form>
                                        @endif
                            
                                
                            @endauth
                                
                            @guest
                                
                            
                            <div class="newsletter__title">
                                @if (session('mensaje'))
                                <div class="alert alert-success">
                                    <strong>{{ session('mensaje') }}</strong>
                                </div>
                                @push('scripts')
                                    <script>
                                        $(function(){
                                            function ocultar_alert() {
                                                $('.alert-success').addClass("d-none");
                                                
                                            };
                                            window.setTimeout( ocultar_alert, 5000 );
                                        }
                                        );
                                        
                                            console.log(($('.alert-success')));
                                        
                                    </script>
                                @endpush
                            @endif
                                <div class="newsletter__icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="newsletter__content">
                                    <h3>suscribirse al boletín</h3>
                                    <p>Conoce todas nuestras nuevas ofertas y colecciones caliope</p>
                                </div>
                            </div>
                            <div class="newsletter__box">
                                <form action="{{route('web.subscription_email')}}" method="POST">
                                    @csrf
                                    <input type="email" name="subscription_email" autocomplete="off" placeholder="Email">
                                    <button type="submit" class="bg-footer-buttom-caliope btn btn-sm">subscribe!</button>
                                </div>
                            </form>
                            @endguest
                            
                            <!-- mailchimp-alerts end -->
                        </div>
                        <div class="social-icons">
                            @foreach ($web_socialmedias as $socialmedia)
                                <a href="{{$socialmedia->url}}" data-toggle="tooltip" data-placement="top" title="{{$socialmedia->name}}"><i class="fa {{$socialmedia->icon}}"></i></a>
                                
                            @endforeach
                            
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
                            <div class="col-md-3 col-sm-6">
                                <div class="footer-widget mb-sm-26">
                                    <div class="widget-title mb-10 mb-sm-6">
                                        <h4>Mi cuenta</h4>
                                    </div>
                                    <div class="widget-body">
                                        <ul>
                                            <li>
                                                @if (Route::has('register'))
                                                    <a href="{{route('web.login_register')}}">Registrarme</a>
                                                @endif
                                            </li>
                                            <li>
                                                <a href="{{route('web.login_register')}}">Iniciar sesión</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @else
                       
                            <div class="col-md-3 col-sm-6">
                                <div class="footer-widget mb-sm-26">
                                    <div class="widget-title mb-10 mb-sm-6">
                                        <h4>Mi cuenta</h4>
                                    </div>
                                    <div class="widget-body">
                                        <ul>
                                            <li><a href="{{route('web.my_account')}}">Mi Cuenta</a></li>
                                            <li><a href="{{route('web.cart')}}">mi Carrito</a></li>
                                            <li><a href="{{route('web.checkout')}}">checkout</a></li>
                                            
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

                        


                        <div class="col-md-6 col-sm-12">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Aliados</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="https://www.ccce.org.co/"><img src="https://static.dafiti.com.co/cms/cce.png" alt=""></a>
                                        </div>
                                        <div class="col-3 mx-auto">
                                            <a href="https://sicfacilita.sic.gov.co/SICFacilita/consumidor"><img src="https://static.dafiti.com.co/cms/2019/Octubre/Onsite/sicfacilita.png" alt=""></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="https://www.sic.gov.co/"><img src="https://static.dafiti.com.co/cms/push/cyberagosto/sic.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Medios de pago</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="row">
                                         @foreach ($web_paymentplatforms as $web_paymentplatform)
                                        <div class="col-3">
                                            <a href="https://www.ccce.org.co/"><img src="{{$web_paymentplatform->image}}" alt="{{$web_paymentplatform->name}}"></a>
                                        </div>
                                        @endforeach
                                        {{-- <div class="col-3 mx-auto">
                                            <a href="https://sicfacilita.sic.gov.co/SICFacilita/consumidor"><img src="https://static.dafiti.com.co/cms/2019/Octubre/Onsite/sicfacilita.png" alt=""></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="https://www.sic.gov.co/"><img src="https://static.dafiti.com.co/cms/push/cyberagosto/sic.jpg" alt=""></a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        
                    </div>
                </div>
            </div>
            <!-- footer main end -->

            <!-- footer bootom start -->
            <div class="footer-bottom-area bg-gray pt-20 pb-2">
                <div class="container">
                    <div class="footer-bottom-wrap d-block">
                        <div class="text-center h5 ">
                            © Copyright 2021. Todos los derechos reservados. <br>
                            Sitio web diseñado y desarrollado por manos Cucuteñas. <br>
            
                            
                        </div>
                        <div class="text-center h6">
                            Hecho con ❤ Softwow!
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
                    });
                }
                
            });
     
        
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