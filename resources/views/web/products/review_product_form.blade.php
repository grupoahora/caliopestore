
{{-- <form action="#" class="review-form"> --}}
    <div class="row">
        <div class="col">
            <h5>1 review for Simple product 12</h5>
        </div>
        <div class="col">
            <div class="buttons float-right">
                <button class="sqr-btn" data-toggle="modal" data-target="#modal-default">Escribir comentario</button>
            </div>
        </div>
    </div>
    @foreach ($product->ratings as $key => $rating)
        
    
    <div class="total-reviews">
        <div class="rev-avatar">
            {{-- <img src="{!!asset('/galio/assets/img/about/avatar.jpg')!!}" alt=""> --}}
            <img src="{{auth()->user()->avatar}}" alt="">
        </div>
        <div class="review-box">
            <div class="review-box">
                <div class="ratings">
                    <input id="input_rate_{{$key}}" name="rate" value="{{$rating->rating}}" class="rating-loading">
                    @push('scripts')
                    <script>
                        $(document).ready(function(){
                            $('#input_rate_{{$key}}').rating({
                                min: 0,
                                max: 5,
                                theme: 'krajee-fa', 
                                step: 1, 
                                language: 'es',
                                size: 'xs', 
                                stars: 5,
                                starCaptions: {1: 'Muy Malo', 2: 'Malo', 3: 'Está bien', 4: 'Bueno', 5: 'Muy Bueno'},
                                starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
                            });
                        });
                    </script>
                    @endpush
                    <span><i class="fa fa-star"></i></span> --}}
                </div>
                <div class="post-author">
                    <p><span>{{$rating->user->name}} -</span> {{$rating->created_at}}</p>
                    <p>{{$rating->comment}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    
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

    
{{-- </form> --}} <!-- end of review-form -->

{{-- {!! Html::script('/js/jquery-3.6.0.min.js')!!} --}}

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