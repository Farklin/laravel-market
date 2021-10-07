
@extends('admin.layouts.home')
@section('title', 'Заказы')
@section('h1', 'Заказы интернет магазина')

@section('content')

   
    
    <div class="col">


        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Заказы</h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">

                <table class="table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0 d-none d-md-inline-block">Номер заказа</th>
                            <th scope="col" class="border-0">Имя заказчика</th>
                            <th scope="col" class="border-0">Дата заказа</th>
                            <th scope="col" class="border-0"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="d-none d-md-inline-block">
                                    {{ $order->id }} 
                                </td>
                                <td>
                                    {{ $order->name }} 
                                </td>
                                <td>
                                    {{ $order->created_at }} 
                                </td>
                                <td>
                                    <a href="{{ route('admin.order.view', $order->id) }}"><i class="fa fa-eye"></i><span
                                            class="d-none d-md-inline-block"> Перейти </span> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

