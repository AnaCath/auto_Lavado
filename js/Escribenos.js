$("#Escribenos").submit(function(event) {
    event.preventDefault();
    enviar();
});

function enviar(){
    var datos=$("#Escribenos").serialize();
    $.ajax({
        type: "POST",
        url: "php/Slicitud.php",
        data: datos,
        success: function(texto){
            if(texto=="Exito"){
                correcto();
            }else{
                Errorphp(texto);
            }
        }
    })
}

function correcto(){
    $("#msjC").addClass("alert");
    $("#msjC").addClass("alert-success");  
}

function Errorphp(texto){
    $("#msjE").addClass("alert ");
    $("#msjE").addClass("alert-success");
    $("#msjE").html(texto);
}