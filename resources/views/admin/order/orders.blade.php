
@extends('admin.layouts.home')
@section('title', 'Администратор: Все заказы')
@section('content')

    <div class="container">
        <h4> Заказы </h4>

        <table>
            @if(count($orders))
                @foreach($orders as $order)
                    <tr class="table"> 
                        <td>
                            {{ $order->name }} 
                        </td>
                        <td>
                            {{ $order->phone }} 
                        </td>
                        <td>
                            {{ $order->address }}  
                        </td>
                        <td>
                            {{ $order->amount }}  
                        </td>
                        <td>
                            {{ $order->delivery }}  
                        </td>
                        <td>
                           <a href="{{ route('admin.order.view', $order->id) }}">Перейти</a>
                        </td>
                      
                    </tr> 

                    
                @endforeach
            @endif 
        </table>

        
    </div>

@endsection

