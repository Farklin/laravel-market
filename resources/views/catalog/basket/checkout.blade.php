@extends('layouts.app')
@section('title', 'Оформление заказа')
@section('content')

@include('layouts.breadcumb', array('h1' => 'Оформление заказа'))


    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>

                                    @foreach ($errors->all() as $error)
                                        <li class="alert alert-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('basket.checkout.save') }}" method="post">
                            @csrf 
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">Имя<span>*</span></label>
                                    <input type="text" class="form-control" name="first_name" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Фамилия<span>*</span></label>
                                    <input type="text" class="form-control" name="last_name" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="last_name">Отчество<span>*</span></label>
                                    <input type="text" class="form-control" name="patronymic" value="" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="street_address">Адрес <span>*</span></label>
                                    <input type="text" class="form-control" name="address" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="postcode">Индекс <span>*</span></label>
                                    <input type="text" class="form-control" name="index" value="">
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="phone_number">Номер телефона<span>*</span></label>
                                    <input type="number" class="form-control" name="phone" min="0" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email адрес <span>*</span></label>
                                    <input type="email" class="form-control" name="email" value="">
                                </div>
                            </div>
                            <input type="submit" id="btnOrderSave" style="display: none;" /> 
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Ваш заказ</h5>
                            <p>Подробнее</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Товары</span> <span>Итого</span></li>
                        <li><span>Стоимость товаров</span> <span>{{ $basket->getAmount(); }} </span></li>
                            <li><span>Доставка</span> <span>{{ $delivery; }} </span></li>
                            <li><span>Итого</span> <span> @php $total = $basket->getAmount() + $delivery   @endphp {{ $total; }} </span></li>
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Оплата</a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Оплата производится после подтверждения заказа, на вашу почту высылается реквизиты и сумма для оплаты.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo"><i
                                                class="fa fa-circle-o mr-3"></i>Доставка</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Доставка производится почтой России</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <button onclick="saveOrderFormClick() " class="btn essence-btn">Оформить заказ</button>
                        <script> 
                            function saveOrderFormClick()
                            {
                                $('#btnOrderSave').click(); 
                            }
                        </script> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@endsection
