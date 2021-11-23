<div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
    <!-- sidebar categorie start -->
    <div class="sidebar-widget mb-30">
        <div class="sidebar-title mb-10">
            <h3>Sub-Categorias</h3>
        </div>
        <div class="product-tag">
            <ul>
                
                @if (isset($subcategories))
                    @foreach ($subcategories as $subcategory)
                    <div class=" d-inline-block mr-1 pb-1">
                        <form class="" action="{{route('web.search_products_by_subcategory')}}" method="GET" >
                            <div class="">
                                <input name="search_id_category" type="hidden" class="" value="{{$subcategory->category_id}}">
                                <input name="search_id_subcategory" type="hidden" class="" value="{{$subcategory->id}}">
                                <div class="d-block d-inline-block ">
                                    <button type="submit" class="w-auto my-1 shadowcaliope " >{{$subcategory->name}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endforeach
                @else
                    @if (isset($web_subcategories))
                        @foreach ($web_subcategories as $subcategory)
                        <div class=" d-inline-block mr-1 pb-1">
                            <form class="" action="{{route('web.search_products_by_subcategory')}}" method="GET" >
                                <div class="">
                                    <input name="search_id_category" type="hidden" class="" value="{{$subcategory->category_id}}">
                                    <input name="search_id_subcategory" type="hidden" class="" value="{{$subcategory->id}}">
                                    <div class="d-block d-inline-block ">
                                        <button type="submit" class="w-auto my-1 shadowcaliope " >{{$subcategory->name}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    @endif
                @endif
                
            </ul>
        </div>
    </div>
</div>