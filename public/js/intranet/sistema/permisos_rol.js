$(document).ready(function () {
    $("#rol_id").on("change", function (event) {
        const rol_id = $(this).val();
        const url_t = $(this).attr("data_url");
        var data = {
            rol_id: rol_id,
        };
        $.ajax({
            url: url_t,
            type: "GET",
            data: data,
            success: function (respuesta) {
                console.log(respuesta);

                respuesta_html = "";
            },
            error: function () {},
        });
    });
    /* $(".check_permisos").change(function () {
        if (this.checked) {
            valor = 1;
        } else {
            valor = 0;
        }
        const url_t = $(this).attr("data_url");
        const opcion = $(this).attr("data-permiso_opcion");
        var data = {
            valor: valor,
            opcion: opcion,
            _token: $("input[name=_token]").val(),
        };
        $.ajax({
            url: url_t,
            type: "POST",
            data: data,
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    Sistema.notificaciones(
                        "Permiso guardado correctamente",
                        "Sistema",
                        "success"
                    );
                } else {
                    Sistema.notificaciones(
                        "Jurado desasociadoa a la propuesta correctamente",
                        "Sistema",
                        "warning"
                    );
                }
            },
            error: function () {},
        });
    }); */
    $(".check_permisos_todos").change(function () {
        if (this.checked) {
            valor = 1;

            $(
                ".check_" +
                    $(this).attr("data-permiso_opcion") +
                    "_" +
                    $(this).attr("data-rolid")
            ).prop("checked", true);
        } else {
            valor = 0;
            $(
                ".check_" +
                    $(this).attr("data-permiso_opcion") +
                    "_" +
                    $(this).attr("data-rolid")
            ).prop("checked", false);
        }

        /*const url_t = $(this).attr("data_url");
        const opcion = $(this).attr("data-permiso_opcion");
        var data = {
            valor: valor,
            opcion: opcion,
            _token: $("input[name=_token]").val(),
        };
        $.ajax({
            url: url_t,
            type: "POST",
            data: data,
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    Sistema.notificaciones(
                        "Permiso guardado correctamente",
                        "Sistema",
                        "success"
                    );
                } else {
                    Sistema.notificaciones(
                        "Jurado desasociadoa a la propuesta correctamente",
                        "Sistema",
                        "warning"
                    );
                }
            },
            error: function () {},
        });*/
    });
});

function aplicar_permisos(url) {

    Swal.fire({
        title: 'Esta Seguro de guardar los cambios en los permisos?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Guardar!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url_t = url;
            var info = new Array();
            $(".check_permisos").each(function (i, obj) {
                if (this.checked) {
                    valor = 1;
                } else {
                    valor = 0;
                }
                var id = $(this).attr("data-permisoid");
                var opcion = $(this).attr("data-permiso_opcion");
                info.push({ id: id,opcion: opcion, valor: valor });

            });
            var data = {
                info: JSON.stringify(info),
                _token: $("input[name=_token]").val(),
            };
            $.ajax({
                url: url_t,
                type: "POST",
                data: data,
                success: function (respuesta) {
                    if (respuesta.mensaje == "ok") {
                        Sistema.notificaciones(
                            "Permisos guardados correctamente",
                            "Sistema",
                            "success"
                        );
                    } else {
                        Sistema.notificaciones(
                            "No se pudieron guardar los permisos",
                            "Sistema",
                            "warning"
                        );
                    }
                },
                error: function () {},
            });
        }
      });
}
