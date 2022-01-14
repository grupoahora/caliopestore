@extends('layouts.web')

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
                            <li class="breadcrumb-item"><a href="{{route('web.shop_grid')}}">Productos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">checkout</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- checkout main wrapper start -->
<div class="checkout-page-wrapper mt-3">
    <div class="container">
                <div class="row">
            <!-- Checkout Billing Details -->
            <div class="col-lg-6">
                <div class="checkout-billing-details-wrap">
                    <h2>Detalles de Facturación</h2>
                    <div class="billing-form-wrap">
                      <!-- Order Summary Table -->
                        <div class="order-summary-table table-responsive text-center">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="h4">Productos</th>
                                        <th class="h4">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <a href="{{route('web.product_details', $product->product)}}">
                                                    {{$product->product->name}} 
                                                    <strong>
                                                         × {{$product->quantity}} 
                                                    </strong>
                                                </a>
                                            </td>
                                            <td>
                                                ${{$product->total()}} 
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td><a href="single-product.html">Suscipit Vestibulum <strong> × 1</strong></a>
                                        </td>
                                        <td>$165.00</td>
                                    </tr>
                                    <tr>
                                        <td><a href="single-product.html">Ami Vestibulum suscipit <strong> ×
                                                    4</strong></a></td>
                                        <td>$165.00</td>
                                    </tr>
                                    <tr>
                                        <td><a href="single-product.html">Vestibulum suscipit <strong> × 2</strong></a>
                                        </td>
                                        <td>$165.00</td>
                                    </tr> --}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Sub Total</td>
                                        {{-- {{$shopping_cart->total_price()}} --}}
                                        <td><strong>${{$subtotal}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Envío</td>
                                        <td class="d-flex justify-content-center">
                                            
                                            <ul class="shipping-type">
                                                <li>
                                                    
                                                    <strong>
                                                        <div class="fw-700">Envío Gratis</div>
                                                    </strong>
                                                        
                                                        <div class="form-label">
                                                            El tiempo de envìo esta sujeto <br> a la empresa Domiciliaria
                                                        </div>
                                                        
                                                        
                                                    </li>
                                                </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td><strong>${{$shopping_cart->total_price()}}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Details -->
            <div class="col-lg-6">
                <div class="order-summary-details mt-md-26 mt-sm-26">
                    <h2>Metodo de Pago</h2>
                    <div class="order-summary-content mb-sm-4">
                        
                        <!-- Order Payment Method -->
                        <form action="{{ route('pay')}}" method="post">
                            @csrf
                            <div class="order-payment-method">



                                @foreach ($paymentPlatforms as $key => $paymentPlatform)
                                <div class="single-payment-method show">
                                    <div class="payment-method-name
                                        @if ($loop->first)
                                            show
                                        @endif">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="{{$key}}" name="paymentmethod" value="{{$paymentPlatform->id}}"
                                                class="custom-control-input" 
                                                
                                                @if ($loop->first)
                                                    checked
                                                @endif
                                                
                                                required />
                                            <label class="custom-control-label" for="{{$key}}">{{$paymentPlatform->name}}
                                            <img src="{{$paymentPlatform->image}}" class="img-fluid paypal-card"
                                            alt="{{$paymentPlatform->name}}" /></label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="{{$paymentPlatform->id}}">
                                        @includeIf('components.' . strtoupper($paymentPlatform->name) . '-collapse')
                                    </div>
                                </div>
                                
                                @endforeach


                                <div class="summary-footer-area">
                                    <div class="custom-control custom-checkbox mb-14">
                                        <input type="checkbox" class="custom-control-input" id="terms" required />
                                        <label class="custom-control-label" for="terms">He leido y accepto Terminos y condiciones de <a href="{{route('web.welcome')}}">Caliope.com.com.</a></label>
                                    </div>
                                    <button type="submit" class="check-btn sqr-btn">Pagar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout main wrapper end -->

{{-- <!-- brand area start -->
        <div class="brand-area pt-28 pb-30 pt-md-10 pt-sm-30">
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
                                <a href="#"><img src="assets/img/brand/br1.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br2.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br3.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br4.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br5.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br6.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br4.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end --> --}}

@endsection
@section('scripts')
{{-- {!! Html::script('js/jquery-3.6.0.js') !!}
{!! Html::script('inputmask/dist/jquery.inputmask.js') !!} --}}


<script src="galio/assets/js/switcher.js"></script>

@endsection
