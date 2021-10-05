
@extends('admin.layouts.home')
@section('title', 'Все товары')
@section('content')

    <div class="container">
        <h4> Товары </h4>

        <div class="row m-3">
            <div class="col-md-4">
                <a class="btn-sm btn-primary" href ="{{ route('admin.product.form.create') }}"> <i class="fa fa-plus"></i> Создать </a> 
            </div>
            <div class="col-md-4">
                <a class="btn-sm btn-primary" href ="{{ route('admin.product.export') }}"> <i class="fa fa-download"></i> Экспорт товаров</a> 
            </div>
         
            <div class="col-md-4 d-none d-md-block">
                <a class="btn-sm btn-primary" href ="{{ route('admin.product.import') }}"> <i class="fa fa-download"></i> Импорт товаров</a> 
            </div>
         
        
        </div>
    
        <table class="table table-bordered">
            <tbody>
            @foreach($products as $product)
                <tr class="table"> 
                    <td>
                        <a href = "{{route('admin.product.form.update', $product->id)}}">
                            @if($product->images->first() != null)
                                <img src="{{$product->images->first()->thumbnail() }}" width='100' alt="">
                            @endif 
                        </a> 
                    </td>
                   

                    <td>
                        {{$product->title}}
                        <br> 
                        <a class="d-none d-sm-block" href = '{{route('admin.product.form.update', $product->id)}}'>Изменить</a> 
                    </td>
                    <td class="d-none d-sm-block d-md-none">
                        {{$product->price}}
                    </td>
                    <td class="d-none d-md-block">
                        <a href = '{{route('admin.product.form.update', $product->id)}}'>Изменить</a> 
                    </td>
                    <td class="d-none d-md-block">
                        <a class="text-danger" href = '{{route('admin.product.delete', $product->id)}}'>Удалить</a> 
                    </td>
                </tr> 
            @endforeach
        </tbody>
        </table>
    </div>
    

@endsection

