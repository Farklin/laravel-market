{{-- 
@extends('admin.layouts.home')
@section('title', 'Администратор: Заказ №' . $order->id )
@section('content')

<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <table class="table table-bordered">
                <tr>
                    <th>№</th>
                    <th>Наименование</th>
                    <th>Цена</th>
                    <th>Кол-во</th>
                    <th>Стоимость</th>
                </tr>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->price, 2, '.', '') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->cost, 2, '.', '') }}</td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Доставка</th>
                    <td>{{ $order->delivery }}</td> 
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Итого</th>
                    <th>{{ $order->total() }}</th> 
                </tr>
            </table>
        
           
            <div class="cart-page-heading">
                <h2>Ваши данные</h2>
                <ul class="order-details-form mb-4">
                    <li><span> Имя, фамилия: </span> <span> {{ $order->name }} </span></li>
                    <li><span>Адрес почты: </span> <span><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></span></li>
                    <li><span>Номер телефона: </span> <span>{{ $order->phone }}</span></li>
                    <li><span>Адрес доставки: </span> <span>{{ $order->address }}</span></li>
                    <li><span>Индекс </span> <span> {{ $order->index }} </span></li>
                </ul>
         
            @isset ($order->comment)
                <li>Комментарий: {{ $order->comment }}</li>
            @endisset
        </div>

        </div>
    </div>
</div>

@endsection
 --}}



 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logo</title>
    <style type="text/css">
        html {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
        }

        @media only screen and (min-device-width: 660px) {
            .table660 {
                width: 660px !important;
            }
        }

        @media only screen and (max-device-width: 660px), only screen and (max-width: 660px) {
            .table660 {
                width: 100% !important;
            }

            .mob-radius-right {
                border-radius: 0 3px 3px 0;
            }

            .mob-radius-left {
                border-radius: 3px 0 0 3px;
                border-left: 1px solid #ebebeb !important;
            }

            .mob-pic {
                width: 0 !important;
                padding: 0 !important;
            }

            .mob-pic a {
                display: none;
            }
        }

        .table660 {
            width: 660px;
        }
    </style>
</head>
<body style="margin: 0; padding: 0;">

    <span class="preheader" style="display: none !important; visibility: hidden; opacity: 0; color: #fff; height: 0; width: 0; font-size: 1px;">Прехедер</span>

    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-size: 1px; line-height: normal;">
        <tr>
            <td align="center" bgcolor="#ffffff" style="background-color: #ffffff;">
                <!--[if (gte mso 9)|(IE)]>
                <table cellpadding="0" cellspacing="0" border="0" width="660"><tr><td>
                <![endif]-->
                <table cellpadding="0" cellspacing="0" width="100%" border="0" class="table660" style="max-width: 660px; min-width: 320px; width: 100%;">
                    <tr>
                        <td align="center" valign="top">
                            <div style="height: 45px; line-height: 45px; font-size: 43px">&nbsp;</div>
                            <a href="{{route('home')}}" target="_blank"><img src="https://teisbubble.ru/theme/img/core-img/logo3.png" width="134" border="0" alt="" style="display: inline-block" /></a>
                            <div style="height: 45px; line-height: 45px; font-size: 43px">&nbsp;</div>
                            <div style="height: 1px; line-height: 1px; font-size: 1px; border-top-width: 1px; border-top-style: solid; border-top-color: #e6e6e6">&nbsp;</div>
                            <table cellpadding="0" cellspacing="0" border="0" width="87.9%" align="center">
                                <tr>
                                    <td>
                                        <div style="height: 50px; line-height: 50px; font-size: 48px">&nbsp;</div>
                                        <div align="center">
                                            <span style="font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 28px; line-height: 38px; color: #191919;">Спасибо что оформили заказ</span>
                                            <div style="height: 20px; line-height: 20px; font-size: 18px">&nbsp;</div>
                                            <span style="font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 20px; line-height: 30px; color: #999999;">Ожидайте, скоро ваш заказ обработают </span>
                                        </div>
                                        <div style="height: 35px; line-height: 35px; font-size: 33px">&nbsp;</div>
                                        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width: 100%; min-width: 100%;">
                                            <tr>
                                                <td style="border-top-width: 2px; border-top-style: solid; border-top-color: #f2f2f2;" height="10">&nbsp;</td>
                                                <td style="border-top-width: 2px; border-top-style: solid; border-top-color: #f2f2f2;" height="10">&nbsp;</td>
                                                <td style="border-top-width: 2px; border-top-style: solid; border-top-color: #f2f2f2;" height="10">&nbsp;</td>
                                                <td style="border-top-width: 2px; border-top-style: solid; border-top-color: #f2f2f2;" height="10">&nbsp;</td>
                                            </tr>
                                            @foreach($order->items as $item)
                                            <tr>
                                                <td style="padding-right: 20px;" width="112" class="mob-pic">
                                                    <a href="" target="_blank"><img src="https://teisbubble.ru{{$item->thumbnail()}}" height="112" width="112" border="0" alt="" style="display: inline-block" /></a>
                                                </td>
                                                <td style="padding-right: 10px;">
                                                    <a href="" target="_blank" style="font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 17px; line-height: 26px; color: #000000; font-weight: bold; text-decoration: none;">{{$item->name}}</a>
                                                    <div style="height: 5px; line-height: 5px; font-size: 3px">&nbsp;</div>
                                                    <span style="font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 16px; line-height: 26px; color: #000000;"></span>
                                                </td>
                                                <td style="padding-right: 10px;">
                                                    <span style="font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 16px; line-height: 26px; color: #000000;">{{ $item->quantity }}&nbsp;шт.</span>
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    <span style="font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 16px; line-height: 26px; color: #000000;">{{$item->price}}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td style="padding-right: 20px;" width="112" class="mob-pic">
                                                    
                                                </td>
                                                <td style="padding-right: 10px;">
                                                    <a href="" target="_blank" style="font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 17px; line-height: 26px; color: #000000; font-weight: bold; text-decoration: none;">
                                                    
                                                    </a>
                                                    <div style="height: 5px; line-height: 5px; font-size: 3px">&nbsp;</div>
                                                    <span style="font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 16px; line-height: 26px; color: #000000;"></span>
                                                </td>
                                                <td style="padding-right: 10px;">
                                                    <span style="font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 16px; line-height: 26px; color: #000000;">&nbsp;ИТОГО</span>
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    <span style="font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 16px; line-height: 26px; color: #000000;">@php
                                                        $total = $order->amount + $order->delivery; 
                                                         @endphp
                                                         {{$total}}
                                                        </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="10">&nbsp;</td>
                                                <td height="10">&nbsp;</td>
                                                <td height="10">&nbsp;</td>
                                                <td height="10">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="border-top-width: 2px; border-top-style: solid; border-top-color: #f2f2f2;" height="10">&nbsp;</td>
                                                <td style="border-top-width: 2px; border-top-style: solid; border-top-color: #f2f2f2;" height="10">&nbsp;</td>
                                                <td style="border-top-width: 2px; border-top-style: solid; border-top-color: #f2f2f2;" height="10">&nbsp;</td>
                                                <td style="border-top-width: 2px; border-top-style: solid; border-top-color: #f2f2f2;" height="10">&nbsp;</td>
                                            </tr>
                                        </table>
                                        <div style="height: 30px; line-height: 30px; font-size: 28px">&nbsp;</div>
                                        <!--[if (gte mso 9)|(IE)]>
                                        <table cellpadding="0" cellspacing="0" border="0" width="580"><tr><td>
                                        <![endif]-->
                                        <table align="center" cellpadding="0" cellspacing="0" border="0" width="580" style="width: 100%; max-width: 580px;">
								            <!-- <tr>
									            <td align="center" valign="middle" height="70" style="background-color: #303030; height: 70px; border-radius: 4px;">
										            <a href="" target="_blank" style="display: block; width: 100%; height: 70px; font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; color: #FFFFFF; font-size: 17px; line-height: 70px; text-decoration: none; white-space: nowrap;">Купить</a>
									            </td>
								            </tr> -->
							            </table>
                                        <!--[if (gte mso 9)|(IE)]>
                                        </td></tr>
                                        </table><![endif]-->
                                        <div style="height: 40px; line-height: 40px; font-size: 38px">&nbsp;</div>
                                        <div style="height: 1px; line-height: 1px; font-size: 1px; border-top-width: 1px; border-top-style: dotted; border-top-color: #ececec">&nbsp;</div>
                                        <div style="height: 15px; line-height: 15px; font-size: 13px">&nbsp;</div>

                                        <div style="font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 15px; line-height: 22px; color: #999999;">Адресные данные <br> 
                                            Адрес: {{$order->address}}<br> 
                                            Email: {{$order->email}} <br> 
                                            Номер телефона:  {{$order->phone}}<br> 
                                        </div>
                                        <hr> 

                                        <div style="font-family: system-ui, -apple-system, 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 15px; line-height: 22px; color: #999999;">Хороших покупок,<br />ваш Ivan Zhiltsov</div>
                                        <div style="height: 25px; line-height: 25px; font-size: 23px">&nbsp;</div>
                                        <div style="height: 1px; line-height: 1px; font-size: 1px; border-top-width: 2px; border-top-style: solid; border-top-color: #e6e6e6">&nbsp;</div>
                                        <div style="height: 45px; line-height: 45px; font-size: 43px">&nbsp;</div>
                                        <table cellpadding="0" cellspacing="0" border="0" align="center" style="margin: 0 auto;">
                                            <tr>
                                                <td width="27">
                                                    <a href="https://vk.com/teisbubble" target="_blank"><img src="https://imgems.ru/ems/templates/vk.png" width="27" height="19" border="0" alt="" style="display: block" /></a>
                                                </td>
                                                <td width="50">&nbsp;</td>
                                                <td width="27">
                                                    <a href="https://www.instagram.com/teisbubble/" target="_blank"><img src="https://imgems.ru/ems/templates/ig.png" width="27" height="19" border="0" alt="" style="display: block" /></a>
                                                </td>
                                                <td width="50">&nbsp;</td>
                                                <td width="27">
                                                    <a href="https://www.facebook.com/profile.php?id=100072265003978" target="_blank"><img src="https://imgems.ru/ems/templates/fb.png" width="27" height="19" border="0" alt="" style="display: block" /></a>
                                                </td>
                                                <td width="50">&nbsp;</td>
                                                {{-- <td width="27">
                                                    <a href="" target="_blank"><img src="https://imgems.ru/ems/templates/ok.png" width="27" height="19" border="0" alt="" style="display: block" /></a>
                                                </td> --}}
                                            </tr>
                                        </table>
                                        <div style="height: 35px; line-height: 35px; font-size: 33px">&nbsp;</div>
                           
                                        <div style="height: 45px; line-height: 45px; font-size: 43px">&nbsp;</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td></tr></table>
                <![endif]-->
            </td>
        </tr>
    </table>
</body>
</html>
