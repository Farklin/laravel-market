// Изменение последовательности картинок в товарах
$('#images-product').sortable({
    revert: 100,
    cursor: "move",
    update: function() {

        sorting = []
        $('#images-product .image-value').each(function(index, item) {
            sorting.push({ 'image_id': item.value, 'image_sort': index })
        });
        console.log(sorting);
        ajaxSortingImage(sorting);

    }
});

function ajaxSortingImage(sorting) {
    $.ajax({
        method: "POST",
        url: "{{ route('admin.image.sorting') }}",
        data: {
            sortimage: sorting,
        },
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            console.log(data);

        },

    });
}


// авто создание seo тегов 

$(document).ready(function() {
    $('#title').keyup(function() {
        $('#seo_title').val($(this).val() + ' купить во Владимире в интернет магазине Teisbubble');
        $('#seo_description').val($(this).val() + ' купить по низкой цене. Доставка по Владимиру и России. Интернет магазин Teisbubble - мыло ручной работы Пн-Вс (9:00 - 19:00). ');

    });
})