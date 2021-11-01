// авто создание seo тегов 

$(document).ready(function() {
    $('#title_product').keyup(function() {
        $('#seo_title').val($(this).val() + ' купить во Владимире в интернет магазине Teisbubble');
        $('#seo_description').val($(this).val() + ' купить по низкой цене. Доставка по Владимиру и России. Интернет магазин Teisbubble - мыло ручной работы Пн-Вс (9:00 - 19:00). ');

    });

    $('#title_category').keyup(function() {
        $('#seo_title').val($(this).val() + ' купить по низкой цене во Владимире ');
        $('#seo_description').val($(this).val() + ' купить по лучшей цене - большой ассортимент товаров по низким ценам - все товары ручной работы. Доставка по Владимиру и всей России - заказывай. Интернет магазин Teisbubble - мыло ручной работы Пн-Вс (9:00 - 19:00). ');

    });

    $('#title_page').keyup(function() {
        $('#seo_title').val($(this).val() + ' Teisbubble ');
        $('#seo_description').val($(this).val() + '. Информационная страница. Интернет магазин Teisbubble - мыло ручной работы Пн-Вс (9:00 - 19:00). ');

    });


    if ($(document).is('.charecter')) {
        var charecter = $('.charecter')[0].outerHTML;

        function cloneCharecter() {
            var charecters = $('.charecters').append(charecter);
        }
        $('.add-charecter').click(function() {
            cloneCharecter();
        });
    }





})