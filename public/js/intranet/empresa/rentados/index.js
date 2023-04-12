$(document).ready(function () {
    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------
    //Modal devolverProveedor
    const devolverProveedorModal = new bootstrap.Modal(document.getElementById("devolverProveedorModal"));
    const form = $("#form_devolverProveedor");
    $(".cerrar_modal_devolverProveedor").on("click", function () {
        devolverProveedorModal.toggle();
    });
    $("#form_devolverProveedor").submit(function (event) {
        event.preventDefault();
        const form = $(this);
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
                form.submit;
            }
          });
    });
    //-----------------------------------------------------------------------------------------
    //Modal devolverBodega
    const devolverBodegaModal = new bootstrap.Modal(document.getElementById("devolverBodegaModal"));
    const formBodega = $("#form_devolverBodega");

    $("#form_devolverBodega").one('submit', function (event) {
        event.preventDefault();
        const form = $(this);
        Swal.fire({
            title: '¿Está seguro que desea devolver el equipo al Bodega?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Devolver!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
          });
    });
    //-----------------------------------------------------------------------------------------
});
function btnDevolver(url){
    const action =  url;
    const form = $("#form_devolverProveedor");
    const devolverProveedorModal = new bootstrap.Modal(document.getElementById("devolverProveedorModal"));
    form.attr("action",action);
    devolverProveedorModal.show();
}
function btnDevolverBodega(url){
    const action =  url;
    const form = $("#form_devolverBodega");
    const devolverBodegaModal = new bootstrap.Modal(document.getElementById("devolverBodegaModal"));
    form.attr("action",action);
    devolverBodegaModal.show();
}
function cerrar_modal_devolverBodega(){
    const devolverBodegaModal = new bootstrap.Modal(document.getElementById("devolverBodegaModal"));
    devolverBodegaModal.toggle();
}
