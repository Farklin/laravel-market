@extends('layouts.app')

@section('content')

@include('layouts.breadcumb', array('h1' => 'Ваши заказы'))

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

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
            
             

            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@endsection
