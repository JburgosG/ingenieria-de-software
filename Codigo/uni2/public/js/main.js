$(function () {

    var btn = $('._load');
    $(btn).prop('disabled', false);

    var _token = $('meta[name=csrf-token]').attr("content");

    $('.footable').footable();

    /* Start Time of notification */
    setTimeout(function () {
        $(".msg_alert").fadeOut(1500);
    }, 5000);
    /* End Time of notification */

    $('.datepicker').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        language: 'es',
        format: 'yyyy-mm-dd',
        calendarWeeks: true,
        autoclose: true
    });

    $(document).on('click', '.delete-document', function () {
        var id = $(this).data('document_id');
        $.ajax({
            method: 'post',
            url: '/deleteDocument',
            data: {
                id: id,
                _token: _token
            }
        }).done(function (data) {
            $('#document_' + id).fadeOut();
        });
    });

    $(document).on('click', '.delete-image', function () {
        var id = $(this).data('image_id');
        $.ajax({
            method: 'post',
            url: '/deleteImage',
            data: {
                id: id,
                _token: _token
            }
        }).done(function (data) {
            $('#image_' + id).fadeOut();
        });
    });

    $('#addDay').click(function () {
        $.ajax({
            method: 'post',
            url: '/addDays',
            data: {
                _token: _token
            }
        }).done(function (data) {
            $('#new_days').append(data);
            initRegister();
        });
    });

    $(document).on('click', '.delete_day', function () {
        $('#' + $(this).data('day_id')).remove();
    });

    $("select").select2({
        placeholder: "Seleccione...",
        allowClear: true
    });

    var ids = ['form_add_user', 'form_add_subject', 'form_add_event', 'form_edit_subject', 'form_edit_user', 'form_add_schedules', 'my-awesome-dropzone', 'form_add_activity'];
    $.each(ids, function (i, j) {
        $(document).on("submit", "#" + j, function (event) {
            load_send();
        });
    });
});

function cleanForm(miForm) {
    $(':input', miForm).each(function () {
        var type = this.type;
        var tag = this.tagName.toLowerCase();
        if (type == 'text' || type == 'password' || type == 'number' || type == 'email' || type == 'url' || tag == 'textarea')
            this.value = "";
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
        else if (tag == 'select')
            this.selectedIndex = 0;
    });
    $("select").val('').trigger('change');
    $("select2-allow-clear").val('').trigger('change');
}

function load_send() {
    var btn = $('._load');
    var spinner = '<i class="fa fa-spinner fa-lg fa-spin load"></i>';
    $(btn).html('Cargando ' + spinner);
    $(btn).prop('disabled', true);
}