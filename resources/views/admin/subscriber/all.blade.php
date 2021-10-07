
@extends('admin.layouts.home')
@section('title', 'Подписчики')
@section('h1', 'Подписчики')

@section('content')


 
    <div class="col">


        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h6 class="m-0">Подписчики: {{ count($subscribers) }} чел.</h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">

                <table class="table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0 d-none d-md-inline-block">Номер</th>
                            <th scope="col" class="border-0">Почта подписчика</th>
                            <th scope="col" class="border-0">Статус</th>
                            <th scope="col" class="border-0"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscribers as $subscriber)
                            <tr>
                                <td class="d-none d-md-inline-block">
                                    {{ $subscriber->id }} 
                                </td>
                                <td>
                                    {{$subscriber->email}}
                                </td>
                                <td>
                                    @if($subscriber->status)
                                        <span class="text-info">Подписан</span>
                                    @else
                                        <span class="text-danger">Отписался</span>
                                    @endif 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

@endsection

