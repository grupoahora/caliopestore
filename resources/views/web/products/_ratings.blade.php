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
    <div class="pro-review">
        <span>{{$product->timesRated()}} ({{round($product->userAverageRating, 1)}}) Calificació(s)</span>
    </div>
</div>
