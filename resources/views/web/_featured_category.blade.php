<div class="sidebar-widget mb-22">

    <div class="section-title-2 d-flex justify-content-between mb-28">
        <h3>Destacados</h3>
        <div class="category-append"></div>
    </div> <!-- section title end -->
    <div class="category-carousel-active row" data-row="4">
        @foreach ($web_feacturedproducts as $product)
        <div class="col">
            <div class="category-item">
                <div class="category-thumb">
                    <a href="{{route('web.product_details', $product)}}">
                        <img src="{{$product->images->pluck('url')[0]}}" alt="">
                    </a>
                    
                </div>
                <div class="category-content">
                    <h4><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h4>
                    <div class="price-box ">
                        <div class="regular-price ">
                            ${{$product->sell_price}}
                        </div>
                        <div class="old-price ">
                            <del>${{$product->sell_price}}</del>
                        </div>
                        
                        <div class="ratings">
                            <input id="input_rate_{{$product->id}}2" name="rate" value="{{$product->AverageRating}}" class="rating-loading">
                            
                            @push('scripts')
                                <script>
                                    $(document).ready(function(){
                                        $('#input_rate_{{$product->id}}2').rating({
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
            </div> <!-- end single item -->
        </div>
        @endforeach
    </div> <!-- end single item column -->
</div>

