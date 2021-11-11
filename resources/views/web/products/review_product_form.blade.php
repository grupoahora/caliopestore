@push('styles')
    {!! Html::style('bootstrap_star_rating/themes/krajee-fa/theme.css')!!}
    {!! Html::style('bootstrap_star_rating/css/star-rating.css')!!}
@endpush
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
    <div class="total-reviews">
        <div class="rev-avatar">
            <img src="{!!asset('/galio/assets/img/about/avatar.jpg')!!}" alt="">
        </div>
        <div class="review-box">
            <div class="ratings">
                <span class="good"><i class="fa fa-star"></i></span>
                <span class="good"><i class="fa fa-star"></i></span>
                <span class="good"><i class="fa fa-star"></i></span>
                <span class="good"><i class="fa fa-star"></i></span>
                <span><i class="fa fa-star"></i></span>
            </div>
<<<<<<< HEAD
            <div class="review-box">
                <div class="ratings">
                    <input id="input_rate_{{$key}}" name="rate" value="{{$rating->rating}}" class="rating-loading">
                    @push('scripts')
                    <script>
                        
                        $(document).ready(function(){
                        $('#input_rate_{{$key}}').rating({min: 0, max: 5, theme: 'krajee-fa', step: 1, stars: 5});
                    });
                    </script>
                    @endpush
                    {{-- <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-star"></i></span> --}}
                </div>
                <div class="post-author">
                    <p><span>admin -</span> 30 Nov, 2018</p>
                </div>
                
=======
            <div class="post-author">
                <p><span>admin -</span> 30 Nov, 2018</p>
>>>>>>> parent of c2af997 (david mirar)
            </div>
            
        </div>
    </div>
    
    
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
<<<<<<< HEAD

{{-- {!! Html::script('/js/jquery-3.6.0.min.js')!!} --}}

@push('scripts')
=======
@push('scripts')
{{-- {!! Html::script('/js/jquery-3.6.0.min.js')!!} --}}
>>>>>>> parent of c2af997 (david mirar)
{!! Html::script('js/star-rating.js')!!}
{!! Html::script('js/es.js')!!}
{!! Html::script('js/theme.js')!!}
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