$.yiimailbox={};
var baseURL="";
$(document).ready(function() {		
	baseURL = $("#urlSitioWeb").val();
	dominio = top.location.hostname;
	AltoModaldentroDeModal();	
	addStringAfterLabel();
	changeImageDependingAccess();
});


function changeImageDependingAccess(){
	$("table.items td.changeImage").each(function(){
		if($(this).html()=='1'){
			$(this).siblings('.button-column').children('a').children('img').attr('src',$("#urlSitioWeb").val()+'/images/view.png')
		}
	});
}

function addStringAfterLabel(){
	$("label.required .required").remove();
	$("input[type='text'],textarea,select,input[type='password']").prev('label').each(function(){
		$(this).html($.trim($(this).html())+": ");
		$(this).addClass('colon');
	});
	//Debemos agregar los dos puntos en caso de encontrarse el label dentro de un TR
	$("input[type='text'],textarea,select,input[type='password']").parent('td').prev('td').children('label').each(function(){
		$(this).html($.trim($(this).html())+": ");
		$(this).addClass('colon');
	});
	$(".blockLabel").not('.colon').each(function(){
		$(this).html($.trim($(this).html())+": ");
		$(this).addClass('colon');
	});
	//Debemos agregar al principio el asterisco de requerido
	
	$("label.required").prepend('<span class="required"> * </span>');
}

function AltoModaldentroDeModal(){
	//Calculando el alto disponible
	if($(window).height()<$("html").height()){
		alto="90%";
	}else{
		alto=$("html").height();
	}
	if(typeof parent.$.fn.colorbox=='function'){		
	    parent.$.fn.colorbox.resize({
	    	innerHeight: alto
	    });  
	}else if (typeof parent.parent.$.fn.colorbox=='function'){
		if(parent.$(window).height()<parent.$("html").height()){
			alto="90%";
		}else{
			alto=parent.$("html").height();
		}
		//parent.$("html").height($(document).height());
		parent.parent.$.fn.colorbox.resize({
	    	innerHeight: alto
	    }); 
	}
}

function cambiarEstadoInputSegunCheckbox(){
	$(".toggleEnabled:checked").each(function(){
		if($(this).val()=='1'){
			$("#"+$(this).attr('nametextarea')).parent().show();
		}else{
			$("#"+$(this).attr('nametextarea')).parent().hide();
		}	
	});	
}

function actualizarSRCIframe(id){
	var url="";
	if(typeof id=='string'){
		url=id;
	}else{
		url=$(id).attr('href');
	}
    $('#iframeModal').html('<iframe  src="'+url+'" height="100%" width="100%" scrolling="no" frameborder="0"></iframe>');
    $('#iframeModal').show('slow');
}


function cerrarPanelIframe(){
	$('#iframeModal').hide('slow');
	actualizarDatosDeListasYGrillasWithIframe();
	AltoModaldentroDeModal();
}

function cerrarModalSinCambios(){
	$('#iframeModal').hide('slow');
	AltoModaldentroDeModal();
}

function cerrarModalWithIframe(){
	$.colorbox.close();
	actualizarDatosDeListasYGrillasWithIframe();
}

function actualizarDatosDeListasYGrillasWithIframe(){
	 $('.grid-view').each(function(){
		 $.fn.yiiGridView.update(''+$(this).attr('id'),{
		        complete: function(jqXHR, status) {
		            if (status=='success'){
		            	if(!$("#mensajeSuccess").html()){
		            	    $(".form h3").eq(0).after('<span id="mensajeSuccess" class="required">Los datos han sido actualizados exitosamente.</span>');
		            	}
		            	$("#mensajeSuccess").fadeOut(6000).delay(1000).queue(function() { $(this).remove(); });
		            }
		        }
		 });
	 });
	 $('.list-view').each(function(){
		 $.fn.yiiListView.update(''+$(this).attr('id'),{
		        complete: function(jqXHR, status) {
		            if (status=='success'){
		            	if(!$("#mensajeSuccess").html()){
		            	    $(".form h3").eq(0).after('<span id="mensajeSuccess" class="required">Los datos han sido actualizados exitosamente.</span>');
		            	}
		            	$("#mensajeSuccess").fadeOut(6000).delay(1000).queue(function() { $(this).remove(); });
		            }
		        }
		 });
	 });
}
function metasParcialesInput(id)
{
	var nombre_frecuenciaControl;
	
	if(id=='Mensual' || id=="Trimestral"){
		nombre_frecuenciaControl = id;
		
	}else{	
		//Obtenemos el texto del selector
		var indice_frecuenciaControl = frecuenciaControl.selectedIndex
		nombre_frecuenciaControl = frecuenciaControl.options[indice_frecuenciaControl].text
	}
	//Creamos un arreglo con los meses del año
	var meses=new Array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre", "noviembre","diciembre");
	
	//Todos los input debe ser hidden y disable
	$(".meses").each(function(i,data){
		$(data).attr("disabled","disabled");
		$(data).get(0).type = 'hidden';
		$(data).attr("size",'1');
		$(data).attr("maxlength",'3');
		$(data).attr("max",'100');
		$(data).attr("value",'');
	});
	

  	//Consultamos si es mensual o trimestral	 
	if (nombre_frecuenciaControl=='Mensual'){
  		$(".meses").each(function(i,data){
			$(data).removeAttr("disabled");
			$(data).get(0).type = 'text';
	
		});
  		
	}else if (nombre_frecuenciaControl=='Trimestral'){

		for (var i = 0; i < meses.length; i++) {
			i=i+2;//para mostrar solo cada 3 meses los input
  			element = meses[i];
  			$('#'+element).removeAttr("disabled");
  			$('#'+element).get(0).type = 'text';
 
		}

		
	}else{
		alert('La frecuencia de control, contiene un parámetro selecionado inadecuado');
	}
}
function sumarMetasParciales(objeto)
{
	 var total = 0;
	$(".meses").each(function(i,data){
		var valor = $(data).get(0).value;
		//solo sumanos los input con valores
		if(valor != ''){
			total += parseInt(valor);
		}
	});
	if(total > 100){
		alert('La sumatoria de metas parciales son superiores al 100%');
			objeto.value="";
			setTimeout(function(){objeto.focus()}, 10);

	}
	
} 

function borrarArchivo(id){
	
	var action = 'http://'+dominio+baseURL + '/cierresInternos/borrar/?id='+id;
	
	var mensajeError = "Archivo No Encontrado!!";
	$.getJSON(action, function(data) {
		
		if(data){
			$('#urlPDF').hide('slow');
			$('#uploadPDF').show('slow');
		}else{
			mensajeParaFormulario(mensajeError);
		}
		
		
	}).error(function(e){ 
		
		//mensajeParaMantenedor(e.responseText);
		//mensajeParaFormulario(e.responseText)
		mensajeParaFormulario(mensajeError);
	});

}
function mostrarUploadPDF(){
	$('#uploadPDF').show('slow');
} 
function mensajeParaFormulario(mensaje){
	if(!$("#mensajeSuccess").html()){
	    $("#content h3").eq(0).after('<span id="mensajeSuccess" class="required">'+mensaje+'</span>');
	}
	$("#mensajeSuccess").fadeOut(6000).delay(1000).queue(function() { $(this).remove(); });
}

/*
 * 
 * 
 FUNCTIONES utilizadas en controlElementosGestion
 */


function validarcontrolLaElemGestion(){
	$(".errorMessage").hide();
	var submit=true;
	$("#versionesRegistro tbody tr").each(function(){
		//Validando input y textarea que no esten vacios.
		$("."+$(this).attr('valueTr')).each(function(){
			if($(this).get(0).tagName!="DIV"){//Debemos validar en caso de que no sea un tag de formulario
				if($(this).val()==""){
					$(this).parent('div').children('.errorMessage:not(.typeFile)').show();
					$(this).addClass('error');
					submit=false;
				}else{
					$(this).removeClass('error');
					//Validando la extensión del archivo en caso de ser de tipo file
					if($(this).attr('type')=='file'){
						if(!$(this).val().match(/.(pdf)$/)){//here your extensions (jpg)|(gif)|(png)|(bmp)|
							$(this).parent('div').children('.errorMessage.typeFile').show();
							$(this).addClass('error');
							submit=false;
					    }
					}
				}
			}
			
		});	
		//Validando el campo de fecha que tenga un formato correcto y que no este vacio.
		$(this).children('td').eq('1').children('input.datepicker').each(function(){
			if($(this).val()!=""){
				if(!validarFecha($(this).val())){
					submit=false;
					$(this).addClass('error');
					$("#mensajeVersionesRegistro").html('Fecha debe ser de tipo fecha(yyyy-mm-dd).').show();
				}else{
					$(this).removeClass('error');
				}
			}else{
				submit=false;			
				$(this).addClass('error');
				$("#mensajeVersionesRegistro").html('Fecha no puede ser nulo.').show();
			}
		});
		if(!submit){
			//Debemos realizar un click en la fecha o TR si se encuentra un error en algun input del formulario.
			cambiarSeleccionFecha($(this),true);
			return false;
		}
	});
	if(submit){
		$("#elementos-gestion-form").submit();
	}
	/*$("#versionesRegistro input.datepicker").each(function(){
		if($(this).val()!=""){
			if(validarFecha($(this).val())){				
				$("."+$(this).parent('td').parent('tr').attr('valueTr')).each(function(){
					if($(this).val()==""){
						$(this).parent('div').children('.errorMessage').show();
						$(this).addClass('error');
						submit=false;
					}
				});
			}else{		
				submit=false;
				$(this).addClass('error');
				$("#mensajeVersionesRegistro").html('Fecha debe ser de tipo fecha(yyyy-mm-dd).').show();
				//$("#mensajeVersionesRegistro").delay(6000).queue(function() { $(this).hide(); });
			}
		}else{
			submit=false;			
			$(this).addClass('error');
			$("#mensajeVersionesRegistro").html('Fecha no puede ser nulo.').show();
		}		
		if(!submit){			
			cambiarSeleccionFecha($(this).parent('td').parent('tr'),true);
			return false;
		}
		
	});*/
	
	if(submit){
		$("#elementos-gestion-form").submit();
	}
}
function eliminarVersion(idLink){
	var ClassCss=$(idLink).parent('td').parent('tr').attr('valueTr');
	$("."+ClassCss).remove();
	$(idLink).parent('td').parent('tr').remove();
	$("#versionesRegistro tbody tr").each(function(){
			var indexPosicion=$(this).index()+1; 
			$(this).children('td').eq(0).html('V'+indexPosicion);
	});
	$(".errorMessage").hide();
	$(".error").removeClass('error');
}

function agregarNuevaVersionRegistro(){
	var ultimoRegistro=$("#versionesRegistro tbody tr").length +1;
	var classCss=(ultimoRegistro%2)?"even":"odd";
	var htmlTemplate="<tr valueTr='laElemGestions_x"+ultimoRegistro+"' class='"+classCss+" newRow'><td>V"+ultimoRegistro+"</td><td><input type='text' name='laElemGestions[x"+ultimoRegistro+"][fecha]' class='datepicker' style='height: 15px; width: 85px;'/><a href='#' onclick='eliminarVersion(this);return false;'><img src='"+$("#urlSitioWeb").val()+"/images/delete.png' /></a></td></tr>";
	$("#versionesRegistro tbody").append(htmlTemplate);
	$(".datepicker").datepicker({'dateFormat':'yy-mm-dd','monthNames':['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],'monthNamesShort':['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],'dayNames':['Domingo,Lunes,Martes,Miercoles,Jueves,Viernes,Sabado'],'dayNamesMin':['Do','Lu','Ma','Mi','Ju','Vi','Sa']});
	
	/*Agregando formularios select y textarea en el formulario*/
	
	$("#laElemGestions_evidencia").append('<textarea class="laElemGestions_x'+ultimoRegistro+'" id="laElemGestions_x'+ultimoRegistro+'_evidencia" name="laElemGestions[x'+ultimoRegistro+'][evidencia]" rows="3" style="width: 390px;display:none;height: 69px;"></textarea>');
	$("#laElemGestions_puntaje_real").append("<select onchange='activarColorTdlaElemGestions()' class='laElemGestions_x"+ultimoRegistro+"' style='display:none;' name='laElemGestions[x"+ultimoRegistro+"][puntaje_real]' id='laElemGestions_x"+ultimoRegistro+"_puntaje_real'><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select>");
	$("#laElemGestions_archivo").append('<input type="file" id="laElemGestions_x'+ultimoRegistro+'_archivo" class="laElemGestions_x'+ultimoRegistro+'" style="display:none;" name="laElemGestions[x'+ultimoRegistro+'][archivo]"/>');
	$('#versionesRegistro tbody tr').unbind('click');
	$('#versionesRegistro tbody tr').bind('click', function() {
        cambiarSeleccionFecha(this);
    });
}

function cambiarSeleccionFecha(id,fromFunction){
	$("#versionesRegistro tbody tr").removeClass('selected');
	$(id).addClass('selected');
	$("#laElemGestions_evidencia textarea").hide();
	$("#laElemGestions_puntaje_real select").hide();
	$("#laElemGestions_archivo input").hide();
	$("#laElemGestions_archivo .file").hide();
	$("."+$(id).attr('valueTr')).show();		
	if(!fromFunction){
		//Ocultando mensajes y eliminando clase de error, en caso de que esten visibles
		$(".errorMessage").hide();
		$(".error").removeClass('error');
	}	
	activarColorTdlaElemGestions();	
}

function activarColorTdlaElemGestions(){
	$("#despliegue"+$("#laElemGestions_puntaje_real select:visible").val()).siblings().removeClass('selected');
	$("#despliegue"+$("#laElemGestions_puntaje_real select:visible").val()).addClass('selected');
}


/* FIN FUNCTIONES utilizadas en controlElementosGestion */


function validarFecha(value){
	var check = false;
    var re = /^\d{4}\-\d{1,2}\-\d{1,2}$/;
    if(re.test(value)){
        var adata = value.split('-');
        var mm = parseInt(adata[1],10); // was dd (day)
        var dd = parseInt(adata[2],10); // was mm (month)
        var yyyy = parseInt(adata[0],10); // was aaaa (year)
        var xdata = new Date(yyyy,mm-1,dd);
        if (( xdata.getFullYear() == yyyy ) && ( xdata.getMonth () == mm - 1 ) && ( xdata.getDate() == dd ) )
            check = true;
        else
            check = false;
    } else
        check = false;
    
    return check;
}

/*Funciones Utilizadas en registro de avances
  ******************************************/
function calcularFormulaRegistroAvances()
{
	
	var formula =$("#formula b").html();
	
	
	var valorA = $("#valorA:visible").val();
	var valorB = $("#valorB:visible").val();
	var valorC = $("#valorC:visible").val();
	
	$("#resultadoCalculoFormula").html(" ");
	var faltanParametros=false;
	
	if(formula.indexOf('A') != -1 ){
	      if (/^[0-9]+$/.test(valorA)){ 
		      formula= formula.replace (/A/,valorA)	
		  }else{
		      faltanParametros =true;
		  }
	}else{
		$("#conceptoa").css("display", "none");
	}
	if(formula.indexOf('B') != -1 ){
	     if (/^[0-9]+$/.test(valorB)){ 
		      formula= formula.replace (/B/,valorB)	
		     
		  }else{
		      faltanParametros =true;
		  }
	}else{
		$("#conceptob").css("display", "none");
	}
	if(formula.indexOf('C') != -1 ){
	      if (/^[0-9]+$/.test(valorC)){ 
		      formula= formula.replace (/C/,valorC)	
		  }else{
		      faltanParametros =true;
		  }
	}else{
		$("#conceptoc").css("display", "none");
	}
	
	
	$("#inputResultadoCalculoFormula").val('');
	if (faltanParametros != true){
    	with(Math) x=eval(formula);
    	
        if (x!="Infinity"){
        if (x=="NaN" ) {
            formula="Expresión con problemas";
        }
        else {
        	formula=x;
        	//Pegando el resultado
	         $("#inputResultadoCalculoFormula").val(formula.toFixed(2)+'%');
        }
        }else{
        	formula="Expresión con problemas";
        	$("#resultadoCalculoFormula").html(formula);
        }
        
    }else{
        formula="Expresión con problemas";
        //Pegando el resultado
	    $("#resultadoCalculoFormula").html(formula);
    }


}


function borrarArchivoRegistroAvance(id,campo,objeto){
	mensajeParaFormulario('Solicitando...');
	var action = 'http://'+dominio+baseURL + '/panelAvances/borrar/?id='+id+'&campo='+campo;
	
	var mensajeError = "Archivo No Encontrado!!";
	$.getJSON(action, function(data) {
		
		if(data){
			$('#'+objeto+'Link').hide('slow');
			$('#'+objeto+'Borrar').hide('slow');
			$('#'+objeto).removeAttr("disabled");
			$('#'+objeto).show('slow');
		}else{
			mensajeParaFormulario(mensajeError);
		}
		
		
	}).error(function(e){ 
		
		//mensajeParaMantenedor(e.responseText);
		//mensajeParaFormulario(e.responseText)
		mensajeParaFormulario(mensajeError);
	});

}


/*FIN-Funciones Utilizadas en registro de avances
  ******************************************/

function observacionTextArea(id){

	//var pEspeId = id; 
	
	var action = baseURL + '/reporteAvanceIndicadores/obtenerObservacion/'+id;

	$.getJSON(action, function(listaJson) {

				$.each(listaJson, function(key, obs) {

					$('#IndicadoresObservaciones_observacion').val(obs.observacion);
				});
		
		
		});
	$('#btn').attr('onclick','mostrarComentarios(2,'+id+')');
	

}

function mostrarComentarios(bandera, id, b)
{

	var obs = $('#IndicadoresObservaciones_observacion').val();
	var indi =$('#IndicadoresObservaciones_id_indicador').val();
	var user = $('#IndicadoresObservaciones_id_usuario').val();
//	var b=0;
	//guarda
	if(bandera  == 1){
		
			$.fn.yiiGridView.update('coment-grid', {
	              data: '&IndicadoresObservaciones[id_indicador]='+parseInt(indi)+'&IndicadoresObservaciones[id_usuario]='
	              +parseInt(user)+'&IndicadoresObservaciones[observacion]='+obs+'&IndicadoresObservaciones[bandera]='+b+'&IndicadoresObservaciones[bandera2]=0'});
	
			$('#IndicadoresObservaciones_observacion').val('');
	
	
	}
	//actualiza
	else{
		
	
		$.fn.yiiGridView.update('coment-grid',  {
            data: '&IndicadoresObservaciones[id]='+id+'&IndicadoresObservaciones[id_indicador]='+parseInt(indi)+'&IndicadoresObservaciones[id_usuario]='
            +parseInt(user)+'&IndicadoresObservaciones[observacion]='+obs+'&IndicadoresObservaciones[bandera]='+b+'&IndicadoresObservaciones[bandera2]=1'});
		$('#IndicadoresObservaciones_observacion').val('');
		$('#btn').attr('onclick','mostrarComentarios(1,0)');
		
	}
	b=1;
		$("#coment-grid tbody").remove();
		$("#coment-grid.pager").remove();
	//	$('#grillaDatos').show('slow');
			 	
		return;
	
}
			///////////////////////////////////////////////////////////
			
			//Funciones Asignadas APL
			
			///////////////////////////////////////////////////////////
	function obtenerNombreEncargado(rut,visualizar){
	
		var action = baseURL + '/alumnos/obtenerNombreEncargado/'+rut;
		
		// se pide al action la lista de productos de la categoria seleccionada
		$.getJSON(action, function(data) {
			// limpiar 
			$('#'+visualizar).html("");
		
			
			if(data!="null"){
				
				$('#'+visualizar).html(data);
			
			}else{
			
				$('#'+visualizar).html("No se encuentran Datos para esté RUT");
			}		
		}).error(function(e){ 
				
			});
		
		return false;
	
	}
	function obtenerNombreAlumno(rut,visualizar){
	
		var action = baseURL + '/alumnos/obtenerNombreAlumno/'+rut;
		
		// se pide al action la lista de productos de la categoria seleccionada
		$.getJSON(action, function(data) {
			// limpiar 
			$('#'+visualizar).html("");
		
			
			if(data!="null"){
				
				$('#'+visualizar).html(data);
			
			}else{
			
				$('#'+visualizar).html("No se encuentran Datos para esté RUT");
			}		
		}).error(function(e){ 
				
			});
		
		return false;
	
	}
	
	function validarNumeros(event) {
		if ( event.keyCode == 46 || event.keyCode == 8 ) {
			// let it happen, don't do anything
		}
		else {
			// Ensure that it is a number and stop the keypress
			if (event.keyCode < 48 || event.keyCode > 57 ) {
				event.preventDefault();	
			}	
		}
	}
	function validarRutEnter(event,rut,visualizar)
	{
		if (event.keyCode == 13){
				obtenerNombreEncargado(rut,visualizar);
				return false;
		}
		return false;
	}
	
	function validarRutNombreAlumnoEnter(event,rut,visualizar)
	{
		if (event.keyCode == 13){
				obtenerNombreAlumno(rut,visualizar);
				return false;
		}
		return false;
	}
	
	function bucarCompromiso(event,rut,visualizar)
	{
		if (event.keyCode == 13){
				obtenerMatriculaAlumno(rut,visualizar);
				return false;
		}
		return false;
	}
	
	function obtenerMatriculaAlumno(rut,visualizar)
	{
	
		var action = baseURL + '/procesosPeriodos/obtenerMatriculaAlumno/'+rut;
		
		// se pide al action la lista de productos de la categoria seleccionada
		$.getJSON(action, function(data) {
			// limpiar 
			$('#'+visualizar).html("");
			
			
			
			if(data.nombre!=""){
				
				$('#'+visualizar).html(data.nombre);
				$('#Compromisos_proceso_periodo_id').val(data.matricula);
			}else{
			
				$('#'+visualizar).html("El rut no contiene matricula para esté periodo.");
			}		
		}).error(function(e){ 
				
			});
		
		return false;
		
	}
	
 function asignarMontoTotal(){
	var calcular;
	var valor =$("#Compromisos_monto_sin_interes").val()
	var interes = $('#Compromisos_tasa_interes_id option:selected').attr('tasa');
	var cuotas = $("input[name='Compromisos[numero_cuotas]']:checked").val(); 
	
	
	if (interes==0){
		$('#montoTotal').html('$'+ parseInt(valor)+ '.-');
		$("#Compromisos_monto_total").val(valor);
		$("#cuotaMensual").html('$'+ parseInt(valor / cuotas) +'.-');
		
		
	}else{
		if (valor){
			calcular = eval(((valor*interes)/100))+ eval(valor);
			$('#montoTotal').html('$'+ parseInt(calcular)+ '.-');
			$("#Compromisos_monto_total").val(parseInt(calcular));
			$("#cuotaMensual").html('$'+ parseInt(calcular / cuotas)+'.-');
		}
	}
		
	
}
	
 function calcularMontoTotal(){
 	
 	var interes = $('#Compromisos_tasa_interes_id option:selected').attr('tasa');
 
 	$('#interes').html(interes);
 	
 	asignarMontoTotal();
 
 }	


