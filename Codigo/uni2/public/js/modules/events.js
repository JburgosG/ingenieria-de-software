$(function () {

    var _token = $('meta[name=csrf-token]').attr("content");
    var base_url = $('#base_url').val();
    var exists = $('#exists').val();

    $('#form_add_event').validate({
        rules: {
            name: {
                remote: {
                    url: exists,
                    type: "post",
                    data: {
                        table: 'events',
                        field: 'name',
                        exists: false,
                        _token: _token
                    }
                }
            }
        }
    });

    $('#form_edit_event').validate();

    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
});