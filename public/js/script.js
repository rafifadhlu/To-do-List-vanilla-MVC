//jquery


$(function(){ // check page is ready or not

    // first modal in page activity
    $('.ModalTambah').on('click', function(){
        $('#titleModal').html('Add New Activity');
        $('.modal-footer button[type=submit]').html('Add new Activities');
        $('#activity').val('');
        $('#deadline').val('');


    });

    
    // second modal in page activity
    // search class model ubah in index
    $('.ModalUbah').on('click', function(){
        // change the field of element into edit property

        $('#titleModal').html('Edit List');
        $('.modal-footer button[type=submit]').html('Edit');
        $('.modal-body form').attr('action','http://localhost/phpmvc/public/activity/editDataActivity');

        
        const id = $(this).data('id');

        $.ajax({
            url:'http://localhost/phpmvc/public/activity/getDataEditable',
            data:{id : id},
            method: 'post',
            dataType:'json',
            success:function(data){
                console.log(data);
                $('#activity').val(data.activity);
                $('#deadline').val(data.deadline);
                $('#idActivity').val(data.idActivity);
                $('#idUser').val(data.idUser);
            }
        })
    });
});