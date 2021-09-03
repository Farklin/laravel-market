@extends('layouts.app')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(/theme/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Ваши заказы</h2>
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
