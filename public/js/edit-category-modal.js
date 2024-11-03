$('.btn-edit').on('click',function(){
    $('#id-edit').val($(this).attr('data-id'));
    $('#name-edit').val($(this).attr('data-name'));
});