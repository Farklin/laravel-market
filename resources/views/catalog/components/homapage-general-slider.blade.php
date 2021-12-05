<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="general-slides owl-carousel">
            @foreach ($sliders as $slider)

            <div class="cta-content bg-img background-overlay" style="background-image: url({{asset($slider->image)}});">
                <div class="h-100 d-flex align-items-center justify-content-end">
                    <div class="cta--text">
                        <h6>{{$slider->price}}@isset($slider->price)
                            Р
                        @endisset</h6>
                        <h2>{{$slider->title}}</h2>
                        <a href="" class="btn essence-btn">Купить сейчас</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div> 