/*
 |--------------------------------------------------------------------------
 | Shards Dashboards: Blog Add New Post Template
 |--------------------------------------------------------------------------
 */

'use strict';

(function($) {
    $(document).ready(function() {

        var toolbarOptions = [
            [{ 'header': [1, 2, 3, 4, 5, false] }],
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],
            [{ 'header': 1 }, { 'header': 2 }], // custom button values
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'script': 'sub' }, { 'script': 'super' }], // superscript/subscript
            [{ 'indent': '-1' }, { 'indent': '+1' }], // outdent/indent                                       // remove formatting button
        ];

        // Init the Quill RTE
        var quill = new Quill('#editor-container', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Описание товара',
            theme: 'snow'
        });

        var text = $('#description').val();
        //quill.setText(text);
        quill.clipboard.dangerouslyPasteHTML(text)


    });

    var form = document.getElementById("Form"); // get form by ID

    form.onsubmit = function() { // onsubmit do this first

        $("#description").val($('#editor-container').html());
        return true; // submit form
    }

    var form = document.getElementById("Form"); // get form by ID

    form.onsubmit = function() { // onsubmit do this first

        $("#description").val($('#editor-container').html());
        return true; // submit form
    }


})(jQuery);