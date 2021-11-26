{!! Form::open(['route'=>['shopping_cart_details.store', $product], 'method' => 'POST']) !!}
{{-- <div class="color-option mt-10">
    <h5>color/textura :</h5>
     @foreach ($product->textures as $texture)
     
     <input type="checkbox" id="{{$texture->id}}" value="{{$texture->id}}" name="color">
     <img src="{{$texture->url}}" 
                width="35px" height="35px" class="mx-1 bordercaliope" class="@if($loop->first)@else d-none @endif" alt="{{$product->name}}">
                    
                @endforeach
    
        
</div> --}}
    {{-- <div class="col-12">

        
    </div> --}}
    <div class="quantity-cart-box d-flex align-items-center {{$class}}">
        <div class="d-block">
            <div class="pro-size mb-20 mt-20">
                
                        
                            <h5>Tamaño:</h5>
                        
                        <select class="nice-select" name="size" >
                            @foreach ($product->sizes as $size)
                                <option value="{{$size->name}}">{{$size->name}}</option>
                            @endforeach
                            
                            
                        </select>
                    
                
                
            </div>
        </div>
        <div class="quantity mx-auto">
            <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
        </div>
        <div class="action_link">
            <button class="buy-btn" type="submit">add to cart
                <i class="fa fa-shopping-cart"></i>
            </button>
        </div>
       
    </div>
{!! Form::close() !!}
