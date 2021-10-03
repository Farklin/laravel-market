
@extends('admin.layouts.home')
@section('title', 'Все отзывы')
@section('content')

    <div class="container">
        <h4> Отзывы </h4>

        <a class="btn btn-sm btn-primary" href="?sort=on">Включенные</a>
        <a class="btn btn-sm btn-warning" href="?sort=on">Отключенные</a>


        <table>

            @foreach($comments as $comment)
                <tr class="table"> 
                    <td>
                        {{$comment->name}}
                    </td>
                    <td>
                        {{$comment->description}}
                    </td>
                    <td>
                        @foreach ($comment->images as $image)
                            <img width="50" src="{{$image->thumbnail}}" alt="">
                        @endforeach
                    </td>

                    <td>
                        <a href="{{route('product.show', $comment->product->seo->slug)}}"> {{$comment->product->title}}</a>
                    </td>
                    <td>
                        {{$comment->raiting}}
                    </td>
                    <td>
                     <a @if($comment->status) class="text-success"  @endif href="{{route('admin.comment.editstatus', $comment->id)}}">@if($comment->status) Снять с публикции @else Опубликовать @endif</a>
                    </td>
                    <td>
                        <a class="text-danger" href="{{route('admin.comment.delete', $comment->id)}}"> Удалить </a>  
                     </td>

                </tr> 
                

                
            @endforeach

        </table>

        
    </div>

@endsection

