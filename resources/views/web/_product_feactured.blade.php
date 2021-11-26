<div class="col-lg-3 col-md-4 col-sm-6">
    <!-- product single grid item start -->
    <div class="product-item fix mb-30">
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
            <div class="product-action-link">
                {{-- <a href="#" data-toggle="modal" data-target="#quick_view_feactured{{$product->id}}"> <span data-toggle="tooltip"
                        data-placement="left" title="Quick view feactured"><i class="fa fa-search"></i></span> </a> --}}
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
</div>

