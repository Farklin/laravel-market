
@extends('layouts/app')
@section('title', $category->seo->title)
@section('description', $category->seo->description)
@section('content')


@include('layouts.breadcumb', array('h1' =>  $category->title))

<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <!-- ##### Single Widget ##### -->
                    <div class="widget catagory mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Категории</h6>

                        <!--  Catagories  -->
                        @include('layouts.left_sidebar')
                    </div>

                    {{-- <!-- ##### Single Widget ##### -->
                    <div class="widget price mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Filter by</h6>
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">Price</p>

                        <div class="widget-desc">
                            <div class="slider-range">
                                <div data-min="49" data-max="360" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="49" data-value-max="360" data-label-result="Range:">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                </div>
                                <div class="range-price">Range: $49.00 - $360.00</div>
                            </div>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget color mb-50">
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">Color</p>
                        <div class="widget-desc">
                            <ul class="d-flex">
                                <li><a href="#" class="color1"></a></li>
                                <li><a href="#" class="color2"></a></li>
                                <li><a href="#" class="color3"></a></li>
                                <li><a href="#" class="color4"></a></li>
                                <li><a href="#" class="color5"></a></li>
                                <li><a href="#" class="color6"></a></li>
                                <li><a href="#" class="color7"></a></li>
                                <li><a href="#" class="color8"></a></li>
                                <li><a href="#" class="color9"></a></li>
                                <li><a href="#" class="color10"></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget brands mb-50">
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">Brands</p>
                        <div class="widget-desc">
                            <ul>
                                <li><a href="#">Asos</a></li>
                                <li><a href="#">Mango</a></li>
                                <li><a href="#">River Island</a></li>
                                <li><a href="#">Topshop</a></li>
                                <li><a href="#">Zara</a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                    <p><span>{{ count($category->products) }}</span> Товаров найдено</p>
                                </div>
                                <!-- Sorting -->
                                <div class="product-sorting d-flex">
                                    <p>Сортировать по:</p>
                                    <form action="" method="get">
                                        <select name="sort" id="sortByselect">
                                            <option value="new">Новинки</option>
                                            <option value="upname">от А-Я</option>
                                            <option value="downname">от Я-Адрес</option>
                                            <option value="upprice">Цена: $$ - $</option>
                                            <option value="downprice">Цена: $ - $$</option>
                                        </select>
                                        <input id="btn-sort" type="submit" class="d-none" value="">
                                    </form>
                                    <script type="text/javascript"> 
                                        $("#sortByselect").change(function(){
                                            $("#btn-sort").click(); 
                                        }); 
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        @foreach($products as $product)
                        <!-- Single Product -->
                           @include('catalog.product.card_product')
                        @endforeach 


                    </div>
                </div>
                <!-- Pagination -->
               
                        {{ $products->links('layouts.pagination') }} 
        
            </div>
        </div>
    </div>
</section>

@endsection

