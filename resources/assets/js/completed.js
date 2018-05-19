$(document).ready(function(){
    $("table div.checkbox").on("click", "input#ckbox", function() {
        $('#pleaseWait').modal('show');
        var complete = ($(this).is(':checked')) ? 1 : 0;
        $.post($(this).data('route'), { complete:complete }, function(data) {
            $('#pleaseWait').modal('hide');
            if(data.response) {
                if (data.type == 1) {
                    toastr.success(data.message);
                }
            } else {
                toastr.error(data.message);
            }
        });
    });
});