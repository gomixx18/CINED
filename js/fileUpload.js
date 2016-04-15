function _(el){
	return document.getElementById(el);
}
function uploadFile(){
    
       document.getElementById("divProgress").removeAttribute('hidden');

	var file = _("archivo").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("archivo", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "funcionalidad/parser_File.php");
	ajax.send(formdata);
        

}
function progressHandler(event){
    
        $("#guardarArchivo1").addClass('disabled');
        $("#guardarArchivo1").attr('disabled','true');
	_("loaded_n_total").innerHTML = "<b>¡Subido Correctamente! </b> "+event.loaded+" bytes de "+event.total+" bytes";
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").style.width = Math.round(percent)+"%"; 
        
        if(parseInt(_("progressBar").style.width) < 40){
            $("#progressBar").removeClass("progress-bar-success").addClass("progress-bar-danger");
        }
        if(parseInt(_("progressBar").style.width) > 40){
            $("#progressBar").removeClass("progress-bar-danger").addClass("progress-bar-warning");
        }
        if(parseInt(_("progressBar").style.width) > 70){
            $("#progressBar").removeClass("progress-bar-warning").addClass("progress-bar-success");
        }
        if(parseInt(_("progressBar").style.width) === 100){
            $("#progressBar").removeClass("progress-bar-success").addClass("progress-bar-default");
        }
	_("status").innerHTML = Math.round(percent)+"% Subido... por favor espere";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	$("#guardarArchivo1").removeClass('disabled');
        $("#guardarArchivo1").removeAttr('disabled')
}
function errorHandler(event){
	_("status").innerHTML = "Subida Fallida";
}
function abortHandler(event){
	_("status").innerHTML = "Subida Abortada";
}


function uploadFile2(){
    
       document.getElementById("divProgress2").removeAttribute('hidden');
    

	var file = _("archivo2").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("archivo2", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler2, false);
	ajax.addEventListener("load", completeHandler2, false);
	ajax.addEventListener("error", errorHandler2, false);
	ajax.addEventListener("abort", abortHandler2, false);
	ajax.open("POST", "funcionalidad/parser_File.php");
	ajax.send(formdata);
        

}
function progressHandler2(event){
        
        $("#guardarArchivo2").addClass('disabled');
        $("#guardarArchivo2").attr('disabled','true');
	_("loaded_n_total2").innerHTML = "<b>¡Subido Correctamente! </b> "+event.loaded+" bytes de "+event.total+" bytes";
	var percent = (event.loaded / event.total) * 100;
	_("progressBar2").style.width = Math.round(percent)+"%"; 
        
        if(parseInt(_("progressBar2").style.width) < 40){
            $("#progressBar2").removeClass("progress-bar-success").addClass("progress-bar-danger");
        }
        if(parseInt(_("progressBar2").style.width) > 40){
            $("#progressBar2").removeClass("progress-bar-danger").addClass("progress-bar-warning");
        }
        if(parseInt(_("progressBar2").style.width) > 70){
            $("#progressBar2").removeClass("progress-bar-warning").addClass("progress-bar-success");
        }
        if(parseInt(_("progressBar2").style.width) === 100){
            $("#progressBar2").removeClass("progress-bar-success").addClass("progress-bar-default");
        }
	_("status2").innerHTML = Math.round(percent)+"% Subido... por favor espere";
}
function completeHandler2(event){
	_("status2").innerHTML = event.target.responseText;
	$("#guardarArchivo2").removeClass('disabled');
        $("#guardarArchivo2").removeAttr('disabled');
}
function errorHandler2(event){
	_("status2").innerHTML = "Subida Fallida";
}
function abortHandler2(event){
	_("status2").innerHTML = "Subida Abortada";
}

function uploadFile3(){
    
       document.getElementById("divProgress3").removeAttribute('hidden');

	var file = _("archivo3").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("archivo", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler3, false);
	ajax.addEventListener("load", completeHandler3, false);
	ajax.addEventListener("error", errorHandler3, false);
	ajax.addEventListener("abort", abortHandler3, false);
	ajax.open("POST", "funcionalidad/parser_File.php");
	ajax.send(formdata);
        

}
function progressHandler3(event){
    
        $("#guardarArchivo3").addClass('disabled');
        $("#guardarArchivo3").attr('disabled','true');
	_("loaded_n_total3").innerHTML = "<b>¡Subido Correctamente! </b> "+event.loaded+" bytes de "+event.total+" bytes";
	var percent = (event.loaded / event.total) * 100;
	_("progressBar3").style.width = Math.round(percent)+"%"; 
        
        if(parseInt(_("progressBar3").style.width) < 40){
            $("#progressBar3").removeClass("progress-bar-success").addClass("progress-bar-danger");
        }
        if(parseInt(_("progressBar3").style.width) > 40){
            $("#progressBar3").removeClass("progress-bar-danger").addClass("progress-bar-warning");
        }
        if(parseInt(_("progressBar3").style.width) > 70){
            $("#progressBar3").removeClass("progress-bar-warning").addClass("progress-bar-success");
        }
        if(parseInt(_("progressBar3").style.width) === 100){
            $("#progressBar3").removeClass("progress-bar-success").addClass("progress-bar-default");
        }
	_("status3").innerHTML = Math.round(percent)+"% Subido... por favor espere";
}
function completeHandler3(event){
	_("status3").innerHTML = event.target.responseText;
	$("#guardarArchivo3").removeClass('disabled');
        $("#guardarArchivo3").removeAttr('disabled')
}
function errorHandler3(event){
	_("status3").innerHTML = "Subida Fallida";
}
function abortHandler3(event){
	_("status3").innerHTML = "Subida Abortada";
}

