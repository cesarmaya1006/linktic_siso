$(document).ready(function() {
    $('.contador').each(function( index ) {
        incrementar($(this),$(this).attr('data_numero'));
      });
});
 function incrementar(h3,valorFinal){
    var valor=0;
    for (let i = 0; i <= valorFinal; i++) {
        h3.html(valor+i);
    }
 }
