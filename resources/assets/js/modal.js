$(document).ready(function(){
    $('table').on('click', 'a.delete-record', function (event) {
        event.preventDefault();
        $('#form-delete').attr('action', $(this).attr('href'));
        $('#modal-delete').modal('show');
    });

    $('#yes-delete').on('click', function () {
        $('#pleaseWait').modal('show');
        $.ajax({
            type: $('#form-delete').attr('method'),
            url: $('#form-delete').attr('action'),
            data: $('#form-delete').serialize(),
            success: function (data) {
                $('#pleaseWait').modal('hide');
                if (data.response) {
                    $('table tr').each(function () {
                        if ($(this).data('id') == data.id) {
                            $(this).fadeOut();
                        }
                    });
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
            },
            error: function () {
                $('#pleaseWait').modal('hide');
                toastr.error('Error, intente más tarde');
            }
        });
    });
});



