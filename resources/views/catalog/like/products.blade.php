
@extends('layouts/app')
@section('title', 'Понравившиеся товары')
@section('description', 'На данной странице собраны все товары которые понравились пользователю. ')
@section('content')

@include('layouts.breadcumb', array('h1' => 'Все товары '))

<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
               <div class="col-12 col-md-8 col-lg-12">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                    <p><span>{{ count($products) }} </span>Понравившиеся товары</p>
                                </div>
                                <!-- Sorting -->
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

                        @foreach($products as $product)
                        <!-- Single Product -->
                            @include('catalog.product.card_product')
                        @endforeach 


                    </div>
                </div>
                <!-- Pagination -->
                {{-- {{ $products->links('layouts.pagination') }}  --}}
            </div>
        </div>
    </div>
</section>

@endsection

