$(document).ready(function(){
    $('table').on('click', 'a.delete-record', function (event) {
        event.preventDefault();
        $('#form-delete').attr('action', $(this).attr('href'));
        $('#modal-delete').modal('show');
    })
});

