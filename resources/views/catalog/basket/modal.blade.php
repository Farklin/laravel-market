
    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

        <div class="right-side-cart-area">

            <!-- Cart Button -->
            <div class="cart-button">
                <a href="#" id="rightSideCart"><img src="/theme/img/core-img/bag.svg" alt=""> <span class="basket_count_product"></span></a>
            </div>
        
        </div> 
    </div>
    <!-- ##### Right Side Cart End ##### -->
    
    {{-- Вывод корзины --}}
    <script type="text/javascript"> 
        $(document).ready(function(){
            $.ajax({
            method: "POST", 
            url: "{{ route('basket.modal') }}", 
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
            success: function(data){
                $('.right-side-cart-area').append(data);  
               
            }, 
            
            }); 
        }); 
    </script>
  