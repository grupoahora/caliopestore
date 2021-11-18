@extends('layouts.web')
@section('meta_description', '')
@section('title', '')
@section('styles')

@endsection
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container-fluid">
        <div class="row mx-5">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('web.welcome')}}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{route('web.shop_grid')}}">Tienda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detalles de producto</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- product details wrapper start -->
<div class="product-details-wrapper">
    <div class="container-fluid">
        <div class="row mx-5">
            <div class="col-lg-10">
                <!-- product details inner end -->
                <div class="product-details-inner">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-large-slider mb-20 slick-arrow-style_2">
                                @foreach ($product->images as $image)
                                    <div class="pro-large-img img-zoom" id="img{{$image->id}}">
                                        <img src="{{$image->url}}" alt="{{$product->name}}" />
                                    </div>
                                @endforeach
                            </div>
                            <div class="pro-nav slick-padding2 slick-arrow-style_2">
                                @foreach ($product->images as $key => $image)
                                    <div class="pro-nav-thumb "><img src="{{$image->url}}"
                                        alt="{{$product->name}}" /></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details-des mt-md-34 mt-sm-34">
                                <h3><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h3>
                                @include('web.products._ratings')
                                <div class="customer-rev">
                                    <a href="#" data-toggle="modal" data-target="#modal-default">Escribir un Comentario</a>
                                </div>
                                <div class="availability mt-10">
                                    <h5>Disponible:</h5>
                                    <span>{{$product->stock}} en inventario</span>
                                </div>
                                <div class="pricebox">
                                    <span class="regular-price">${{$product->sell_price}}</span>
                                </div>
                                <p>{{$product->short_description}}</p>
                                <div class="color-option mt-10">
                                    <h5>color/textura :</h5>
                                                @foreach ($product->colors as $item)


                                                <input type="checkbox" id="{{$item->id}}" value="{{$item->id}}" name="color"> <label for="color"><img width="35px" height="35px" class="mx-1 bordercaliope" src="{{$item->images->pluck('url')[0]}}" alt=""></label>

                                                @endforeach

                                        <ul>
                                        <li>
                                            <a class="c-black" href="#" title="Black"></a>
                                        </li>
                                        <li>
                                            <a class="c-blue" href="#" title="Blue"></a>
                                        </li>
                                        <li>
                                            <a class="c-brown" href="#" title="Brown"></a>
                                        </li>
                                        <li>
                                            <a class="c-gray" href="#" title="Gray"></a>
                                        </li>
                                        <li>
                                            <a class="c-red" href="#" title="Red"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-size mb-20 mt-20">
                                    <h5>size :</h5>
                                    <select class="nice-select">
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                    </select>
                                </div>
                                @include('web._add_to_shopping_cart_form', ['class'=>''])
                                <div class="useful-links mt-20">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                            class="fa fa-refresh"></i>compare</a>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i
                                            class="fa fa-heart-o"></i>wishlist</a>
                                </div>
                                <div class="share-icon mt-20">
                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                    <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                    <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                    <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details inner end -->

                <!-- product details reviews start -->
                <div class="product-details-reviews mt-34">
                    <div class="row mx-5">
                        <div class="col-lg-12">
                            <div class="product-review-info">
                                <ul class="nav review-tab">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#tab_one">Descripción</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_two">Información</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_three">Comentarios</a>
                                    </li>
                                </ul>
                                <div class="tab-content reviews-tab">
                                    <div class="tab-pane fade show active" id="tab_one">
                                        <div class="tab-one">
                                            {!! $product->long_description !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_two">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>color</td>
                                                    <td>black, blue, red</td>
                                                </tr>
                                                <tr>
                                                    <td>size</td>
                                                    <td>L, M, S</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab_three">
                                        @include('web.products.review_product_form')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details reviews end -->

                <!-- related products area start -->
                @include('web._related_products')
                <!-- related products area end -->
            </div>

            <!-- sidebar start -->
            <div class="col-lg-2">
                <div class="shop-sidebar-wrap fix mt-md-22 mt-sm-22">
                    <!-- category start -->
                    @include('web._category')
                    <!-- category end -->

                    <!-- featured category start -->
                    
                        @include('web._featured_category')
                    
                    <!-- featured category end -->

                    <!-- manufacturer start -->
                    {{-- <div class="sidebar-widget mb-22">
                        <div class="sidebar-title mb-10">
                            <h3>Manufacturers</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul>
                                <li><i class="fa fa-angle-right"></i><a href="#">calvin klein</a><span>(10)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">diesel</a><span>(12)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">polo</a><span>(20)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">Tommy Hilfiger</a><span>(12)</span>
                                </li>
                                <li><i class="fa fa-angle-right"></i><a href="#">Versace</a><span>(16)</span></li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- manufacturer end -->

                    <!-- product tag start -->
                    @include('web._product_tag')
                    <!-- product tag end -->

                    <!-- sidebar banner start -->
                    {{-- <div class="sidebar-widget mb-22">
                        <div class="img-container fix img-full mt-30">
                            <a href="#"><img src="/galio/assets/img/banner/banner_shop.jpg" alt=""></a>
                        </div>
                    </div> --}}
                    <!-- sidebar banner end -->
                </div>
            </div>
            <!-- sidebar end -->
        </div>
    </div>
</div>
<!-- product details wrapper end -->


<!-- brand area start -->
{{-- @include('web._brand_area') --}}
<!-- brand area end -->
@endsection
@section('scripts')

@endsection
