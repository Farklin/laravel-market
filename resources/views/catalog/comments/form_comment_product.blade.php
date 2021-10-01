




<div class="comment my-3">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="{{ route('comment.product.add', $product->id)}}" enctype="multipart/form-data">
        @csrf 
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <label>Оставить коментарий</label>
                    </div>
                    <div class="col-md-5 my-2">
                        @if(!Auth::check())
                        
                        <input class="form-control" type="text" placeholder="Ваше имя" name="name">
                        @else
                        <span> {{Auth::user()->name}}<span>
                        <input type="hidden" class="form-control" value="{{Auth::user()->name}}" name="name">
                        @endif 
                    </div>

                    <div class="col-md-7 my-2">
                 

                        <div class="custom-file">
                            <input name="images[]" type="file" id="myfile" multiple="multiple" class="custom-file-input" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                            <label class="custom-file-label" for="customFile">Приложить фото</label>
                        </div>

                    <style> 
                            .custom-file-label::after{
                                content: 'Обзор';
                            }
                    </style> 

                    </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="description" id="" cols="" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 text-left">
                            @include('catalog.comments.raiting')
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn primary essence-btn">Отправить</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    

</div>
