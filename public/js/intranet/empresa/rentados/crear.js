$(document).ready(function () {
    //-----------------------------------------------------------------------------------------
    //Modal Proveedores
    const proveedoresModal = new bootstrap.Modal(
        document.getElementById("proveedoresModal")
    );
    $(".cerrar_modal_proveedores").on("click", function () {
        proveedoresModal.toggle();
    });
    $("#button_modal_proveedores").on("click", function () {
        proveedoresModal.show();
    });

    $("#form_modal_proveedores").submit(function (event) {
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
                    $.each(respuesta.proveedores, function (index, item) {
                        if (item['id'] == respuesta.id) {
                            respuesta_html += '<option value="' + item['id'] + '" selected>' + item["proveedor"] + '</option>';
                        } else {
                            respuesta_html += '<option value="' + item['id'] + '">' + item["proveedor"] + '</option>';
                        }
                    });
                    proveedoresModal.toggle();
                    $("#proveedor_rentado_id").html(respuesta_html);
                    Sistema.notificaciones(
                        "Proveedor regitrado correctamente",
                        "Sistema",
                        "success"
                    );
                } else {
                    Sistema.notificaciones(
                        "El provedor no pudo ser registrado",
                        "Sistema",
                        "error"
                    );
                }
            },
            error: function () {},
        });
    });
    $("#submit_modal_proveedores").on("click", function () {});
//-----------------------------------------------------------------------------------------
    //Modal Centros de costo
    const centrosModal = new bootstrap.Modal(
        document.getElementById("centrosModal")
    );
    $(".cerrar_modal_centros").on("click", function () {
        centrosModal.toggle();
    });
    $("#button_modal_centros").on("click", function () {
        centrosModal.show();
    });

    $("#form_modal_centros").submit(function (event) {
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
                    $.each(respuesta.centros, function (index, item) {
                        if (item['id'] == respuesta.id) {
                            respuesta_html += '<option value="' + item['id'] + '" selected>' + item["proyecto"] + '</option>';
                        } else {
                            respuesta_html += '<option value="' + item['id'] + '">' + item["proyecto"] + '</option>';
                        }
                    });
                    centrosModal.toggle();
                    $("#centro_costo_id").html(respuesta_html);
                    Sistema.notificaciones(
                        "Centro de Costo regitrado correctamente",
                        "Sistema",
                        "success"
                    );
                } else {
                    Sistema.notificaciones(
                        "El centro de costo no pudo ser registrado",
                        "Sistema",
                        "error"
                    );
                }
            },
            error: function () {},
        });
    });
//-----------------------------------------------------------------------------------------
    //Modal SubCentros de costo
    const sub_centrosModal = new bootstrap.Modal(
        document.getElementById("sub_centrosModal")
    );
    $(".cerrar_modal_sub_centros").on("click", function () {
        sub_centrosModal.toggle();
    });
    $("#button_modal_sub_centros").on("click", function () {

        sub_centrosModal.show();
    });

    $("#form_modal_sub_centros").submit(function (event) {
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
                    $.each(respuesta.sub_centros, function (index, item) {
                        if (item['id'] == respuesta.id) {
                            respuesta_html += '<option value="' + item['id'] + '" selected>' + item["proyecto"] + '</option>';
                        } else {
                            respuesta_html += '<option value="' + item['id'] + '">' + item["proyecto"] + '</option>';
                        }
                    });
                    sub_centrosModal.toggle();
                    $("#sub_centro_costo_id").html(respuesta_html);
                    Sistema.notificaciones(
                        "Sub Centro de Costo regitrado correctamente",
                        "Sistema",
                        "success"
                    );
                } else {
                    Sistema.notificaciones(
                        "El Sub-Centro de costo no pudo ser registrado",
                        "Sistema",
                        "error"
                    );
                }
            },
            error: function () {},
        });
    });
    //-----------------------------------------------------------------------------------------
    //==========================================================================
    $('#centro_costo_id_modal').on('change', function(event) {
        const url_t = $(this).attr('data_url');
        const id = $(this).val();
        var data = {
            "id": id,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                console.log(respuesta);
                $('#consecutivo_span').html(respuesta.consecutivo);
                $('#consecutivo').val(respuesta.consecutivo);
            },
            error: function() {

            }
        });
    });
    //==========================================================================
    $('#centro_costo_id').on('change', function() {
        const url_t = $(this).attr('data_url');
        const id = $(this).val();
        var data = {
            "id": id,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                console.log(respuesta);
                respuesta_html = '';
                if (id != '') {
                    respuesta_html += '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html += '<option value="">Seleccione primero un centro de costo</option>';
                }
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['centro'] + '</option>';
                });
                $('#sub_centro_costo_id').html(respuesta_html);
                $('#button_modal_sub_centros').attr('data_id',id);            },
            error: function() {

            }
        });
    });
    //-----------------------------------------------------------------------------------------
    //Modal Responsables
    const responsablesModal = new bootstrap.Modal(document.getElementById("responsablesModal"));
    $(".cerrar_modal_responsables").on("click", function () {
        responsablesModal.toggle();
    });
    $("#button_modal_responsables").on("click", function () {
        responsablesModal.show();
    });

    $("#form_modal_responsables").submit(function (event) {
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
                    $.each(respuesta.responsables, function (index, item) {
                        if (item['id'] == respuesta.id) {
                            respuesta_html += '<option value="' + item['id'] + '" selected>' + item["responsable"] + '</option>';
                        } else {
                            respuesta_html += '<option value="' + item['id'] + '">' + item["responsable"] + '</option>';
                        }
                    });
                    responsablesModal.toggle();
                    $("#rentado_responsable_id").html(respuesta_html);
                    Sistema.notificaciones(
                        "Responsable regitrado correctamente",
                        "Sistema",
                        "success"
                    );
                } else {
                    Sistema.notificaciones(
                        "El responsable no pudo ser registrado",
                        "Sistema",
                        "error"
                    );
                }
            },
            error: function () {},
        });
    });
    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------
    //Modal tipos
    const tiposModal = new bootstrap.Modal(document.getElementById("tiposModal"));
    $(".cerrar_modal_tipos").on("click", function () {
        tiposModal.toggle();
    });
    $("#button_modal_tipos").on("click", function () {
        tiposModal.show();
    });

    $("#form_modal_tipos").submit(function (event) {
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
                    $.each(respuesta.tipos, function (index, item) {
                        if (item['id'] == respuesta.id) {
                            respuesta_html += '<option value="' + item['id'] + '" selected>' + item["tipo"] + '</option>';
                        } else {
                            respuesta_html += '<option value="' + item['id'] + '">' + item["tipo"] + '</option>';
                        }
                    });
                    tiposModal.toggle();
                    $("#rentado_tipo_id").html(respuesta_html);
                    Sistema.notificaciones(
                        "Tipo de equipo regitrado correctamente",
                        "Sistema",
                        "success"
                    );
                } else {
                    Sistema.notificaciones(
                        "El tipo de equipo no pudo ser registrado",
                        "Sistema",
                        "error"
                    );
                }
            },
            error: function () {},
        });
    });
    //-----------------------------------------------------------------------------------------

});
