{!! Form::open(['route'=>['shopping_cart_details.store', $product], 'method' => 'POST']) !!}

    <div class="quantity-cart-box d-flex align-items-center {{$class}}">
        <div class="d-block">
            <div class="pro-size mb-20 mt-20">
                
                        
                            <h5 class="fw-bold-caliope">Tamaño:</h5>
                        
                        <select class="nice-select" name="size" >
                            @foreach ($product->sizes as $size)
                                <option value="{{$size->name}}">{{$size->name}}</option>
                            @endforeach
                            
                            
                        </select>
                    
                
                
            </div>
            
                <div class="quantity mx-auto mb-3">
                    <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
                </div>
                <div class="action_link">
                    <button class="buy-btn" type="submit">add to cart
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                </div>
            
        </div>
    </div>
{!! Form::close() !!}
