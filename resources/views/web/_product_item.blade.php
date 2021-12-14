<div class="col-lg-3 col-md-4 col-sm-6">
    <!-- product single grid item start -->
    <div class="product-item fix mb-30">
        <div class="product-thumb">
            <a href="{{route('web.product_details', $product)}}">
                @foreach ($product->images as $image)
                <img src="{{$image->url}}" 
                class="@if($loop->first) img-pri @else img-sec @endif" alt="{{$product->name}}">
                    
                @endforeach
                {{-- <img src="{{$product->images->pluck('url')[1]}}" 
                class="img-sec" alt="{{$product->name}}"> --}}
            </a>
            <div class="product-label">
                <span>hot</span>
            </div>
            <div class="product-action-link">
                <a href="#" data-toggle="modal" data-target="#quick_view{{$product->id}}"> <span data-toggle="tooltip"
                        data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                        class="fa fa-heart-o"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i
                        class="fa fa-refresh"></i></a>
                <a href="{{route('store_a_product', $product)}}" data-toggle="tooltip" data-placement="left" title="Add to cart"><i
                        class="fa fa-shopping-cart"></i></a>
            </div>
        </div>
        <div class="product-content">
            <h4><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h4>
            <div class="pricebox">
                <span class="regular-price">${{$product->sell_price}}</span>
                @include('web.products._ratings')
            </div>
        </div>
    </div>
    <!-- product single grid item end -->
    <!-- product single list item start -->
    <div class="product-list-item mb-30">
        <div class="product-thumb">
            <a href="{{route('web.product_details', $product)}}">
                @foreach ($product->images as $image)
                <img src="{{$image->url}}" 
                class="@if($loop->first) img-pri @else img-sec @endif" alt="{{$product->name}}">
                    
                @endforeach
            </a>
            <div class="product-label">
                <span>hot</span>
            </div>
        </div>
        <div class="product-list-content">
            <h3><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h3>
            <div class="ratings">
                <input id="input_rate_2{{$product->id}}" name="rate" value="{{$product->AverageRating}}" class="rating-loading">
                @push('scripts')
                <script>
                    $(document).ready(function(){
                        $('#input_rate_2{{$product->id}}').rating({
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
                <div class="pro-review">
                    <span>{{$product->timesRated()}} ({{round($product->userAverageRating, 1)}}) Calificacióm(s)</span>
                </div>
            </div>
            <div class="pricebox">
                <span class="regular-price">${{$product->sell_price}}</span>
                {{-- <span class="old-price"><del>$90.00</del></span> --}}
            </div>
            <p>
                {{$product->short_description}}
            </p>
            <div class="product-list-action-link">
                <a class="buy-btn" href="{{route('web.product_details', $product)}}" data-toggle="tooltip" data-placement="top" title="Add to cart">Ver mas <i
                        class="fa fa-shopping-cart"></i> </a>
                <a href="#" data-toggle="modal" data-target="#quick_view{{$product->id}}"> <span data-toggle="tooltip"
                        data-placement="top" title="Quick view"><i class="fa fa-search"></i></span> </a>
                {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i
                        class="fa fa-heart-o"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a> --}}
            </div>
        </div>
    </div>
    <!-- product single list item start -->
</div> <!-- product single column end -->
@include('web._modal_quick_view')