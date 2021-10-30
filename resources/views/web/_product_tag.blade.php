<div class="sidebar-widget mb-22">
    <div class="sidebar-title mb-10">
        <h3>Etiquetas</h3>
    </div>
    <div class="sidebar-widget-body">
        <div class="product-tag">
            @foreach ($web_tags as $tag)
            <div class=" d-inline-block mr-1 pb-1 ">
                <form class="" action="{{route('web.search_products_by_tag')}}" method="GET">
                    <div class="">
                        <input name="search_id_tag" type="hidden" class="" value="{{$tag->id}}">
                        <button type="submit" class="w-auto my-1 bg-transparente">{{$tag->name}}</button>
                    </div>
                </form>
            </div>
            {{-- <li><a href="#"></a><span>(10)</span></li> --}}
            @endforeach
            {{-- <a href="#">camera</a>
                                <a href="#">computer</a>
                                <a href="#">tablet</a>
                                <a href="#">watch</a>
                                <a href="#">smart phones</a>
                                <a href="#">handbag</a>
                                <a href="#">shoe</a>
                                <a href="#">men</a> --}}
        </div>
    </div>
</div>
