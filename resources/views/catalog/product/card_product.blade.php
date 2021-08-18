<div class="card">
    <a href="{{ route('show_product', $product->id) }}">
        <img class="card-img-top" src="https://im0-tub-ru.yandex.net/i?id=4ad08a15a0739a2968ccaf25fbf456a9-l&ref=rim&n=13&w=1080&h=1080" alt="Card image cap">
    </a>     
    
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('show_product', $product->id) }}">
                    <h5 class="card-title">{{ $product->title }}</h5>
                </a>  
                <small> Категория мыла </small>
                <div class="raiting">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div class="price">
                    <span>{{ $product->price }} ₽</span>
                </div>
                <div class="text-end">
                    <a class="btn btn-primary"> В корзину </a> 
                </div>
            </div>
           
        </div>
       
        
    </div>
</div>