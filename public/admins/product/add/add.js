$(function (){
    $(".tags_select_choose").select2({
        tags: true,
        tokenSeparators: [',']
    })
    $(".select2-init").select2({
        placeholder: 'Choose category',
    })
    $('#contents').summernote({
        height: 200
    });
})
