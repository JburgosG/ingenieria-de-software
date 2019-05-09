$(function () {

    var _token = $('meta[name=csrf-token]').attr("content");
    var base_url = $('#base_url').val();
    var exists = $('#exists').val();

    $('#in-panel').click();
    $('#msg-change').hide();

    var rules = {
        rules: {
            name:{
                maxlength: 190
            },
            email: {
                email: true,
                maxlength: 190
            },
            phone: {
                maxlength: 10,
                minlength: 7,
                number: true,
                digits: true
            },
            password: {
                maxlength: 50,
                minlength: 6
            },
            password_again: {
                equalTo: "#password"
            },
            address:{
                maxlength: 190
            },
            identification:{
                maxlength: 190
            },
            eps:{
                maxlength: 190
            },
            biography:{
                maxlength: 500
            },
            specialty:{
                maxlength: 190
            }
        }
    };

    $('#form_add_user').validate({
        rules: {
            name:{
                maxlength: 190
            },
            email: {
                maxlength: 190,
                email: true,
                remote: {
                    url: exists,
                    type: "post",
                    data: {
                        table: 'users',
                        field: 'email',
                        exists: false,
                        _token: _token
                    }
                }
            },
            phone: {
                maxlength: 10,
                minlength: 7,
                number: true,
                digits: true
            },
            password: {
                maxlength: 50,
                minlength: 6
            },
            password_again: {
                equalTo: "#password"
            },
            address:{
                maxlength: 190
            },
            identification:{
                maxlength: 190
            },
            eps:{
                maxlength: 190
            },
            biography:{
                maxlength: 500
            },
            specialty:{
                maxlength: 190
            }
        },
        messages: {
            email: {
                remote: "El correo electrónico ya se encuentra registrado."
            }
        }
    });

    $('#form_edit_user').validate(rules);

    $('#form-change-pass').validate({
        rules: {
            password: {
                required: true,
                minlength: 6
            },
            password_again: {
                required: true,
                equalTo: "#password"
            }
        },
        submitHandler: function () {
            changePass('#form-change-pass');            
            return false;
        }
    });

    $("#image").on("change", function () {

        var formData = new FormData();
        formData.append('_token', _token);
        var url = $('#avatar-form').attr('action');
        formData.append('image', $(this)[0].files[0]);
        var label_o = '<i class="fa fa-photo"></i> ';
        var label_x = '<i class="fa fa-times"></i> ';
        var label_l = '<i class="fa fa-spinner fa-pulse"></i> ';

        $.ajax({
            url: url,
            data: formData,
            method: 'post',
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('#label-file').html(label_l);
            }
        }).done(function (data) {
            var time = new Date().getTime();
            var path = base_url + '/storage/' + data.path + '?' + time;
            $('.img-profile').attr('src', path);
            $('#label-file').html(label_o + 'Actualizar');
        }).fail(function () {
            $('#label-file').html(label_x + 'Imagen incompatible');
        });
    });

    $('#select-group').change(function () {
        var opt = $(this).val();

        $('#group_id').val(opt);
        $('.fields').addClass('hide');
        $('#' + opt).removeClass('hide');

        if (opt == 0) {
            $('#forms-users').addClass('hide');
        } else {
            $('#forms-users').removeClass('hide');
        }
    });
});

function changePass(form) {

    var data = $(form).serialize();
    var url = $(form).attr('action');
    var label_l = '<i class="fa fa-spinner fa-pulse"></i> ';

    $.ajax({
        url: url,
        data: data,
        method: 'post',
        beforeSend: function () {
            $('#btn-change').html(label_l);
        }
    }).done(function (data) {
        if (data.state) {
            $('#msg-change').show();
            setTimeout(function () {
                $(".msg_alert").fadeOut(1500)
            }, 5000);
        }
    }).always(function () {
        cleanForm(form);
        $('#btn-change').html('<b>Establecer</b>');
    });
}