@extends('layouts.web')
@section('meta_description', '')
@section('title', '')
@section('styles')

@endsection
@section('content')
<!-- hero slider start -->
<div class="hero-slider-area pt-5 mb-3">
    <div class="slider-wrapper-area3">
        <div class="hero-slider-active hero__3 slick-dot-style hero-dot">
            <div class="single-slider d-flex align-items-center"
                style="background-image: url(galio/assets/img/slider/slider3_bg1.jpg);">
                <div class="container-fluid">
                    <div class="slider-main-content">
                        <div class="slider-text">
                            <h2>our new range of</h2>
                            <h1>woman</h1>
                            <h5>for less than $199.00</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider d-flex align-items-center"
                style="background-image: url(galio/assets/img/slider/slider3_bg2.jpg);">
                <div class="container-fluid">
                    <div class="slider-main-content">
                        <div class="slider-text">
                            <h2>shopping bag</h2>
                            <h4>fashion collection 2018</h4>
                            <p>for less than $199.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- home banner area start -->
<div class="banner-area mt-8 mt-lg-28 mb-34 mb-md-0 mb-sm-0 mt-xs-3">
    <div class="container-fluid">
        <div class="row mx-5">
            @foreach ($web_categories as $category)
            <div class="col-lg-4 mb-3 col-sm-6 col-6">
                <div class="img-container img-full  mb-md-30 mb-sm-30">
                    <form action="{{route('web.search_products_by_category')}}" method="GET" >
                        <div class="">
                            <input name="search_id_category" type="hidden" class="" value="{{$category->id}}">
                            
                            <div class="d-block">
                                <button class="w-100" ><img style="height: 171px;" src="{{$category->images->pluck('url')[0]}}" alt=""></button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-4 mb-3 col-sm-6 col-6">
                <div class="img-container img-full fix mb-md-30 mb-sm-30">
                    <a href="#">
                        <img src="{{$category->images->pluck('url')[0]}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-3 col-sm-6 col-6">
                <div class="img-container img-full fix mb-md-30 mb-sm-30">
                    <a href="#">
                        <img src="galio/assets/img/banner/home3_static7.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-3 col-sm-6 col-6 ">
                <div class="img-container img-full fix mb-md-30 mb-sm-30">
                    <a href="#">
                        <img src="galio/assets/img/banner/home3_static8.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-6">
                <div class="img-container img-full fix mb-md-30 mb-sm-30">
                    <a href="#">
                        <img src="galio/assets/img/banner/home3_static6.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-6">
                <div class="img-container img-full fix mb-md-30 mb-sm-30">
                    <a href="#">
                        <img src="galio/assets/img/banner/home3_static7.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-6">
                <div class="img-container img-full fix mb-md-30 mb-sm-30">
                    <a href="#">
                        <img src="galio/assets/img/banner/home3_static8.jpg" alt="">
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- home banner area end -->
<!-- hero slider end -->

<!-- page wrapper start -->
<div class="main-home-wrapper">
    <div class="container-fluid">
        <div class="row mx-5">
            
            <div class="col-lg-12">
                <!-- banner statistic start -->
                <div class="banner-statistic pt-6 pb-34">
                    <div class="img-container fix img-full">
                        <a href="#">
                            <img src="galio/assets/img/banner/home3_static5.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- banner statistic end -->
                <!-- category tab area start -->
                <div class="category-tab-area mb-30">
                    <div class="category-tab">
                        <ul class="nav">
                            <li>
                                <i class="fa fa-flask"></i>
                            </li>
                            <li>
                                <a class="active" data-toggle="tab" href="#tab_one">Destacados</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_two">Nuevos</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="tab-content pb-md-20 pb-sm-20">
                    <div class="tab-pane fade show active" id="tab_one">
                        <div class="feature-category-carousel-wrapper">
                            <div class="latest-product-active slick-padding slick-arrow-style">
                                @foreach ($web_feacturedproducts as $product)
                                

                                    <!-- product single item start -->
                                    @include('web._product_feactured')
                                
                                   
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_two">
                        <div class="feature-category-carousel-wrapper">
                            <div class="latest-product-active slick-padding slick-arrow-style">
                                @foreach ($web_newproducts as $product)
                                

                                    <!-- product single item start -->
                                    @include('web._product_new')
                                
                                   
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- category tab area end -->
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
    
@endsection
