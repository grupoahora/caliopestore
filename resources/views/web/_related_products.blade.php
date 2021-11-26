<div class="related-products-area my-5">
    <div class="section-title mb-30">
        <div class="title-icon">
            <i class="fa fa-desktop"></i>
        </div>
        <h3>Productos Relacionados</h3>
    </div> <!-- section title end -->
    <!-- featured category start -->
    <div class="latest-product-active slick-padding slick-arrow-style">
        <!-- product single item start -->
        @foreach ($products_category as $product)
            
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="{{route('web.product_details', $product)}}">
                        @foreach ($product->images as $image)
                        <img src="{{$image->url}}" 
                        class="@if($loop->first) img-pri @else img-sec @endif" alt="{{$product->name}}">
                            
                        @endforeach
                    </a>
                    {{-- <div class="product-label">
                        <span>hot</span>
                    </div> --}}
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
                        <div class="ratings">
                            <input id="input_rate_{{$product->id}}rela" name="rate" value="{{$product->AverageRating}}" class="rating-loading">
                            
                            @push('scripts')
                                <script>
                                    $(document).ready(function(){
                                        $('#input_rate_{{$product->id}}rela').rating({
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
                        </div>
                        <div class="pro-review">
                            <span>{{$product->timesRated()}} ({{round($product->userAverageRating, 1)}}) Calificació(s)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product single item end -->
        @endforeach
    </div>
    <!-- featured category end -->
</div>
