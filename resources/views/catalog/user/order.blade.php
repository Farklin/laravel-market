@extends('layouts.app')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(/theme/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Информация о заказе</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <table class="table table-bordered">
                    <tr>
                        <th>№</th>
                        <th>Наименование</th>
                        <th>Цена</th>
                        <th>Кол-во</th>
                        <th>Стоимость</th>
                    </tr>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price, 2, '.', '') }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->cost, 2, '.', '') }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="4" class="text-right">Доставка</th>
                        <td>{{ $order->delivery }}</td> 
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">Итого</th>
                        <th>{{ $order->total() }}</th> 
                    </tr>
                </table>
            
               
                <div class="cart-page-heading">
                    <h2>Ваши данные</h2>
                    <ul class="order-details-form mb-4">
                        <li><span> Имя, фамилия: </span> <span> {{ $order->name }} </span></li>
                        <li><span>Адрес почты: </span> <span><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></span></li>
                        <li><span>Номер телефона: </span> <span>{{ $order->phone }}</span></li>
                        <li><span>Адрес доставки: </span> <span>{{ $order->address }}</span></li>
                        <li><span>Индекс </span> <span> {{ $order->index }} </span></li>
                    </ul>
             
                @isset ($order->comment)
                    <li>Комментарий: {{ $order->comment }}</li>
                @endisset
            </div>

            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@endsection
