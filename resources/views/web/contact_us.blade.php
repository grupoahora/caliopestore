@extends('layouts.web')
@section('meta_description', '')
@section('title', '')
@section('styles')

@endsection
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.welcome')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contactanos</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- contact area start -->
<div class="contact-area pb-34 pb-md-18 pb-sm-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-message">
                    <h2>Caliope</h2>
                    <form id="contact-form" action="http://demo.hasthemes.com/galio-v6/galio/assets/php/mail.php"
                        method="post" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input name="first_name" placeholder="Nombre Completo *" type="text" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input name="phone" placeholder="Telefono *" type="text" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input name="email_address" placeholder="Correo *" type="text" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input name="contact_subject" placeholder="Asunto *" type="text">
                            </div>
                            <div class="col-12">
                                <div class="contact2-textarea text-center">
                                    <textarea placeholder="Message *" name="Mensaje" class="form-control2"
                                        required=""></textarea>
                                </div>
                                <div class="contact-btn">
                                    <button class="sqr-btn" type="submit">Enviar Mensaje</button>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-info mt-md-28 mt-sm-28">
                    <h2>Contactanos</h2>
                    <p>{{$web_company->contact_text}}</p>
                    <ul>
                        <li><i class="fa fa-fax"></i> Dirección : {{$web_company->address}}</li>
                        <li><i class="fa fa-phone"></i> {{$web_company->mail}}</li>
                        <li><i class="fa fa-envelope-o"></i> + 57{{$web_company->phone}}</li>
                    </ul>
                    <div class="working-time">
                        <h3>Horario de Trabajo</h3>
                        <p>{{$web_company->hours_of_operation}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact area end -->

<!-- map area start -->
<div class="map-area-wrapper">
    <div class="container">
        <div id="map_content" data-lat="{{$web_company->latitude}}" data-lng="{{$web_company->length}}" data-zoom="55" data-maptitle="{{$web_company->name}}"
            data-mapaddress="{{$web_company->address}}">
        </div>
    </div>
</div>
<!-- map area end -->

<!-- brand area start -->
{{-- <div class="brand-area pt-34 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-30">
                    <div class="title-icon">
                        <i class="fa fa-crop"></i>
                    </div>
                    <h3>Popular Brand</h3>
                </div> <!-- section title end -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="brand-active slick-padding slick-arrow-style">
                    <div class="brand-item text-center">
                        <a href="#"><img src="galio/assets/img/brand/br1.png" alt=""></a>
                    </div>
                    <div class="brand-item text-center">
                        <a href="#"><img src="galio/assets/img/brand/br2.png" alt=""></a>
                    </div>
                    <div class="brand-item text-center">
                        <a href="#"><img src="galio/assets/img/brand/br3.png" alt=""></a>
                    </div>
                    <div class="brand-item text-center">
                        <a href="#"><img src="galio/assets/img/brand/br4.png" alt=""></a>
                    </div>
                    <div class="brand-item text-center">
                        <a href="#"><img src="galio/assets/img/brand/br5.png" alt=""></a>
                    </div>
                    <div class="brand-item text-center">
                        <a href="#"><img src="galio/assets/img/brand/br6.png" alt=""></a>
                    </div>
                    <div class="brand-item text-center">
                        <a href="#"><img src="galio/assets/img/brand/br4.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- brand area end -->

@endsection
@section('scripts')

@endsection
