@extends('admin.layouts.home')
@section('title', 'Группы характеристик')
@section('h1', 'Группы характеристик')
@section('content')



    <div class="col-12">
        <a href="{{ route('admin.charecter.group.create') }} " class="btn-primary btn">Создать характеристику</a>
    </div>



    <div class="col">


        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Характеристики</h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">

                <table class="table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0 d-none d-md-inline-block">ID</th>
                            <th scope="col" class="border-0">Название</th>
                            <th scope="col" class="border-0"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($charecters as $charecter)
                            <tr>
                                <td class="d-none d-md-inline-block">
                                    {{ $charecter->id }}
                                </td>
                                <td>
                                    {{ $charecter->title }}
                                </td>
    
                                <td>
                                    <a href="{{ route('admin.charecter.group.update', $charecter->id) }}"><i
                                            class="fa fa-edit"></i><span class="d-none d-md-inline-block"> Изменить
                                        </span> </a>
                                </td>
                              
                                <td>
                                    <a class="text-danger" href="{{ route('admin.charecter.group.delete', $charecter->id) }}"
                                        onclick="return confirm('Вы уверены что хотите удалить характеристиу?')"><i
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
