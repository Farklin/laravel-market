<div class="card">
    <a href="{{ route('show_product', $product->id) }}">
        <img class="card-img-top" src="{{ $product->images[0]->image_path }}" alt="Card image cap">
    </a>     
    
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('show_product', $product->id) }}">
                    <h5 class="card-title text-warning">{{ $product->title }}</h5>
                </a>  
                <small> Категория мыла </small>
                <div class="p-ratings">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div class="font-weight-bold price">
                    <span>{{ $product->price }} ₽</span>
                </div>
                <div class="text-end">
                    <a class="btn btn-warning btn-long buy"> В корзину </a> 
                </div>
            </div>
           
        </div>
       
        
    </div>
</div>