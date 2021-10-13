@extends('layouts.app')
@section('title', 'Профиль пользователя Teisbubble')
@section('description', 'Информация о профиле пользователя интернет магазина Teisbubble')
@section('content')

    @include('layouts.breadcumb', array('h1' => 'Личный кабинет'))

    {{-- Личный кабинет --}}
    <div class="container">

        <div class="row my-3">
          {{-- Информация профиля --}}
          <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Информация профиля</h6>
                </div>
                <div class="card-body">
                    <p>Логин: {{Auth::user()->name}} </p>
                    <p>Почта: {{Auth::user()->email}} </p>
                </div>
              </div>
          </div>
        {{-- //Информация профиля --}}

            {{-- Правое меню --}}
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h6>Меню</h6>
                    </div>
                    <div class="card-body">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('user.orders')}}">Заказы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('user.likes.products')}}">Понравившиеся</a>
                            </li>
                            <li class="nav-item">
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="{{ route('logout') }}" tabindex="-1" aria-disabled="true">Выйти</a>
                            </li>
                        </ul>
                    </div>
                  </div>
              </div>
            {{-- // Правое меню --}}

        </div>

    </div>

    {{-- // Личный кабинет --}}
@endsection
