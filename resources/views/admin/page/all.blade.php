
@extends('admin.layouts.home')
@section('title', 'Статические страницы')
@section('content')

    <div class="container">
        <h4> Страницы </h4>

        <div>
            <a href="{{ route('admin.page.create') }} "class="btn-primary btn">Создать страницу</a>
        </div>


        <table>

            @foreach($pages as $page)
                <tr class="table"> 
                    <td>
                        {{$page->title}}
                    </td>
                    <td>
                        <a href = "{{route('admin.page.update', $page->id)}}">Изменить</a> 
                    </td>
                    <td>
                        <a class="text-danger" href = "{{route('admin.page.delete', $page->id)}}">Удалить</a> 
                    </td>
                </tr> 

                
            @endforeach

        </table>

        
    </div>

@endsection

