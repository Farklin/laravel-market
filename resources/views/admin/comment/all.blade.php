
@extends('admin.layouts.home')
@section('title', 'Все отзывы')
@section('h1', 'Отзывы о товарах')
@section('content')

    <div class="col-12">
        <a class="btn btn-sm btn-primary" href="?status=on">Включенные</a>
        <a class="btn btn-sm btn-warning" href="?status=off">Отключенные</a>
    </div>
     
 
    <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
        <div class="card card-small blog-comments">
            <div class="card-header border-bottom">
                <h6 class="m-0">Отзывы</h6>
            </div>
            <div class="card-body p-0">
                @foreach($comments as $comment)
                    <div class="blog-comments__item d-flex p-3">
                        <div class="blog-comments__avatar mr-3">
                            @if( count( $comment->product->images ) > 0 )
                            <img src="{{ $comment->product->images[0]->thumbnail() }}"/>
                            @endif
                        </div>
                        <div class="blog-comments__content col-9">
                            <div class="blog-comments__meta text-muted">
                                <a class="text-secondary" href="#">{{ $comment->name }} </a> к
                                <a class="text-secondary" href="{{ route('product.show', $comment->product->seo->slug) }}">{{ $comment->product->title }} </a>
                                <span class="text-muted">{{ $comment->created_at }}</span>
                                <div class="row px-3">
                                    @for ($i = 0; $i < $comment->raiting; $i++)
                                    <i class="fa fa-star" style="color:yellow"></i>
                                    @endfor
                                </div>
                            </div>
                           

                            <p class="m-0 my-1 mb-2 text-muted">{{ $comment->description}} </p>
                            <div class="blog-comments__avatar mr-3">
                                @foreach($comment->images as $image)
                                <img src="{{ $image->thumbnail}}"/>
                                @endforeach
                            </div>
                            <div class="blog-comments__actions">
                                <div class="btn-group btn-group-sm row">
                                    
                                        @if(!$comment->status)
                                            <a type="button" href="{{ route('admin.comment.editstatus', $comment->id)}}" class="btn btn-white">
                                                <span class="text-success">
                                                <i class="fa fa-check"> </i>
                                            </span> Опубликовать </a>
                                        @endif 
                                    <a type="button"  onclick="return confirm('Вы уверены что хотите удалить отзыв {{$comment->name}} ?')" href="{{ route('admin.comment.delete', $comment->id)}}" class="btn btn-white">
                                        <span class="text-danger">
                                            <i class="fa fa-trash"> </i>
                                        </span> Удалить </a>
                                    <a type="button" class="btn btn-white text-dark">
                                        <span class="text-light">
                                            <i class="fa fa-edit"> </i>
                                        </span> Изменить </a>
                                   
                                </div>
                            </div>



                            
                        </div>
                    </div>
                @endforeach
            </div>
          
        </div>
    </div>


@endsection

