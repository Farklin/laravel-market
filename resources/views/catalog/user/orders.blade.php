@extends('layouts.app')
@section('title', 'Информация о всех заказах пользователя TeisBubble')
@section('content')

@include('layouts.breadcumb', array('h1' => 'Ваши заказы'))

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                @if(count($orders)>0)
                <table class="table table-bordered">
                    <tr>
                        <th>№</th>
                        <th>Цена</th>
                        <th>Дата</th>
                    </tr>
                    @foreach($orders as $order)
                    <tr>
                       <td>{{ $loop->iteration}} </td>
                       <td>{{ $order->total() }} </td>
                       <td>{{ $order->created_at }} </td>
                       <td><a href = "{{ route('user.order', $order->id) }}" >Перейти</a> </td>
                    </tr>
                    @endforeach
                   
                </table>
                @else
                <div> 
                    <h2 > Нету заказов </h2> 
                </div>
                
                @endif
            
             

            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@endsection
