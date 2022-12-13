$(document).ready(function () {
    //----------------------------------------------------------------------
    $("#area_id").prop('required',false);
    $("#cargo_id").prop('required',false);
    $("#facultad_id").prop('required',false);
    $("#carrera_id").prop('required',false);
    $(".cajasAreas").addClass("d-none");
    $(".cajasFacultades").addClass("d-none");
    //==========================================================================
    $("#rol_id_form").on("change", function (event) {
        const id = $(this).val();
        if (id == 3) {
            $(".cajasAreas").removeClass("d-none");
            $(".cajasFacultades").addClass("d-none");
            $("#area_id").prop('required',true);
            $("#cargo_id").prop('required',true);
            $("#facultad_id").prop('required',false);
            $("#carrera_id").prop('required',false);

        } else {
            $(".cajasFacultades").removeClass("d-none");
            $(".cajasAreas").addClass("d-none");
            $("#area_id").prop('required',false);
            $("#cargo_id").prop('required',false);
            $("#facultad_id").prop('required',true);
            $("#carrera_id").prop('required',true);

        }
    });
    //==========================================================================
    $("#area_id").on("change", function (event) {
        const url_t = $(this).attr("data_url");
        const id = $(this).val();

        var data = {
            id: id,
        };
        $.ajax({
            url: url_t,
            type: "GET",
            data: data,
            success: function (respuesta) {
                console.log(respuesta);
                respuesta_html = "";
                if (id != "") {
                    respuesta_html +=
                        '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html +=
                        '<option value="">Seleccione primero un área</option>';
                }
                $.each(respuesta, function (index, item) {
                    respuesta_html +=
                        '<option value="' +
                        item["id"] +
                        '">' +
                        item["cargo"] +
                        "</option>";
                });
                $("#cargo_id").html(respuesta_html);
            },
            error: function () {},
        });
    });
    //==========================================================================
    $("#facultad_id").on("change", function (event) {
        const url_t = $(this).attr("data_url");
        const id = $(this).val();

        var data = {
            id: id,
        };
        $.ajax({
            url: url_t,
            type: "GET",
            data: data,
            success: function (respuesta) {
                console.log(respuesta);
                respuesta_html = "";
                if (id != "") {
                    respuesta_html +=
                        '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html +=
                        '<option value="">Seleccione primero una facultad</option>';
                }
                $.each(respuesta, function (index, item) {
                    respuesta_html +=
                        '<option value="' +
                        item["id"] +
                        '">' +
                        item["carrera"] +
                        "</option>";
                });
                $("#carrera_id").html(respuesta_html);
            },
            error: function () {},
        });
    });
    //==========================================================================

});

function mostrar(){
    var archivo = document.getElementById("foto").files[0];
    var reader = new FileReader();
    if (archivo) {
      reader.readAsDataURL(archivo );
      reader.onloadend = function () {
        document.getElementById("fotoUsuario").src = reader.result;
      }
    }
  }
//----------------------------------------------------------------------
