
@extends('layouts/app')
@section('title', 'Все товары магазина')
@section('content')


@include('layouts.breadcumb', array('h1' => 'Поиск товаров'))

<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <div class="widget catagory mb-50">
                        <h6 class="widget-title mb-30">Категории</h6>

                        @include('layouts.left_sidebar')
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <div class="total-products">
                                    <p><span>{{ (count($products)) }}</span> Товаров найдено</p>
                                </div>
                                <div class="product-sorting d-flex">
                                    <p>Сортировать по:</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortByselect">
                                            <option value="value">Цене</option>
                                            <option value="value">Newest</option>
                                            <option value="value">Price: $$ - $</option>
                                            <option value="value">Price: $ - $$</option>
                                        </select>
                                        <input type="submit" class="d-none" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @if (count($products))
                            @foreach($products as $product)
                                @include('catalog.product.card_product')
                            @endforeach 
                        @endif

                    </div>
                </div>
            
                    {{ $products->links('layouts.pagination') }} 
        
            </div>
        </div>
    </div>
</section>

@endsection

