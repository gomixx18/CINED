var contador = 1;

function agregarInvest() {
        
        var aux = $("#investigadores").find("div").length;
        if(aux<6){
        $("#investidadores").append("<div id=\"divInvest"+contador+"\" class=\"form-group\"><label  for=\"inputInvest"+contador+"\">Cédula Investigador:</label name=\"inputInvest"+contador+"\"><input id=\"idInvestigador" + contador + "\" class=\"form-control input-sm m-b-xs required\" placeholder=\"cédula investigador\" name=\"idInvestigador" + contador + " id=\"idEstudiante" + contador + "\"> \n\
         <button id=\"divInvest" + contador + "\" type=\"button\" class=\"btn btn-danger btn-rounded \" onclick=\"eliminarInvest(this)\">Eliminar Investigador</button></div>");
        contador++;
    }
}

function eliminarInvest(event) {
    
    alert(contador)
    $("div").remove("#divInvest"+contador);
    if(contador > 1){
        contador-- ;
    }
    
    
    
    
}


function agregarEstudiantes() {
        var aux = $("#estudiantes").length;
        if(aux<6){
        $("#estudiantes").append("<div id=\"divEstud"+contador+"\" class=\"form-group\"><label  for=\"inputEstud"+contador+"\">Cédula Estudiante:</label name=\"inputestud"+contador+"\"><input id=\"idEStudiante" + contador + "\" class=\"form-control input-sm m-b-xs required\" placeholder=\"cédula Estudiante\" name=\"idEstudiante" + contador + " id=\"idEstudiante" + contador + "\"> \n\
         <button id=\"divEstud" + contador + "\" type=\"button\" class=\"btn btn-danger btn-rounded \" onclick=\"eliminarEstudiantes(this)\">Eliminar Estudiante</button></div>");
        contador++;
    }
}

function eliminarEstudiantes(event) {
    $("div").remove("#"+event.id);
    
    
}


