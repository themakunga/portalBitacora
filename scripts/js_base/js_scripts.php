<script>
	$(document).ready(function() {
   	$("#content div").hide(); // inicialmente esconde todo
    $("#tabs li:first").attr("id","current"); // Activa la primera pestaña
    $("#content div:first").fadeIn(); // muestra el contenido de la primera pestaña
    
    $('#tabs a').click(function(e) {
        e.preventDefault();        
        $("#content div").hide(); //esconde todos los contenidos
        $("#tabs li").attr("id",""); //Resetea id de pestañas
        $(this).parent().attr("id","current"); // Activa THIS
        $('#' + $(this).attr('title')).fadeIn(); // Muestra el contenido de la pestaña actual
    });
});
</script>



<script language="JavaScript"> 
function mueveReloj(){ 
    momentoActual = new Date(); 
    hora = momentoActual.getHours(); 
    minuto = momentoActual.getMinutes(); 
    segundo = momentoActual.getSeconds(); 

    str_segundo = new String (segundo) 
    if (str_segundo.length == 1) 
       segundo = "0" + segundo; 

    str_minuto = new String (minuto) 
    if (str_minuto.length == 1) 
       minuto = "0" + minuto; 

    str_hora = new String (hora) 
    if (str_hora.length == 1) 
       hora = "0" + hora; 

    horaImprimible = hora + ":" + minuto + ":" + segundo; 

    cl.innerHTML = horaImprimible; 

    setTimeout("mueveReloj()",1000); 
} 
</script> 
