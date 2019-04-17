$(function () {

    var _token = $('input[name="_token"]').val();

    $(document).on('click', '._delete', function (e) {
            var redirect = $(this).data('route');
            var method = $(this).data('method');
            var url = $(this).data('url');
            e.preventDefault();

            if(method === undefined){
                method = 'DELETE';
            }

            swal({
                title: "Esta Segur@?",
                text: "Si elimina este item se borrara por completo del sistema.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, Deseo eliminarlo",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false
            }, function () {
                $.ajax({
                    url: url,
                    type: method,
                    data: {_token: _token},
                    success: function (response) {
                        if (response) {
                            swal({
                                title: "Eliminado!",
                                text: "El Item se elimino exitosamente.",
                                showLoaderOnConfirm: true,
                                closeOnConfirm: false,
                                type: "success",
                            }, function () {
                                window.location.href = redirect;
                            });
                        } else {
                            swal("Error!", "Consulte con el Administrador.", "error");
                        }
                    }
                });
            });
        }
    );
});