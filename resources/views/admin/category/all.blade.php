@extends('admin.layouts.home')
@section('title', 'Категории')
@section('h1', 'Категории магазина')

@section('content')


    <div class="col-12">
        <a href="{{ route('admin.category.form.create') }} " class="btn btn-primary btn"><i class="fa fa-plus"> </i>  Создать новую категорию</a>
    </div>
    


    <div class="col">


        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Категории</h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">

                <table class="table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">ID</th>
                            <th scope="col" class="border-0">Название категории</th>
                            <th scope="col" class="border-0"></th>
                            <th scope="col" class="border-0"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->id }}
                                </td>
                                <td>
                                    {{ $category->title }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.category.form.update', $category->id) }}"><i
                                            class="fa fa-edit"></i><span class="d-none d-md-inline-block"> Изменить </span> </a>
                                </td>
                                <td>
                                    <a class="text-danger" href="{{ route('admin.category.delete', $category->id) }}"  onclick="return confirm('Вы уверены что хотите удалить категорию?')"><i
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
