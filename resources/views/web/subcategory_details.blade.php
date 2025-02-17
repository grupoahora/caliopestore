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
                        <div class="col-lg-4" id="imgs">
                            <div class="pro-nav slick-padding2 slick-arrow-style_2">
                                @foreach ($subcategory->products as $product)
                                @foreach ($product->images as $image)
                                <div class="pro-nav-thumb "><img width="98px" height="98px" src="{{$image->url}}"
                                    alt="{{$product->name}}" /></div>
                                    
                                @endforeach
                                @endforeach
                            </div>
                            <div class="product-large-slider mb-20 slick-arrow-style_2">
                                @foreach ($subcategory->products as $product)
                                @foreach ($product->images as $image)
                                <div class="pro-large-img img-zoom" id="img{{$image->id}}">
                                    <img src="{{$image->url}}" alt="{{$product->name}}" />
                                </div>
                                    
                                @endforeach
                                @endforeach
                            </div>
                            
                            
                        </div>
                        <div class="col-lg-8">
                            <div class="product-details-des mt-md-34 mt-sm-34">
                                <h3 ><a href="{{route('web.subcategory_details', $subcategory)}}">{{$subcategory->name}}</a></h3>
                                
                                    <div class="py-2" id="productdetail_id">
                                            
                                                
                                    </div>
                                   
                                
                                {{-- @include('web.products._ratings') --}}
                                {{-- <div class="customer-rev">
                                    <a href="#" data-toggle="modal" data-target="#modal-default">Escribir un Comentario</a>
                                </div> --}}
                                
                                
                                <p>{{$subcategory->description}}</p>
                                
                                    <h5>Texturas:</h5>
                                    {{-- <div class="pro-nav slick-padding2 slick-arrow-style_2"> --}}
                                <div class="feature-category-area mt-md-70">
                                    <div class="latest-product-active slick-padding slick-arrow-style">
                                        @foreach ($subcategory->products as $key => $product)
                                            <div class="col-lg-12 col-md-4 col-sm-6">
                                                <div class="product-item fix mb-30">
                                                    <div class="product-thumb">
                                                        <button class="pro-nav-thumb{{$product->id}} border border-0 bg-transparent" id="product_id" value="{{$product->id}}">
                                            
                                                            
                                                            @foreach ($product->textures as $image)
                                                            <img width="150px" height="150px" src="{{$image->url}}" class="@if($loop->first) img-pri @else img-sec @endif" alt="{{$product->name}}">
                                                            @endforeach
                                                               
                                                                
                                                            
                                                            
                                                        </button>
                                                    </div>
                                                    @push('scripts')
                                                    
                                                <script>
                                                    var product = $('.pro-nav-thumb{{$product->id}}');
                                                    /* console.log(product); */
                                                    var productdetail = $('#productdetail_id');
                                                    var imgs = $('#imgs');
                                                    var imgs2 =   $('#imgs2');
                                                    var envio = product.click(function(){
                                                        var productval = $('.pro-nav-thumb{{$product->id}}').val();
                                                        var urlproducdetail = "{{route('web.product_details', $product)}}";
                                                        var imgidvisible = $('div#img{{$product->images->pluck('id')[0]}}.pro-large-img.img-zoom.slick-slide.slick-current.slick-active');
                                                        console.log(imgidvisible);
                                                        var imgidinvisible = $('#img{{$product->images->pluck('id')[0]}}.pro-large-img.img-zoom.slick-slide');
                                                        if (imgidvisible.length) {
                                                            imgidvisible.removeClass('slick-current slick-active');
                                                            imgidinvisible.addClass('slick-current slick-active'); 
                                                            /* $('#img{{$product->images->pluck('id')[0]}}').removeClass('.slick-current.slick-active'); */
                                                            console.log('a');  
                                                            
                                                        } else if (imgidinvisible.length) {
                                                            imgidinvisible.addClass('slick-current slick-active');
                                                            imgidvisible.removeClass('slick-current slick-active');
                                                            console.log('aa'); 
                                                        }else{
                                                            console.log('b');  
                                                        }
                                                        
                                                        $.ajax({
                                                            url: "{{route('get_product_by_product')}}",
                                                            method: 'GET',
                                                            data: {
                                                                product: productval,
                                                            },
                                                            
                                                            success: function(data){
                                                                productdetail.empty();
                                                                /* productdetail.append('<input type="text" value="seleccione una textura">'); */
                                                                $.each(data, function(index, element){
                                                                    productdetail.append('<h3><a href='+'"'+ urlproducdetail+ '">' + element.name +'</a>'+'</h3>');
                                                                });
                                                                
                                                            },
                                                            
                                                        });
                                                       
                                                        
                                                    });
                                                    /* console.log(envio); */
                                                </script>
                                                
                                                @endpush
                                            
                                                <div class="ratings">
                                                    <input id="input_rate_{{$product->id}}" name="rate" value="{{$product->AverageRating}}" class="rating-loading">
                                                    @push('scripts')
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#input_rate_{{$product->id}}').rating({
                                                                min: 0,
                                                                max: 5,
                                                                theme: 'krajee-fa', 
                                                                displayOnly: true,
                                                                step: 1, 
                                                                language: 'es',
                                                                size: 'xs', 
                                                                stars: 5,
                                                                showCaption: false,
                                                            });
                                                        });
                                                    </script>
                                                    @endpush
                                                    @push('modal')
                                                        <div class="modal fade" id="modal-default">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content rounded-0">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title my-3">Editar Dirección</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    {!! Form::open(['route'=>['web.rate_product', $product], 'method'=>'POST']) !!}
                                                                    <div class="modal-body">
                                                                        
                                                                        <div class="single-input-item">
                                                                            <label class="col-form-label">
                                                                                <span class="text-danger">*</span> 
                                                                                Calificación general
                                                                            </label>
                                                                            <div class="form-group">
                                                                                {{-- <label for="input-1" class="control-label">Puntuacion:</label> --}}
                                                                                <input id="input-1" name="rate" value="" class="rating-loading">
                                                                            </div>
                                                        
                                                                        </div>
                                                                        <div class="single-input-item">
                                                                            <label class="col-form-label"><span class="text-danger">*</span>Comentario</label>
                                                                            <textarea class="form-control" name="comment" required></textarea>
                                                                            
                                                                        </div>
                                                                        

                                                                                

                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                        <button type="submit" class="check-btn sqr-btn">Guardar cambios</button>
                                                                    </div>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                    @endpush
                                                    @push('scripts')

                                                        <script>
                                                        $(document).ready(function(){
                                                            $('#input-1').rating({
                                                                language: 'es',
                                                                step: 1,
                                                                theme: 'krajee-fa',
                                                                starCaptions: {1: 'Muy Malo', 2: 'Malo', 3: 'Está bien', 4: 'Bueno', 5: 'Muy Bueno'},
                                                                    starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
                                                            });
                                                        });
                                                        </script>
                                                    @endpush
                                                </div>
                                                <span>{{$product->timesRated()}} ({{round($product->userAverageRating, 1)}})</span>
                                                <div class="customer-rev">
                                                    <a href="#" data-toggle="modal" data-target="#modal-default">Escribir un Comentario</a>
                                                </div>
                                                <div class="pro-review">
                                                    
                                                    <span>
                                                        <div class="availability mt-10">
                                                            <h5>Disponible:</h5>
                                                            <span>{{$product->stock}} <br> en inventario</span>
                                                        </div>
                                                    </span>
                                                    <span>
                                                        <div class="pricebox">
                                                            <span class="regular-price">${{$product->sell_price}}</span>
                                                        </div>
                                                    </span>
                                                </div>
                                                {!! Form::open(['route'=>['shopping_cart_details.store', $product], 'method' => 'POST']) !!}
                                               
                                                    
                                                <div class="quantity-cart-box d-flex align-items-center {{-- {{$class}} --}}">
                                                    <div class="row">
                                                        <div class="col-12 py-2">
                                                            <div class="quantity">
                                                                <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
                                                            </div>

                                                        </div>
                                                        <div class="col-12">

                                                            <div class="pro-size mb-20 mt-20">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h5>Tamaño:</h5>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <select class="nice-select" name="size" >
                                                                            @foreach ($product->sizes as $size)
                                                                                <option value="{{$size->name}}">{{$size->name}}</option>
                                                                            @endforeach
                                                                            
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-12 py-2">
                                                            <div class="action_link">
                                                                <button class="buy-btn" type="submit">add to cart
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                                    {{-- <div class="product-content">
                                                        <h4><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h4>
                                                        <div class="pricebox">
                                                            <span class="regular-price">${{$product->sell_price}}</span>
                                                            @include('web.products._ratings')
                                                            
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>                          
                                        @endforeach
                                    </div>
                                </div>
                                    
                                    
                                {{-- </div> --}}
                                
                               {{--  <div class="pro-size mb-20 mt-20">
                                    <h5>size :</h5>
                                    <select class="nice-select">
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                    </select>
                                </div> --}}
                                
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

@endsection
