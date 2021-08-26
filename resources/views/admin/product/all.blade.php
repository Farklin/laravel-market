
@extends('admin.layouts.home')
@section('title', 'Все товары')
@section('content')

    <div class="container">
        <h4> Товары </h4>

        <a class="btn btn-primary" href ="{{ route('admin.product.form.create') }}"> Создать новый товар </a> 
        <table>

            @foreach($products as $product)
                <tr class="table"> 
                    <td>
                        <a href = "{{route('admin.product.form.update', $product->id)}}">
                            @if($product->images->first() != null)
                                <img src="{{$product->images->first()->image_path}}" width='100' alt="">
                            @endif 
                        </a> 
                    </td>
                    <td>
                        {{$product->title}}
                    </td>
                    <td>
                        <a href = '{{route('admin.product.form.update', $product->id)}}'>Изменить</a> 
                    </td>
                    <td>
                        <a class="text-danger" href = '{{route('admin.product.delete', $product->id)}}'>Удалить</a> 
                    </td>
                </tr> 
            @endforeach

        </table>
    </div>

@endsection

