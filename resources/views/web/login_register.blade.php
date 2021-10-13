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
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">login-register</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- login register wrapper start -->
<div class="login-register-wrapper mb-4">
    <div class="container">
        <div class="member-area-from-wrap">
            <div class="row">
                <!-- Login Content Start -->
                <div class="col-lg-6">
                    <div class="login-reg-form-wrap  pr-lg-50">
                        <h2>Sign In</h2>
                        <form class="pt-3" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="single-input-item">
                                <input id="email" type="email" name="email" id="email" placeholder="Correo Electronico">
                            </div>
                            <div class="single-input-item">
                                <input id="password" type="password" name="password" id="password"
                                    placeholder="Contraseña">
                            </div>
                            <div class="single-input-item">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                                            <label class="custom-control-label" for="rememberMe">Recuerdame</label>
                                        </div>
                                    </div>
                                    <a href="#" class="forget-pwd">Olvido la contraseña?</a>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <button type="submit" class="sqr-btn">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login Content End -->

                <!-- Register Content Start -->
                <div class="col-lg-6">
                    <div class="login-reg-form-wrap mt-md-34 mt-sm-34">
                        <h2>Registrarse</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                                            placeholder="Nombres" />
                                        @error('name')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="text" id="surnames" name="surnames" value="{{ old('surnames') }}"
                                            placeholder="Apellidos" />
                                        @error('surnames')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="single-input-item">
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="Correo Electronico" />
                                @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" id="password" name="password"
                                            value="{{ old('password') }}" placeholder="Contraseña" required />
                                        @error('password')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" id="password-confirmation" name="password_confirmation"
                                            value="{{ old('password_confirmation') }}"
                                            placeholder=" Repetir Contraseña" />
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <div class="login-reg-form-meta">
                                    <div class="remember-meta">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                            <label class="custom-control-label" for="subnewsletter">Suscribirme al
                                                boleín</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <button type="submit" class="sqr-btn">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register Content End -->
            </div>
        </div>
    </div>
</div>
<!-- login register wrapper end -->

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
