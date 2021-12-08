@extends('admin.layouts.home')
@section('title', 'Актуальные подборки товаров')
@section('h1', 'Актуальные подборки товаров')

@section('content')


    <div class="col-12">
        <a href="{{ route('admin.actual.create') }} " class="btn btn-primary btn"><i class="fa fa-plus"> </i>Создать</a>
    </div>
    <div class="col">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Актуальное</h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">

                <table class="table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">ID</th>
                            <th scope="col" class="border-0">Название</th>
                            <th scope="col" class="border-0">Описание</th>
                            <th scope="col" class="border-0"></th>
                            <th scope="col" class="border-0"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actuals as $actual)
                            <tr>
                                <td>
                                    {{ $actual->id }}
                                </td>
                                <td>
                                    {{ $actual->title }}
                                </td>
                                <td>
                                    {{ $actual->description }}

                                <td>
                                    <a href="{{ route('admin.actual.edit', $actual) }}">
                                        <i class="fa fa-edit"></i>
                                        <span class="d-none d-md-inline-block"> Изменить</span>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.actual.destroy', $actual) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-danger"
                                            onclick="return confirm('Вы уверены что хотите удалить подборку?')">
                                            <i class="fa fa-trash"></i>
                                            <span class="d-none d-md-inline-block"> Удалить</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


@endsection
