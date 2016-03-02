var contador = 1;

function agregarEstudiante() {
        var aux = $("#estudiantesTFG >*").length;
        if(aux<6){
        $("#estudiantesTFG").append("<div id=\"idEstudiante" + contador + "\"><br> <input required class=\"form-control\" name=\"idEstudiante" + contador + " id=\"idEstudiante" + contador + "></div>");
        $("#botonesTFG").append("<div id=\"idEstudiante" + contador + "\"></br><button id=\"idEstudiante" + contador + "\" type=\"button\" class=\"btn btn-default\" aria-label=\"Left Align\" onclick=\"eliminarEstudiante(this)\"><span class=\"glyphicon glyphicon-minus\" aria-hidden=\"true\"></span></button></div>");
        contador++;
    }
}

function eliminarEstudiante(event) {
    $("div").remove("#"+event.id);
    
    
}