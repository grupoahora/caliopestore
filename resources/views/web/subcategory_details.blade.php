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
                            <li class="breadcrumb-item active" aria-current="page">Detalles de {{$subcategory->name}}</li>
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
                                @foreach ($subcategory->products as $key => $product)
                                        <div class="pro-nav-thumb "><img src="{{$product->textures->pluck('url')[0]}}"
                                            alt="{{$product->name}}" /></div>
                                    @endforeach
                            </div>
                            
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details-des mt-md-34 mt-sm-34">
                                <h3><a href="{{route('web.subcategory_details', $subcategory)}}">{{$subcategory->name}}</a></h3>
                                <div id="productdetail_id">

                                </div>
                                {{-- @include('web.products._ratings') --}}
                                {{-- <div class="customer-rev">
                                    <a href="#" data-toggle="modal" data-target="#modal-default">Escribir un Comentario</a>
                                </div> --}}
                                <div class="availability mt-10">
                                    <h5>Disponible:</h5>
                                    <span>{{-- {{$product->stock}} --}} en inventario</span>
                                </div>
                                <div class="pricebox">
                                    <span class="regular-price">${{-- {{$product->sell_price}} --}}</span>
                                </div>
                                <p>{{$subcategory->description}}</p>
                                
                                    <h5>Texturas:</h5>
                                <div class="pro-nav slick-padding2 slick-arrow-style_2">
                                    @foreach ($subcategory->products as $key => $product)
                                        <div class="pro-nav-thumb " >
                                            <input type="button" id="product_id" value="{{$product->id}}">
                                            
                                            <img   src="{{$product->textures->pluck('url')[0]}}"
                                            alt="{{$product->name}}" />
                                            
                                        </div>
                                    @endforeach
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
                                {{-- @include('web._add_to_shopping_cart_form', ['class'=>'']) --}}
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
<script>
      var product = $('#product_id');
      var productdetail = $('#productdetail_id');
      product.click(function(){
          $.ajax({
              url: "{{route('get_product_by_product')}}",
              method: 'GET',
              data: {
                  product: product.val(),
              },
              success: function(data){
                  productdetail.empty();
                  /* productdetail.append('<input type="text" value="seleccione una textura">'); */
                  $.each(data, function(index, element){
                      productdetail.append('<input value="'+ element.id +'">'+ element.name)
                  });
              }
          });
      });
    </script>
@endsection
