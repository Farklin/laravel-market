// авто создание seo тегов 

$(document).ready(function() {
    $('#title').keyup(function() {
        $('#seo_title').val($(this).val() + ' купить во Владимире в интернет магазине Teisbubble');
        $('#seo_description').val($(this).val() + ' купить по низкой цене. Доставка по Владимиру и России. Интернет магазин Teisbubble - мыло ручной работы Пн-Вс (9:00 - 19:00). ');

    });
})