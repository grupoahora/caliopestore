{!! Form::open(['route'=>['shopping_cart_details.store', $product], 'method' => 'POST']) !!}
<div class="color-option mt-10">
    <h5>color/textura :</h5>
     @foreach ($product->textures as $texture)
     
     <input type="checkbox" id="{{$texture->id}}" value="{{$texture->id}}" name="color">
     <img src="{{$texture->url}}" 
                width="35px" height="35px" class="mx-1 bordercaliope" class="@if($loop->first)@else d-none @endif" alt="{{$product->name}}">
                    
                @endforeach
    {{-- @foreach ($product->colors as $item)
    <input type="checkbox" id="{{$item->id}}" value="{{$item->id}}" name="color"> <label for="color"><img width="35px" height="35px" class="mx-1 bordercaliope" src="{{$item->images->pluck('url')[0]}}" alt=""></label>
    @endforeach --}}
        
</div>
<div class="quantity-cart-box d-flex align-items-center {{$class}}">
    <div class="quantity">
        <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
    </div>
    <div class="action_link">
        <button class="buy-btn" type="submit">add to cart
            <i class="fa fa-shopping-cart"></i>
        </button>
    </div>
</div>
{!! Form::close() !!}
