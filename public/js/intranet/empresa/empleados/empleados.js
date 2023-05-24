$(document).ready(function () {
    const cuentasCorpModal = new bootstrap.Modal(document.getElementById("cuentasCorporativasModal"));
    const licenciasCorpModal = new bootstrap.Modal(document.getElementById("licenciasCorporativasModal"));
    $(".verModalEquiposPropios").on("click", function () {
        const url_t = $(this).attr("data_url");
        const data_empleado = $(this).attr("data_empleado");
        $.ajax({
            url: url_t,
            type: "GET",
            success: function (respuesta) {
                console.log(respuesta);
                if (respuesta.length == 0) {
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += "<h4>Sin Equipos asignados</h4>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                }else{
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += '<div class="ul">';
                    var num_equipo =0;
                    $.each(respuesta, function (index, item) {
                        num_equipo++;
                        respuesta_html +="<li>Equipo " + num_equipo + "<ul><li>Serial: " + item["serial"] + "</li><li>Nombre: " + item["name"] + "</li></ul></li>";
                    });
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                }

                $("#bodyEquiposPropios").html(respuesta_html);
                $("#compPropiosModalLabel").html('Equipos Propios Asignados a <br>' + data_empleado);
            },
            error: function () {},
        });
    });

    $(".verModalImpresoras").on("click", function () {
        const url_t = $(this).attr("data_url");
        const data_empleado = $(this).attr("data_empleado");
        $.ajax({
            url: url_t,
            type: "GET",
            success: function (respuesta) {
                console.log(respuesta);
                if (respuesta.length == 0) {
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += "<h4>Sin Impresoras asignadas</h4>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                }else{
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += '<div class="ul">';
                    var num_equipo =0;
                    $.each(respuesta, function (index, item) {
                        num_equipo++;
                        respuesta_html +="<li>Impresora " + num_equipo + "<ul><li>Serial: " + item["serial"] + "</li><li>Nombre: " + item["name"] + "</li></ul></li>";
                    });
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                }

                $("#bodyImpresoras").html(respuesta_html);
                $("#impresorasModalLabel").html('Impresoras Asignadas a <br>' + data_empleado);
            },
            error: function () {},
        });
    });

    $(".verModalMonitores").on("click", function () {
        const url_t = $(this).attr("data_url");
        const data_empleado = $(this).attr("data_empleado");
        $.ajax({
            url: url_t,
            type: "GET",
            success: function (respuesta) {
                console.log(respuesta);
                if (respuesta.length == 0) {
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += "<h4>Sin Monitores asignados</h4>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                }else{
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += '<div class="ul">';
                    var num_equipo =0;
                    $.each(respuesta, function (index, item) {
                        num_equipo++;
                        respuesta_html +="<li>Monitor " + num_equipo + "<ul><li>Serial: " + item["serial"] + "</li><li>Fabricante: " + item["fabricante"]["name"] + "</li><li>Modelo: " + item["modelo_monitor"]["name"] + "</li></ul></li>";
                    });
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                }

                $("#bodyMonitores").html(respuesta_html);
                $("#monitoresModalLabel").html('Monitores Asignados a <br>' + data_empleado);
            },
            error: function () {},
        });
    });

    $(".verModalOtros").on("click", function () {
        const url_t = $(this).attr("data_url");
        const data_empleado = $(this).attr("data_empleado");
        $.ajax({
            url: url_t,
            type: "GET",
            success: function (respuesta) {
                console.log(respuesta);
                if (respuesta.length == 0) {
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += "<h4>Sin Otros Elementos Asignados</h4>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                }else{
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += '<div class="ul">';
                    var num_equipo =0;
                    $.each(respuesta, function (index, item) {
                        num_equipo++;
                        respuesta_html +="<li>Elemento " + num_equipo + "<ul><li>Elemento: " + item["elemento"] + "</li><li>Número de serie: " + item["num_serie"] + "</li><li>Tipo Elemento: " + item["elemento"] + "</li></ul></li>";
                    });
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                }

                $("#bodyOtros").html(respuesta_html);
                $("#otrosModalLabel").html('Otros Elementos Asignados a <br>' + data_empleado);
            },
            error: function () {},
        });
    });

    $(".verModalEquiposRentados").on("click", function () {
        const url_t = $(this).attr("data_url");
        const data_empleado = $(this).attr("data_empleado");
        $.ajax({
            url: url_t,
            type: "GET",
            success: function (respuesta) {
                if (respuesta.length == 0) {
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += "<h4>Sin Equipos asignados</h4>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                } else {
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += '<div class="ul">';
                    var num_equipo =0;
                    $.each(respuesta, function (index, item) {
                        num_equipo++;
                        respuesta_html +="<li>Equipo " + num_equipo + "<ul><li>Serial: " + item["serial"] + "</li><li>Ticket: " + item["ticket"] + "</li><li>Codigo: " + item["codigo"] + "</li></ul></li>";
                    });
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                }

                $("#bodyEquiposRentados").html(respuesta_html);
                $("#compRentadosModalLabel").html('Equipos Rentados Asignados a <br>' + data_empleado);
            },
            error: function () {},
        });
    });

    $(".verModalCuentasCorporativas").on("click", function () {
        const url_t = $(this).attr("data_url");
        const data_empleado = $(this).attr("data_empleado");
        $.ajax({
            url: url_t,
            type: "GET",
            success: function (respuesta) {
                if (respuesta.length == 0) {
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += "<h4>Sin Cuentas Corporativas</h4>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                } else {
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += '<div class="ul">';
                    $.each(respuesta, function (index, item) {
                        respuesta_html +="<li><Strong>" + item["cuenta"] + "</Strong></li>";
                    });
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                }
                $("#bodyCuentasCorporativas").html(respuesta_html);
                $("#cuentasCorporativasModalLabel").html('Cuentas Corporativas Asignadas a <br>' + data_empleado);
            },
            error: function () {},
        });
    });

    $(".verModalLicenciasCorporativas").on("click", function () {
        const url_t = $(this).attr("data_url");
        const data_empleado = $(this).attr("data_empleado");
        $.ajax({
            url: url_t,
            type: "GET",
            success: function (respuesta) {
                if (respuesta.length == 0) {
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += "<h4>Sin Licencias Corporativas</h4>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                } else {
                    respuesta_html = "";
                    respuesta_html += '<div class="row">';
                    respuesta_html += '<div class="col-12">';
                    respuesta_html += '<div class="ul">';
                    $.each(respuesta, function (index, item) {
                        respuesta_html +="<li><Strong>" + item["licencia"] + "</Strong></li>";
                    });
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                    respuesta_html += "</div>";
                }
                $("#bodyLicenciasCorporativas").html(respuesta_html);
                $("#licenciasCorporativasModalLabel").html('Licencias Corporativas Asignadas a <br>' + data_empleado);
            },
            error: function () {},
        });
    });
});
