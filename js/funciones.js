var contador = 2;
var vector = [1, 0, 0, 0, 0, 0 ];

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



function selectEstudiantes() {
   
   
        var aux = $('input:radio[name=radEstudiante]:checked').val();
        if(aux !== undefined){
            var text = $.trim($("#idEstudiante1").val());
            if(text.length < 1 ){
                $("#idEstudiante1").val(aux)
            }else{
                agregarEstudiantes2(aux);
            }
        }
        
        
}

function agregarEstudiantes2( id) {


        var aux = $("#estudiantes").find("div").length;
        
    
        if(aux<6){
        numero= asignarID();
        var s = '<div id="divEstud'+numero+'" class="form-group"> <label for="btnAgregar">Cédula Estudiante:</label> <input id="idEstudiante'+numero+'" value="'+id+'" name="nameEstudiante'+numero+'" type="text" class="form-control input-sm m-b-xs required" placeholder="Cédula Estudiante"><button id="divEstud'+numero+'" name="btnEstudiante'+numero+'" class="btn btn-danger btn-rounded" onclick="eliminarEstudiantes(this)" type="button" >Eliminar Estudiante</button></div>';
        $("#estudiantes").append(s);
        contador++;
        
    }
}

function agregarEstudiantes() {
    
        var aux = $("#estudiantes").find("div").length;
        
    
        if(aux<6){
        numero= asignarID();
        var s = '<div id="divEstud'+numero+'" class="form-group"> <label for="btnAgregar">Cédula Estudiante:</label> <input id="idEstudiante'+numero+'" name="nameEstudiante'+numero+'" type="text" class="form-control input-sm m-b-xs required" placeholder="Cédula Estudiante"><button id="divEstud'+numero+'" name="btnEstudiante'+numero+'" class="btn btn-danger btn-rounded" onclick="eliminarEstudiantes(this)" type="button" >Eliminar Estudiante</button></div>';
        $("#estudiantes").append(s);
        contador++;
        
    }
}

function eliminarEstudiantes(event) {
    
    var s= (event.id).toString();
    $("div").remove("#"+event.id);
    var num = (s.substr( s.length-1, s.length ));
    vector[parseInt(num) - 1] = 0;

    
}


function asignarID(){
  
        for (x=1; x < vector.length; x++){
            if(vector[x] === 0){
                vector[x]=1;
                return x + 1;
            }
        }  
    
}

