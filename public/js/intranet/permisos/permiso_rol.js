$(document).ready(function() {
    respuesta_html_2 = '';
    $('#cajaCargos').html(respuesta_html_2);
    $('.cajaCargos').addClass('d-none');
    //==========================================================================
    $('#area_id').on('change', function(event) {
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
                respuesta_html = '';
                if (id != '') {
                    respuesta_html += '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html += '<option value="">Seleccione primero un área</option>';
                }
                $.each(respuesta, function(index, item) {
                    respuesta_html += '<option value="' + item['id'] + '">' + item['cargo'] + '</option>';
                });
                $('#cargo_id').html(respuesta_html);
                respuesta_html_2 = '';
                $('#cajaCargos').html(respuesta_html_2);
                $("#cajaCargos").css("visibility", "visible");
            },
            error: function() {

            }
        });

    });
    //==========================================================================
    $('#cargo_id').on('change', function(event) {
        const url_t = $(this).attr('data_url');
        const id = $(this).val();
        const admin_modificar_menu_permisos = $('#data_url_check').attr('data_url_check');

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
                $.each(respuesta, function(index, item) {
                    respuesta_html+='<div class="col-12 col-md-3 p-2 mini_sombra m-2">';
                    respuesta_html+='<div class="row mb-3">';
                    respuesta_html+='<div class="col-12 text-center">';
                    respuesta_html+='<h6>'+item['nombre']+'</h6>';
                    respuesta_html+='</div>';
                    respuesta_html+='</div>';
                    respuesta_html+='<div class="row">';
                    respuesta_html+='<div class="col-12 col-md-6">';
                    respuesta_html+='<div class="form-check">';
                    respuesta_html+='<input class="form-check-input check_permisos" onchange="cambioPermisos(\''+admin_modificar_menu_permisos+'\',\''+item['permisos_cargo'][0]['id']+'\',\'listar\')" type="checkbox" value="" id="listar_'+item['permisos_cargo'][0]['id']+'" name="listar_'+item['permisos_cargo'][0]['id']+'" data-permisoid="'+item['permisos_cargo'][0]['id']+'" data_url="'+ admin_modificar_menu_permisos +'"  data-permiso_opcion="listar"';
                    if (item['permisos_cargo'][0]['listar']) {
                        respuesta_html+=' checked';
                    }
                    respuesta_html+='>';
                    respuesta_html+='<label class="form-check-label" for="flexCheckDefault">';
                    respuesta_html+='Listar';
                    respuesta_html+='</label>';
                    respuesta_html+='</div>';
                    respuesta_html+='</div>';
                    respuesta_html+='<div class="col-12 col-md-6">';
                    respuesta_html+='<div class="form-check">';
                    respuesta_html+='<input class="form-check-input check_permisos" onchange="cambioPermisos(\''+admin_modificar_menu_permisos+'\',\''+item['permisos_cargo'][0]['id']+'\',\'buscar\')" type="checkbox" value="" id="buscar_'+item['permisos_cargo'][0]['id']+'" name="buscar_'+item['permisos_cargo'][0]['id']+'" data-permisoid="'+item['permisos_cargo'][0]['id']+'" data_url="'+ admin_modificar_menu_permisos +'"  data-permiso_opcion="buscar"';
                    if (item['permisos_cargo'][0]['buscar']) {
                        respuesta_html+=' checked';
                    }
                    respuesta_html+='>';
                    respuesta_html+='<label class="form-check-label" for="flexCheckDefault">';
                    respuesta_html+='Buscar';
                    respuesta_html+='</label>';
                    respuesta_html+='</div>';
                    respuesta_html+='</div>';
                    respuesta_html+='<div class="col-12 col-md-6">';
                    respuesta_html+='<div class="form-check">';
                    respuesta_html+='<input class="form-check-input check_permisos" onchange="cambioPermisos(\''+admin_modificar_menu_permisos+'\',\''+item['permisos_cargo'][0]['id']+'\',\'guardar\')" type="checkbox" value="" id="guardar_'+item['permisos_cargo'][0]['id']+'" name="guardar_'+item['permisos_cargo'][0]['id']+'" data-permisoid="'+item['permisos_cargo'][0]['id']+'" data_url="'+ admin_modificar_menu_permisos +'"  data-permiso_opcion="guardar"';
                    if (item['permisos_cargo'][0]['guardar']) {
                        respuesta_html+=' checked';
                    }
                    respuesta_html+='>';
                    respuesta_html+='<label class="form-check-label" for="flexCheckDefault">';
                    respuesta_html+='Guardar';
                    respuesta_html+='</label>';
                    respuesta_html+='</div>';
                    respuesta_html+='</div>';
                    respuesta_html+='<div class="col-12 col-md-6">';
                    respuesta_html+='<div class="form-check">';
                    respuesta_html+='<input class="form-check-input check_permisos" onchange="cambioPermisos(\''+admin_modificar_menu_permisos+'\',\''+item['permisos_cargo'][0]['id']+'\',\'actualizar\')" type="checkbox" value="" id="actualizar_'+item['permisos_cargo'][0]['id']+'" name="actualizar_'+item['permisos_cargo'][0]['id']+'" data-permisoid="'+item['permisos_cargo'][0]['id']+'" data_url="'+ admin_modificar_menu_permisos +'"  data-permiso_opcion="actualizar"';
                    if (item['permisos_cargo'][0]['actualizar']) {
                        respuesta_html+=' checked';
                    }
                    respuesta_html+='>';
                    respuesta_html+='<label class="form-check-label" for="flexCheckDefault">';
                    respuesta_html+='Actualizar';
                    respuesta_html+='</label>';
                    respuesta_html+='</div>';
                    respuesta_html+='</div>';
                    respuesta_html+='<div class="col-12 col-md-6">';
                    respuesta_html+='<div class="form-check">';
                    respuesta_html+='<input class="form-check-input check_permisos" onchange="cambioPermisos(\''+admin_modificar_menu_permisos+'\',\''+item['permisos_cargo'][0]['id']+'\',\'borrar\')" type="checkbox" value="" id="borrar_'+item['permisos_cargo'][0]['id']+'" name="borrar_'+item['permisos_cargo'][0]['id']+'" data-permisoid="'+item['permisos_cargo'][0]['id']+'" data_url="'+ admin_modificar_menu_permisos +'"  data-permiso_opcion="borrar" ';
                    if (item['permisos_cargo'][0]['borrar']) {
                        respuesta_html+=' checked';
                    }
                    respuesta_html+='>';
                    respuesta_html+='<label class="form-check-label" for="flexCheckDefault">';
                    respuesta_html+='Eliminar';
                    respuesta_html+='</label>';
                    respuesta_html+='</div>';
                    respuesta_html+='</div>';
                    respuesta_html+='</div>';
                    respuesta_html+='</div>';
                });
                $('#cajaCargos').html(respuesta_html);
                $("#cajaCargos").css("visibility", "visible");
            },
            error: function() {

            }
        });

    });
    //==========================================================================
    /*$('.check_permisos').on('change', function() {
        const url_t = $(this).attr('data_url');
        const id = $(this).attr('data-permisoid');
        const opcion = $(this).attr('data-permiso_opcion');
        alert(url_t);


        var data = {
            id: id,
            opcion: opcion,
            _token: $('input[name=_token]').val()
        };

        if ($(this).is(':checked')) {
            data.estado = 1
        } else {
            data.estado = 0
        }

        $.ajax({
            url: url_t,
            type: 'POST',
            data: data,
            success: function(respuesta) {
                Sistema.notificaciones(respuesta.respuesta, 'Sistema', 'success');
            },
            error: function() {

            }
        });
    });*/
    function cambioPermisos_2(){
            const url_t = $(this).attr('data_url');
            const id = $(this).attr('data-permisoid');
            const opcion = $(this).attr('data-permiso_opcion');
            alert(url_t);

            var data = {
                id: id,
                opcion: opcion,
                _token: $('input[name=_token]').val()
            };
    
            if ($(this).is(':checked')) {
                data.estado = 1
            } else {
                data.estado = 0
            }
    
            $.ajax({
                url: url_t,
                type: 'POST',
                data: data,
                success: function(respuesta) {
                    Sistema.notificaciones(respuesta.respuesta, 'Sistema', 'success');
                },
                error: function() {
    
                }
            });
     };
});
 
function cambioPermisos(url_t_,id_,opcion_){
    const url_t = url_t_;
    const id = id_;
    const opcion = opcion_;
    const id_Check = "#"+opcion+"_"+id;
    var data = {
        id: id,
        opcion: opcion,
        _token: $('input[name=_token]').val()
    };

    if ($(id_Check).prop('checked')) {
        data.estado = 1
    } else {
        data.estado = 0
    }
    $.ajax({
        url: url_t,
        type: 'POST',
        data: data,
        success: function(respuesta) {
            Sistema.notificaciones(respuesta.respuesta, 'Sistema', 'success');
        },
        error: function() {

        }
    });
};