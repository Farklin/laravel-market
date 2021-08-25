
@extends('admin.layouts.home')
@section('title', 'Все товары')
@section('content')

    <div class="container">
        <h4> Категории </h4>

        <div>
            <a href="{{ route('admin.category.form.create') }} "class="btn-primary btn">Создать новую категорию</a>
        </div>


        <table>

            @foreach($categories as $category)
                <tr class="table"> 
                    <td>
                        {{$category->title}}
                    </td>
                    <td>
                        <a href = "{{route('admin.category.form.update', $category->id)}}">Изменить</a> 
                    </td>
                    <td>
                        <a class="text-danger" href = "{{route('admin.category.delete', $category->id)}}">Удалить</a> 
                    </td>
                </tr> 

                
            @endforeach

        </table>

        
    </div>

@endsection

