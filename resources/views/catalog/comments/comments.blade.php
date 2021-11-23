@if(isset($comments)) 
<div class="container">
    <h3 class="text-center">
        Последние отзывы
    </h3>
    <div class="row">          
        @foreach($comments as $comment)
            <div class="col-md-6 col-12">
                @include('catalog.comments.comment', $comment)
            </div>
        @endforeach 
    </div>
</div>
@endif 