$(function () {

    initRegister();
    $('#form_add_subject').validate({
        rules: {
            name: {
                maxlength: 190
            }
        }
    });
});

function register(form) {

    var url = $(form).attr('action');
    var formData = $(form).serialize();

    $.ajax({
        url: url,
        type: 'post',
        data: formData,
        dataType: "html",
        beforeSend: function () {
            $('#btn-main-register').addClass('hide');
            $('#btn-second-register').removeClass('hide');
        },
        success: function (response) {
            $('#content-students').empty().html(response);
            initRegister();
        },
        complete: function () {
            var num = $('#num-register');
            $('#btn-main-register').removeClass('hide');
            $('#btn-second-register').addClass('hide');
            $("#select-register").select2('val', '');
            num.html(parseInt(num.html()) + 1);
        }
    });
}

function initRegister() {

    $("select").select2({
        placeholder: "Seleccione...",
        allowClear: true
    });

    $('#form_add_students').validate({
        submitHandler: function (form) {
            register('#form_add_students');
            return false;
        }
    });
}