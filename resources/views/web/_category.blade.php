{{-- <div class="sidebar-widget mb-22">
    <h3 class="mx-2 font-weight-bold"> Puede que te interese</h3>
    <div class="banner-area mt-8 mt-lg-28 mb-34 mb-md-0 mb-sm-0 mt-xs-3">
        <div class="container-fluid">
            <div class="row ">
                @foreach ($web_categories as $category)
                <div class="col-lg-12 mb-3 col-sm-12 col-6">
                    <div class="img-container img-full fix mb-md-30 mb-sm-30">
                            <form action="{{route('web.search_products_by_category')}}" method="GET" >
                            <div class="">
                                <input name="search_id" type="hidden" class="" value="{{$category->id}}">
                                <div class="d-block">
                                <button class="w-100" ><img src="{{$category->images->pluck('url')[0]}}" alt=""></button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div> --}}
<div class="sidebar-widget mb-22">
    <div class="section-title-2 d-flex justify-content-between mb-28">
        <h4 >Mas texturas</h4>
        <div class="category-append"></div>
    </div> <!-- section title end -->
    <div class="category-carousel-active row" data-row="4">
        @foreach ($products as $product)
            <div class="col-lg-12 mb-3 col-sm-12 col-6">
                <div class="img-container img-full fix mb-md-30 mb-sm-30">
                    
                        <a href="{{route('web.product_details', $product)}}">@foreach ($product->textures as $image)<img height="80px" width="auto" src="{{$image->url}}" 
                        class="@if($loop->first)  @else d-none @endif" alt="{{$product->name}}">
                        
                        @endforeach
                    </a>
                        {{-- <a href="{{route('web.product_details', $product)}}">
                            <img height="80px" width="auto" src="{{$product->images->pluck('url')[0]}}" alt=""></a> --}}
                        
                </div>
            </div>
        @endforeach
        {{-- 
         <!-- end single item column -->
        <div class="col">
            <div class="category-item">
                <div class="category-thumb">
                    <a href="product-details.html">
                        <img src="/galio/assets/img/product/product-img2.jpg" alt="">
                    </a>
                </div>
                <div class="category-content">
                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
                    <div class="price-box">
                        <div class="regular-price">
                            $150.00
                        </div>
                        <div class="old-price">
                            <del>$180.00</del>
                        </div>
                    </div>
                    <div class="ratings">
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <div class="pro-review">
                            <span>1 review(s)</span>
                        </div>
                    </div>
                </div>
            </div> <!-- end single item -->
        </div> <!-- end single item column -->
        <div class="col">
            <div class="category-item">
                <div class="category-thumb">
                    <a href="product-details.html">
                        <img src="/galio/assets/img/product/product-img3.jpg" alt="">
                    </a>
                </div>
                <div class="category-content">
                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
                    <div class="price-box">
                        <div class="regular-price">
                            $150.00
                        </div>
                        <div class="old-price">
                            <del>$180.00</del>
                        </div>
                    </div>
                    <div class="ratings">
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <div class="pro-review">
                            <span>1 review(s)</span>
                        </div>
                    </div>
                </div>
            </div> <!-- end single item -->
        </div> <!-- end single item column -->
        <div class="col">
            <div class="category-item">
                <div class="category-thumb">
                    <a href="product-details.html">
                        <img src="/galio/assets/img/product/product-img4.jpg" alt="">
                    </a>
                </div>
                <div class="category-content">
                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
                    <div class="price-box">
                        <div class="regular-price">
                            $150.00
                        </div>
                        <div class="old-price">
                            <del>$180.00</del>
                        </div>
                    </div>
                    <div class="ratings">
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <div class="pro-review">
                            <span>1 review(s)</span>
                        </div>
                    </div>
                </div>
            </div> <!-- end single item -->
        </div> <!-- end single item column -->
        <div class="col">
            <div class="category-item">
                <div class="category-thumb">
                    <a href="product-details.html">
                        <img src="/galio/assets/img/product/product-img5.jpg" alt="">
                    </a>
                </div>
                <div class="category-content">
                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
                    <div class="price-box">
                        <div class="regular-price">
                            $150.00
                        </div>
                        <div class="old-price">
                            <del>$180.00</del>
                        </div>
                    </div>
                    <div class="ratings">
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <div class="pro-review">
                            <span>1 review(s)</span>
                        </div>
                    </div>
                </div>
            </div> <!-- end single item -->
        </div> <!-- end single item column -->
        <div class="col">
            <div class="category-item">
                <div class="category-thumb">
                    <a href="product-details.html">
                        <img src="/galio/assets/img/product/product-img6.jpg" alt="">
                    </a>
                </div>
                <div class="category-content">
                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
                    <div class="price-box">
                        <div class="regular-price">
                            $150.00
                        </div>
                        <div class="old-price">
                            <del>$180.00</del>
                        </div>
                    </div>
                    <div class="ratings">
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <div class="pro-review">
                            <span>1 review(s)</span>
                        </div>
                    </div>
                </div>
            </div> <!-- end single item -->
        </div> <!-- end single item column -->
        <div class="col">
            <div class="category-item">
                <div class="category-thumb">
                    <a href="product-details.html">
                        <img src="/galio/assets/img/product/product-img10.jpg" alt="">
                    </a>
                </div>
                <div class="category-content">
                    <h4><a href="product-details.html">simple Product 01</a></h4>
                    <div class="price-box">
                        <div class="regular-price">
                            $150.00
                        </div>
                        <div class="old-price">
                            <del>$180.00</del>
                        </div>
                    </div>
                    <div class="ratings">
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <div class="pro-review">
                            <span>1 review(s)</span>
                        </div>
                    </div>
                </div>
            </div> <!-- end single item -->
        </div> <!-- end single item column -->
        <div class="col">
            <div class="category-item">
                <div class="category-thumb">
                    <a href="product-details.html">
                        <img src="/galio/assets/img/product/product-img12.jpg" alt="">
                    </a>
                </div>
                <div class="category-content">
                    <h4><a href="product-details.html">external Product 01</a></h4>
                    <div class="price-box">
                        <div class="regular-price">
                            $140.00
                        </div>
                        <div class="old-price">
                            <del>$160.00</del>
                        </div>
                    </div>
                    <div class="ratings">
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <div class="pro-review">
                            <span>1 review(s)</span>
                        </div>
                    </div>
                </div>
            </div> <!-- end single item -->
        </div> <!-- end single item column --> --}}
    </div>
</div>
