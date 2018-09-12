var options = {
    molderia : ["Falta tabla de medidas","no coincide dibujo con tabla de medidas","medida incorrecta","falta medida","falta tolerancia de medidas","molderia que no cumple con las medidas","molderia con el escalado incorrecto"],
    fic : ["falta fic","ppp incorrectas","fic y prenda diferente","fic con falta de especificaciones","fic con maquinaria mal asignada","fic con faltante de especificaciones de ajuste y pestaña","fic con falta de operaciones","fic con ruta mal asignada","fic con la referencia que no es","fic con operaciones incorrectas","fic con medidas incorrectas"],
    hilos : ["tipo de hilo incorrecto","color de hilo mal asignado","falta instrucc de ubicacion de hilos","hilo trocado","piede hilo para una operacion que no la lleva"],
    ficha_tecnica : ["falta insumo o insummo incorrecto","falta instrucc de tampografia","falta especificacion de hilos","falta instrucc de proceso (generales)","numeracion de tallas incorrectas"]
}

$(function(){
var fillSecondary = function(){
    var selected = $('#primary').val();
    $('#secondary').empty();
    options[selected].forEach(function(element,index){
        $('#secondary').append('<option value="'+element+'">'+element+'</option>');
    });
}
$('#primary').change(fillSecondary);
fillSecondary();
});