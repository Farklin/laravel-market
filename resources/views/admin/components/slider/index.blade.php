@extends('admin.layouts.home')
@section('title', 'Слайдер на главной странице')
@section('h1', 'Категории магазина')

@section('content')


    <div class="col-12">
        <a href="{{ route('admin.slider.create') }} " class="btn btn-primary btn"><i class="fa fa-plus"> </i>  Создать новый слайд</a>
    </div>
    


    <div class="col">


        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Слайды</h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">

                <table class="table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">ID</th>
                            <th scope="col" class="border-0">Название</th>
                            <th scope="col" class="border-0">Описание</th>
                            <th scope="col" class="border-0">Цена</th>
                            <th scope="col" class="border-0">Статус</th>
                            <th scope="col" class="border-0">Картинка</th>
                            <th scope="col" class="border-0"></th>
                            <th scope="col" class="border-0"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>
                                    {{ $slider->id }}
                                </td>
                                <td>
                                    {{ $slider->title }}
                                </td>
                                <td>
                                    {{ $slider->description }}
                                </td>
                                <td>
                                    {{ $slider->price }}
                                </td>
                                <td>
                                    {{ $slider->status }}
                                </td>
                                <td>
                                    <img width="100" src="{{ asset($slider->image) }}">
                                </td>
                                <td>
                                    <a href="{{ route('admin.slider.edit', $slider->id) }}"><i
                                            class="fa fa-edit"></i><span class="d-none d-md-inline-block"> Изменить </span> </a>
                                </td>
                                <td>
                                    <a class="text-danger" href="{{ route('admin.slider.destroy', $slider->id) }}"  onclick="return confirm('Вы уверены что хотите удалить слайд?')"><i
                                            class="fa fa-trash"></i><span class="d-none d-md-inline-block"> Удалить</span> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>


@endsection
