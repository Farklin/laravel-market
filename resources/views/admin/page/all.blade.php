@extends('admin.layouts.home')
@section('title', 'Статические страницы')
@section('h1', 'Статические страницы')
@section('content')



    <div class="col-12">
        <a href="{{ route('admin.page.create') }} " class="btn-primary btn">Создать страницу</a>
    </div>



    <div class="col">


        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Страницы</h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">

                <table class="table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0 d-none d-md-inline-block">ID</th>
                            <th scope="col" class="border-0">Название</th>
                            <th scope="col" class="border-0"></th>
                            <th scope="col" class="border-0"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td class="d-none d-md-inline-block">
                                    {{ $page->id }}
                                </td>
                                <td>
                                    {{ $page->title }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.page.update', $page->id) }}"><i
                                            class="fa fa-edit"></i><span class="d-none d-md-inline-block"> Изменить
                                        </span> </a>
                                </td>
                                <td>
                                    <a href="{{ route('page', $page->seo->slug) }}"><i class="fa fa-eye"></i><span
                                            class="d-none d-md-inline-block"> Просмотреть </span> </a>
                                </td>

                                <td>
                                    <a class="text-danger" href="{{ route('admin.page.delete', $page->id) }}"
                                        onclick="return confirm('Вы уверены что хотите удалить страницу?')"><i
                                            class="fa fa-trash"></i><span class="d-none d-md-inline-block">
                                            Удалить</span> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>





    @endsection
