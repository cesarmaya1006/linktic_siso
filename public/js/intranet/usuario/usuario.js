$(document).ready(function() {
    $("#tabla-usuarios").on('submit', '.form-eliminar', function() {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿Está seguro que desea eliminar el registro de usuario?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form);
            }
        });
    });

    function ajaxRequest(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(respuesta) {
                if (respuesta.mensaje == "ok") {
                    form.parents('tr').remove();
                    Sistema.notificaciones('El registro de usuario fue eliminado correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('El registro de usuario no pudo ser eliminado, hay recursos usandolo', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    }

    //==========================================================================
    $('.cargarUsuarios').on('click', function(event) {
        const url_t = $(this).attr('data_url');
        const id = $(this).attr('data_id');
        const data_foto = $(this).attr('data_foto');
        const catn = data_foto.length - 5;
        const serv_fotos = data_foto.substring(0, catn);
        var data = {
            "id": id,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                var informacion ='';
                informacion+= 'id:'+respuesta.id +'\n';
                if (respuesta.usuario.roles[0].id ==3) {
                    informacion+= 'area:'+respuesta.cargo.area.area +'\n';
                    informacion+= 'cargo:'+respuesta.cargo.cargo +'\n';
                } else {
                    informacion+= 'facultad:'+respuesta.carrera.facultad.facultad +'\n';
                    informacion+= 'carrera:'+respuesta.carrera.carrera +'\n';
                }
                informacion+= 'identificacion:'+respuesta.tipos_docu.abreb_id+' '+ respuesta.identificacion +'\n';
                informacion+='Nombres y apellidos: '+ respuesta.nombre1 + ' '  + respuesta.nombre2 + ' '  + respuesta.apellido1 + ' '  + respuesta.apellido2 +'\n';
                informacion+= 'telefono:'+respuesta.telefono_celu +'\n';
                informacion+= 'direccion:'+respuesta.direccion +'\n';
                informacion+= 'email:'+respuesta.email +'\n';
                informacion+= 'vigencia:'+respuesta.vigencia +'\n';
                if (respuesta.estado) {
                    informacion+= 'estado: Activo\n';
                } else {
                    informacion+= 'estado: Innactivo\n';
                }

                var html ='';
                html+='<div class="bordeCarnet m-2 rounded" style="border: 1px black solid;background-color: '+ respuesta.usuario.roles[0].carnets[0].marco5 +';">';
                html+='<div class="foto pt-3 pl-3 pr-3 pb-0 m-3" style="background: linear-gradient(180deg, '+ respuesta.usuario.roles[0].carnets[0].marco1 +' 0%, '+ respuesta.usuario.roles[0].carnets[0].marco2 +' 15%, '+ respuesta.usuario.roles[0].carnets[0].marco3 +' 30%, '+ respuesta.usuario.roles[0].carnets[0].marco4 +' 45%, '+ respuesta.usuario.roles[0].carnets[0].marco5 +' 60%, '+ respuesta.usuario.roles[0].carnets[0].marco5 +' 100%);">';
                html+='<img src="' + serv_fotos+respuesta.foto + '" class="w-100 rounded mx-auto d-block " alt="...">';
                html+='</div>';
                html+='<div class="rolUsuario text-capitalize d-flex justify-content-center"><strong>'+respuesta.usuario.roles[0].nombre+'</strong></div>';
                html+='<div class="nombreUsuario mt-1 fs-5 d-flex justify-content-center"><strong>' + respuesta.nombre1 + ' '  + respuesta.nombre2 + ' '  + respuesta.apellido1 + ' '  + respuesta.apellido2  + '</strong></div>';
                html+='<div class="codigoQR d-flex justify-content-center mt-2 mb-3" id="codigoQR">';
                //html+='{!! QrCode::size(100)->generate(\'' + informacion + '\'); !!}';
                html+='</div>';
                html+='<div class="facultad row mb-4 m-3" style="background-color: '+ respuesta.usuario.roles[0].carnets[0].label1 +';color:white; border-radius: 5px">';
                if (respuesta.usuario.roles[0].id ==3) {
                    html+='<div class="col-12 text-center text-wrap"><h5><strong>' + respuesta.cargo.area.area + '</strong></h5></div>';
                    html+='<div class="col-12 text-center"><h6>' + respuesta.cargo.cargo + '</h6></div>';
                } else {
                    html+='<div class="col-12 text-center text-wrap"><h5><strong>' + respuesta.carrera.facultad.facultad +'</strong></h5></div>';
                    html+='<div class="col-12 text-center"><h6>'+respuesta.carrera.carrera +'</h6></div>';
                }
                html+='</div>';
                html+='<div class="valido d-flex justify-content-center mb-2"><strong style="font-weight: bold; font-size: 0.8em;">Valido hasta '+respuesta.vigencia +'</strong></div>';
                html+='</div>';
                $('#modalCuerpo').html(html);
                informacion = informacion.padEnd(500);

                var qrcode = new QRCode(document.getElementById("codigoQR"), {
                    width : 250,
                    height : 250
                });
                qrcode.makeCode(informacion);
                //new QRCode(document.getElementById("codigoQR"), informacion);
            },
            error: function() {

            }
        });

    });
    //==========================================================================
});
