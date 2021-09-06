@extends('layouts.app')

@section('content')

    @include('layouts.breadcumb', array('h1' => 'Заказ размещен'))


    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <p>Ваш заказ успешно размещен. Наш менеджер скоро свяжется с Вами для уточнения деталей.</p>

                <h2>Ваш заказ</h2>
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
                        <th colspan="4" class="text-right">Итого</th>
                        <th>{{ number_format($order->amount, 2, '.', '') }}</th>
                    </tr>
                </table>
            
               
                <div class="cart-page-heading">
                    <h2>Ваши данные</h2>
                    <ul class="order-details-form mb-4">
                        <li><span> Имя, фамилия: </span> <span> {{ $order->name }} </span></li>
                        <li><span>Адрес почты: </span> <span><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></span></li>
                        <li><span>Номер телефона: </span> <span>{{ $order->phone }}</span></li>
                        <li><span>Адрес доставки: </span> <span>{{ $order->address }}</span></li>
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
