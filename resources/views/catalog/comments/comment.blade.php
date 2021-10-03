<div class="comment-product row">
    <div class="comment-product-name col-md-12 mt-4">
        <span> {{ $comment->name }} </span> <span class="comment-prodyct-date"> {{ $comment->created_at }} </span> 
    </div>  
    
    <div class="comment-product-meta col-md-12">
        <div class="row">
            <div class="comment-product-rating col-md-4 text-left">
                <div class="comment-star-rating">
                    <span class="fa fa-star-o" data-rating="1"></span>
                    <span class="fa fa-star-o" data-rating="2"></span>
                    <span class="fa fa-star-o" data-rating="3"></span>
                    <span class="fa fa-star-o" data-rating="4"></span>
                    <span class="fa fa-star-o" data-rating="5"></span>
                    <input type="hidden" name="whatever1" class="rating-value" value=" {{ $comment->raiting }}">
                </div>
            </div>

            <div class="col-md-4">
               
            </div>
            <div class="comment-product-date col-md-4 text-right">
            
            </div>

        </div>
        
    </div>
    
    
    <div class="comment-product-description col-md-12">
        {{ $comment->description }}
    </div>  
    
    <div class="comment-product-image col-md-12">
        <div class="row my-2">
            @foreach($comment->images as $image)
            <img src="{{$image->thumbnail}}" width="50" alt="" class="mx-2 border image-thumbnail">
            @endforeach
        </div>
    </div>



</div>
<hr>
<script>

var $star_rating = $('.comment-star-rating .fa');

    var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

SetRatingStar();
$(document).ready(function() {

});


</script>
>>>>>>> dev
