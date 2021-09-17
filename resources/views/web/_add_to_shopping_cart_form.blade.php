{!! Form::open(['route'=>['shopping_cart_details.store', $product], 'method' => 'POST']) !!}
    <div class="quantity-cart-box d-flex align-items-center mt-20">
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