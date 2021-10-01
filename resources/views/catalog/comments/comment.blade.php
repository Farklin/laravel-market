<div class="comment-product row">
    <div class="comment-product-name col-md-12 mt-4">
        <span> Имя фамиля пользователя </span>
    </div>  
    <div class="comment-product-description col-md-12">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, soluta velit. Aliquid deleniti, quas at animi odit corporis repellendus fugiat, laudantium earum nemo explicabo! Nam incidunt officia sunt quos libero!
    </div>  
    
    <div class="comment-product-image col-md-12">
        <div class="row my-2">
            <img src="http://127.0.0.1:8000/images/products/1/1631108139_zV3qg1AbdH0.jpg" width="100" alt="" class="mx-2 border image-thumbnail">
            <img src="http://127.0.0.1:8000/images/products/1/1631108139_zV3qg1AbdH0.jpg" width="100" alt="" class="mx-2 border image-thumbnail">
        </div>
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
                    <input type="hidden" name="whatever1" class="rating-value" value="5">
                </div>
            </div>

            <div class="col-md-4">
               
            </div>
            <div class="comment-product-date col-md-4 text-right">
                12.02.2019
            </div>

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