<footer class="footer_area clearfix navbar-fixed-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="single_widget_area d-flex mb-30">
                    <div class="footer-logo mr-50">
                        <a href="{{ route('home') }}"><img src="img/core-img/logo2.png" alt=""></a>
                    </div>
                    <div class="footer_menu">
                        <ul>
                            <li><a href="{{ route('all_product') }} ">Магазин</a></li>
                            <li><a href="page/kontakty">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="single_widget_area mb-30">
                    <ul class="footer_widget_menu">
                        <li><a href="{{ route('user.orders') }}">Статуст заказа</a></li>
                        <li><a href="/page/oplata">Оплата</a></li>
                        <li><a href="/page/dostavka">Доставка</a></li>
                        <li><a href="/page/kak-sdelat-zakaz">Как сделать заказ</a></li>
                        <li><a href="/page/politika-konfidencialnosti">Политика конфиденциальности</a></li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="row align-items-end">

            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_heading mb-30">
                        <h6>Подписаться на рассылку</h6>
                    </div>
                    <div class="subscribtion_form">
                        <form action="{{ route('subscribe') }}" method="post">
                            @csrf
                            <input type="email" name="email" class="mail" placeholder="Ваш email">
                            <button type="submit" class="submit"><i class="fa fa-long-arrow-right"
                                    aria-hidden="true"></i></button>
                        </form>
                        @if ($errors->any())
                           
                            <ul>

                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>

                        @endif
                    </div>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_social_area">
                        <a href="https://www.facebook.com/profile.php?id=100072265003978" data-toggle="tooltip"
                            data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/teisbubble/" data-toggle="tooltip" data-placement="top"
                            title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"
                                aria-hidden="true"></i></a>
                        <a href="https://www.pinterest.ru/teisbubble/" data-toggle="tooltip" data-placement="top"
                            title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i
                                class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p>
                    <script>
                        document.write(new Date().getFullYear());
                    </script> TeisBubble </a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <p>
                    Разработка сайта: <a href="https://vk.com/ivanhel" style="color:white" target="_blank">Иван
                        Жильцов</a>
                </p>
            </div>
        </div>

    </div>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
                k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(85185802, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/85185802" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

</footer>
