
@extends('admin.layouts.home')
@section('title', 'Дополнительные настройки')
@section('h1', 'Дополнительные настройки')
@section('content')

     
 
    <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-4">
        <div class="card card-small blog-comments">
            <div class="card-header border-bottom">
                <h6 class="m-0">Характеристики</h6>
            </div>
            <div class="card-body p-2">
                <div>
                    <a class="btn btn-success mt-2" href="{{route('admin.charecter.group.all')}}"><i class="fa fa-plus-circle"></i>Группы характеристик</a>
                </div>
                <div> 
                    <a class="btn btn-success mt-2" href="{{route('admin.charecter.all')}}"><i class="fa fa-plus-circle"></i>Характеристики товаров</a>
                </div>
            </div>
          
        </div>
    </div>


@endsection

