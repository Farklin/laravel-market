


// Изменение последовательности картинок в товарах
$('#images-product').sortable({
    revert: 100, 
    cursor: "move",
    update: function() {
        
        sorting = [] 
        $('#images-product .image-value').each(function(index, item) {
            sorting.push({'image_id': item.value, 'image_sort': index })
        }); 
        console.log(sorting); 
        ajaxSortingImage(sorting); 
        
    } 
});

function ajaxSortingImage(sorting){
    $.ajax({
    method: "POST", 
    url: "{{ route('admin.image.sorting') }}", 
    data:{
        sortimage: sorting, 
    }, 
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
    success: function(data){
        console.log(data); 
       
    }, 
    
}); 
}

