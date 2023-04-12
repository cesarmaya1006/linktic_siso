$(document).ready(function () {
    //-----------------------------------------------------------------------------------------
    //Modal Personas asignación
    const asignadosModal = new bootstrap.Modal(
        document.getElementById("asignadosModal")
    );
    $(".cerrar_modal_asignados").on("click", function () {
        asignadosModal.toggle();
    });
    $("#button_modal_asignado").on("click", function () {
        asignadosModal.show();
    });

    $("#form_modal_asignados_guardar").submit(function (event) {
        event.preventDefault();
        const form = $(this);
        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: form.serialize(),
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    respuesta_html = "";
                    respuesta_html +='<option value="">---Seleccione---</option>';
                    $.each(respuesta.personas, function (index, item) {
                        if (item['id'] == respuesta.id) {
                            respuesta_html += '<option value="' + item['id'] + '" selected>' + item["asignado"] + '</option>';
                        } else {
                            respuesta_html += '<option value="' + item['id'] + '">' + item["asignado"] + '</option>';
                        }
                    });
                    asignadosModal.toggle();
                    $("#rentado_asignado_id").html(respuesta_html);
                    Sistema.notificaciones(
                        "Usuario/Entidad regitrado correctamente",
                        "Sistema",
                        "success"
                    );
                } else {
                    Sistema.notificaciones(
                        "El Usuario/Entidad no pudo ser registrado",
                        "Sistema",
                        "error"
                    );
                }
            },
            error: function () {},
        });
    });
    $("#submit_modal_asignados").on("click", function () {});
//-----------------------------------------------------------------------------------------

});
