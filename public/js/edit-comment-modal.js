$('.btn-edit').on('click',function(){
    $('#modal-id').val($(this).attr('data-id'));
    $('#text-edit').val($(this).attr('data-text'));
});