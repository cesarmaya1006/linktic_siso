$(document).ready(function () {

    //-----------------------------------------------------------------------------------------
    $("#btn_devolver").click(function(event) {
        event.preventDefault();
        Swal.fire({
            title: '¿Está seguro que desea devolver el equipo al proveedor?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Devolver!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location = $(this).attr('href');
            }
          });
      });
      //-----------------------------------------------------------------------------------------

});
