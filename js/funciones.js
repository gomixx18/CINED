var contador = 2;
var vector = [1, 0, 0, 0, 0, 0];




function iniVector() {
    for (x = 1; x < vector.length; x++) {
        if ($("#divEstud" + x).length > 0) {
            vector[x - 1] = 1;
        }
    }

}




function agregarInvest() {

    var aux = $("#investigadores").find("div").length;
    if (aux < 6) {
        $("#investidadores").append("<div id=\"divInvest" + contador + "\" class=\"form-group\"><label  for=\"inputInvest" + contador + "\">Cédula Investigador:</label name=\"inputInvest" + contador + "\"><input id=\"idInvestigador" + contador + "\" class=\"form-control input-sm m-b-xs required\" placeholder=\"cédula investigador\" name=\"idInvestigador" + contador + " id=\"idEstudiante" + contador + "\"> \n\
         <button id=\"divInvest" + contador + "\" type=\"button\" class=\"btn btn-danger btn-rounded \" onclick=\"eliminarInvest(this)\">Eliminar Investigador</button></div>");
        contador++;
    }
}

function eliminarInvest(event) {

    alert(contador)
    $("div").remove("#divInvest" + contador);
    if (contador > 1) {
        contador--;
    }

}



function selectEstudiantes() {


    var aux = $('input:radio[name=radEstudiante]:checked').val();
    var auxNombre = $('input:radio[name=radEstudiante]:checked').attr("nombreaux");
    var auxApellido1 = $('input:radio[name=radEstudiante]:checked').attr("ap1aux");
    var auxApellido2 = $('input:radio[name=radEstudiante]:checked').attr("ap2aux");
    if (aux !== undefined) {
        var text = $.trim($("#idEstudiante1").val());
        if (text.length < 1) {
            var s = auxNombre + " " + auxApellido1 + " " + auxApellido2;
            $("#primerEstudiante").append(s);
            $("#idEstudiante1").val(aux);
        } else {
            agregarEstudiantes2(aux);
        }
    }


}

function agregarEstudiantes2(id) {


    var aux = $("#estudiantes").find("div").length;
    var auxNombre = $('input:radio[name=radEstudiante]:checked').attr("nombreaux");
    var auxApellido1 = $('input:radio[name=radEstudiante]:checked').attr("ap1aux");
    var auxApellido2 = $('input:radio[name=radEstudiante]:checked').attr("ap2aux");


    if (aux < 6) {
        numero = asignarID();

        var s = '<div id="divEstud' + numero + '" class="form-group"> <label for="btnAgregar">Cédula Estudiante:</label> <p>' + auxNombre + ' ' + auxApellido1 + ' ' + auxApellido2 + '</p> <input id="idEstudiante' + numero + '" value="' + id + '" name="nameEstudiante' + numero + '" type="text" class="form-control input-sm m-b-xs required" placeholder="Cédula Estudiante"><button id="divEstud' + numero + '" name="btnEstudiante' + numero + '" class="btn btn-danger btn-rounded" onclick="eliminarEstudiantes(this)" type="button" >Eliminar Estudiante</button></div>';
        $("#estudiantes").append(s);
        contador++;

    }
}

function agregarEstudiantes() {

    var aux = $("#estudiantes").find("div").length;


    if (aux < 6) {
        numero = asignarID();
        var s = '<div id="divEstud' + numero + '" class="form-group"> <label for="btnAgregar">Cédula Estudiante:</label> <input id="idEstudiante' + numero + '" name="nameEstudiante' + numero + '" type="text" class="form-control input-sm m-b-xs required" placeholder="Cédula Estudiante"><button id="divEstud' + numero + '" name="btnEstudiante' + numero + '" class="btn btn-danger btn-rounded" onclick="eliminarEstudiantes(this)" type="button" >Eliminar Estudiante</button></div>';
        $("#estudiantes").append(s);
        contador++;

    }
}

function eliminarEstudiantes(event) {

    var s = (event.id).toString();
    $("div").remove("#" + event.id);
    var num = (s.substr(s.length - 1, s.length));
    vector[parseInt(num) - 1] = 0;


}


function asignarID() {

    for (x = 1; x < vector.length; x++) {
        if (vector[x] === 0) {
            vector[x] = 1;
            return x + 1;
        }
    }

}



function selectEstudiantes2(tipo) {
    
    iniVector();
    //array[0] = $('input:radio[name=activo1]:checked').val();
    var aux = $('input:radio[name=radEstudiante]:checked').val();
    var auxNombre = $('input:radio[name=radEstudiante]:checked').attr("nombreaux");
    var auxApellido1 = $('input:radio[name=radEstudiante]:checked').attr("ap1aux");
    var auxApellido2 = $('input:radio[name=radEstudiante]:checked').attr("ap2aux");

    if (aux !== undefined) {
        var text = $.trim($("#idEstudiante1").val());
        if (text.length < 1) {
            var s = "<div id='divEstud1'><div class='row'> <div class='col-lg-10'>  <label>Estudiante:</label><input id='' name='' type='text' value='" + auxNombre + " " + auxApellido1 + " " + auxApellido2 + "' class='form-control input-sm m-b-xs required' disabled> </div> <div class = 'col-lg-5'> <label>Cedula:</label> <input id = 'idEstudiante1' name = 'nameEstudiante1' type = 'text' value = " + aux + " class = 'form-control input-sm m-b-xs required' disabled > </div> <div class='col-lg-3'> <br> <input type='radio' value='1' class='i-checks' name='activo" + aux + "' checked='checked'> <input type='radio' value='0' class='ni-checks' name='activo" + aux + "' ></div> </div>";
            $("#divEstud1").val(s);
        }
        else {
            agregarEstudiantes3(aux,tipo);
        }
    }


}

function agregarEstudiantes3(id, tipo) {
    
   
    var s="";
    var count = 0;
    var aux ;
    var auxNombre = $('input:radio[name=radEstudiante]:checked').attr("nombreaux");
    var auxApellido1 = $('input:radio[name=radEstudiante]:checked').attr("ap1aux");
    var auxApellido2 = $('input:radio[name=radEstudiante]:checked').attr("ap2aux");
    
    if(tipo === "estudiante"){
        count = 54;
        aux = $("#estudiantes").find("div").length;

    }
    if(tipo === "asesor"){
        count = 18;
        aux = $("#estudiantes3").find("div").length;

    }

    if (aux < count) {
        numero = asignarID();

        if(tipo === "estudiante"){
            s = "<div id='divEstud" + numero + "'> <label>Estudiante:</label><div class='row'><div class='col-lg-12'><input id='' name='' type='text' value='" + auxNombre + " " + auxApellido1 + " " + auxApellido2 + " " + "' class='form-control' disabled></div></div><label>Cedula:</label><div class='row'><div class = 'col-lg-5'><input id = 'idEstudiante" + numero + "' type = 'text' value = " + id + " class = 'form-control' disabled ><input name = 'nameEstudiante" + numero + "' type = 'hidden' value = " + id + " class = 'form-control'></div><div class = 'col-lg-3'>Activo<input type='radio' value='1' class='i-checks' name='activo" + id + "' checked='checked'></div><div class = 'col-lg-3'>Inactivo<input type='radio' value='0' class='ni-checks' name='activo" + id + "' ></div></div></br></div>";
            $("#estudiantes").append(s);
        }
        if(tipo === "asesor"){
            s = "<div id='divEstud" + numero + "'> <label>Estudiante:</label><div class='row'><div class='col-lg-12'><input id='' name='' type='text' value='" + auxNombre + " " + auxApellido1 + " " + auxApellido2 + " " + "' class='form-control' disabled></div></div><label>Cedula:</label><div class='row'><div class = 'col-lg-5'><input id = 'idEstudiante" + numero + "' type = 'text' value = " + id + " class = 'form-control' disabled ><input name = 'nameAsesor" + numero + "' type = 'hidden' value = " + id + " class = 'form-control'></div><div class = 'col-lg-3'>Activo<input type='radio' value='1' class='i-checks' name='activoAsesor" + id + "' checked='checked'></div><div class = 'col-lg-3'>Inactivo<input type='radio' value='0' class='ni-checks' name='activoAsesor" + id + "' ></div></div></br></div>";
            $("#estudiantes3").append(s);
        }
        contador++;

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
        $('.ni-checks').iCheck({
            checkboxClass: 'icheckbox_square-red',
            radioClass: 'iradio_square-red'
        });

    }
}


function validarGuardar(tipo ){
    var name= "";
    var activo ="";
    if(tipo === "estudiante"){
        name = "Estudiante";
        activo = "activo";
    }
    if(tipo === "asesor"){
        name = "Asesor";
        activo="activoAsesor";
    }
    var array=[];
    for (x = 1; x < 7; x++) {
        var aux = $("[name= name"+name+x+"]").val();
 
        if (aux !== undefined) {
            array[x-1]= aux;
        }
        
    
    }
   
   /* if(Array.from(new Set(array)).length !== array.length){
        $("#errorEstudiante").append("<font color='red'><b>Hay estudiantes repetidos.</b></font>");
        return false;
        
    }*/
   
    for (x = 0; x < array.length; x++) {
        var aux = $('input:radio[name='+activo+array[x]+']:checked').val();
        if (aux==="1") {
            return true;
        }
    }
    $("#errorEstudiante").empty();
    $("#errorEstudiante").append("<font color='red'><b>No puede eliminar todos los estudiantes.</b></font>")
    return false;
}

