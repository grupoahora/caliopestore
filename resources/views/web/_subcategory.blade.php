<div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
                    <!-- sidebar categorie start -->
                    <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>Categorias</h3>
                        </div>
                        <div class="product-tag">
                            <ul>
                                
                                @foreach ($web_subcategories as $subcategory)
                                <div class=" d-inline-block mr-1 pb-1 ">

                                    <form class="" action="{{route('web.search_products_by_subcategory')}}" method="GET" >
                                        <div class="">
                                            <input name="search_id_subcategory" type="hidden" class="" value="{{$subcategory->id}}">
                                            
                                            <div class="d-block d-inline-block ">
                                                <button type="submit" class="w-auto my-1 shadowcaliope " >{{$subcategory->name}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                    {{-- <li><a href="#"></a><span>(10)</span></li> --}}
                                @endforeach
                                {{-- <li><a href="#">books</a><span>(10)</span></li>
                                <li><a href="#">camera</a><span>(12)</span></li>
                                <li><a href="#">computer</a><span>(08)</span></li>
                                <li><a href="#">electronic</a><span>(16)</span></li>
                                <li><a href="#">Necklaces</a><span>(11)</span></li>
                                <li><a href="#">Rugby</a><span>(20)</span></li>
                                <li><a href="#">smart phones</a><span>(15)</span></li>
                                <li><a href="#">tablet</a><span>(12)</span></li>
                                <li><a href="#">watch</a><span>(10)</span></li> --}}
                            </ul>
                        </div>
                    </div>
                    <!-- sidebar categorie start -->
                    <!-- manufacturer start -->
                    {{-- <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>Manufacturers</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul>
                                <li><i class="fa fa-angle-right"></i><a href="#">calvin klein</a><span>(10)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">diesel</a><span>(12)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">polo</a><span>(20)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">Tommy Hilfiger</a><span>(12)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">Versace</a><span>(16)</span></li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- manufacturer end -->
                    <!-- pricing filter start -->
                    {{-- <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>filter by price</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <div class="price-range-wrap">
                                <div class="price-range" data-min="50" data-max="400"></div>
                                <div class="range-slider">
                                    <form action="#" class="d-flex justify-content-between">
                                        <button class="filter-btn">filter</button>
                                        <div class="price-input d-flex align-items-center">
                                            <label for="amount">Price: </label>
                                            <input type="text" id="amount">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- pricing filter end -->
                    <!-- product size start -->
                    {{-- <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>size</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul>
                                <li><i class="fa fa-angle-right"></i><a href="#">s</a><span>(10)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">m</a><span>(12)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">l</a><span>(20)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">XL</a><span>(12)</span></li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- product size end -->
                    
                    <!-- sidebar banner start -->
                    {{-- <div class="sidebar-widget mb-30">
                        <div class="img-container fix img-full">
                            <a href="#"><img src="assets/img/banner/banner_shop.jpg" alt=""></a>
                        </div>
                    </div> --}}
                    <!-- sidebar banner end -->
                </div>