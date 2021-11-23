<div class="row">
                                            @foreach ($subcategory->products as $key => $product)
                                            <div class="col-3">
                                                <button class="pro-nav-thumb{{$product->id}} border border-0 bg-transparent" id="product_id" value="{{$product->id}}">
                                            
                                                    {{-- <input type="button" "> --}}
                                                        <img   src="{{$product->textures->pluck('url')[0]}}"
                                                        alt="{{$product->name}}" />
                                                        
                                                    
                                                    
                                                </button>
                                                
                                                @push('scripts')
                                                    
                                                <script>
                                                    var product = $('.pro-nav-thumb{{$product->id}}');
                                                    /* console.log(product); */
                                                    var productdetail = $('#productdetail_id');
                                                    var imgs = $('#imgs');
                                                    var imgs2 =   $('#imgs2');
                                                    var envio = product.click(function(){
                                                        var productval = $('.pro-nav-thumb{{$product->id}}').val();
                                                        var urlproducdetail = "{{route('web.product_details', $product)}}";
                                                        
                                                        $.ajax({
                                                            url: "{{route('get_product_by_product')}}",
                                                            method: 'GET',
                                                            data: {
                                                                product: productval,
                                                            },
                                                            
                                                            success: function(data){
                                                                productdetail.empty();
                                                                /* productdetail.append('<input type="text" value="seleccione una textura">'); */
                                                                $.each(data, function(index, element){
                                                                    productdetail.append('<h3><a href='+'"'+ urlproducdetail+ '">' + element.name +'</a>'+'</h3>');
                                                                });
                                                                
                                                            },
                                                            
                                                        });
                                                       
                                                        
                                                    });
                                                    /* console.log(envio); */
                                                </script>
                                                @endpush
                                            
                                                <div class="ratings">
                                                    <input id="input_rate_{{$product->id}}" name="rate" value="{{$product->AverageRating}}" class="rating-loading">
                                                    @push('scripts')
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#input_rate_{{$product->id}}').rating({
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
                                                    @push('modal')
                                                        <div class="modal fade" id="modal-default">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content rounded-0">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title my-3">Editar Dirección</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    {!! Form::open(['route'=>['web.rate_product', $product], 'method'=>'POST']) !!}
                                                                    <div class="modal-body">
                                                                        
                                                                        <div class="single-input-item">
                                                                            <label class="col-form-label">
                                                                                <span class="text-danger">*</span> 
                                                                                Calificación general
                                                                            </label>
                                                                            <div class="form-group">
                                                                                {{-- <label for="input-1" class="control-label">Puntuacion:</label> --}}
                                                                                <input id="input-1" name="rate" value="" class="rating-loading">
                                                                            </div>
                                                        
                                                                        </div>
                                                                        <div class="single-input-item">
                                                                            <label class="col-form-label"><span class="text-danger">*</span>Comentario</label>
                                                                            <textarea class="form-control" name="comment" required></textarea>
                                                                            
                                                                        </div>
                                                                        

                                                                                

                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                        <button type="submit" class="check-btn sqr-btn">Guardar cambios</button>
                                                                    </div>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                    @endpush
                                                    @push('scripts')

                                                        <script>
                                                        $(document).ready(function(){
                                                            $('#input-1').rating({
                                                                language: 'es',
                                                                step: 1,
                                                                theme: 'krajee-fa',
                                                                starCaptions: {1: 'Muy Malo', 2: 'Malo', 3: 'Está bien', 4: 'Bueno', 5: 'Muy Bueno'},
                                                                    starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
                                                            });
                                                        });
                                                        </script>
                                                    @endpush
                                                </div>
                                                <span>{{$product->timesRated()}} ({{round($product->userAverageRating, 1)}})</span>
                                                <div class="customer-rev">
                                                    <a href="#" data-toggle="modal" data-target="#modal-default">Escribir un Comentario</a>
                                                </div>
                                                <div class="pro-review">
                                                    
                                                    <span>
                                                        <div class="availability mt-10">
                                                            <h5>Disponible:</h5>
                                                            <span>{{$product->stock}} en inventario</span>
                                                        </div>
                                                    </span>
                                                    <span>
                                                        <div class="pricebox">
                                                            <span class="regular-price">${{$product->sell_price}}</span>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                {!! Form::open(['route'=>['shopping_cart_details.store', $product], 'method' => 'POST']) !!}
                                               
                                                    
                                                <div class="quantity-cart-box d-flex align-items-center {{-- {{$class}} --}}">
                                                    <div class="row">
                                                        <div class="col-12 py-2">
                                                            <div class="quantity">
                                                                <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
                                                            </div>

                                                        </div>
                                                        <div class="col-12">

                                                            <div class="pro-size mb-20 mt-20">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h5>Tamaño:</h5>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <select class="nice-select" name="size" >
                                                                            @foreach ($product->sizes as $size)
                                                                                <option value="{{$size->name}}">{{$size->name}}</option>
                                                                            @endforeach
                                                                            
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-12 py-2">
                                                            <div class="action_link">
                                                                <button class="buy-btn" type="submit">add to cart
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                            @endforeach
                                        </div>

                                        





                                        <div class="feature-category-area mt-md-70">
                                        <div class="latest-product-active slick-padding slick-arrow-style"> 
                                    @foreach ($subcategory->products as $key => $product)
                                    @include('web._product_feactured')
                                        
                                    @endforeach
                                        </div>
                                    </div>