//EL ARCHIVO SE ENCUENTRA INICIALIZADO DESDE EL ARCHIVO main.PHP 
//El archivo "mantenedores.js" fue creado pensando en las necesidades de los mantenedores del sitio y 
	//NO necesariamente es el archivo principal de la aplicación 
	//por contener funciones que sólo son usadas en los mantenedores
$.yiimailbox={};
var baseURL ="";
$(document).ready(function() {
	baseURL = $("#urlSitioWeb").val();
	asignacionModals();
	changeImageDependingAccess();
	validarAnchoTabla();
	$('.search-form').hide();
});


//var baseURL = '/gore';
function changeImageDependingAccess(){
	$("table.items td.changeImage").each(function(){
		if($(this).html()=='1'){
			$(this).siblings('.button-column').children('a').children('img').attr('src',$("#urlSitioWeb").val()+'/images/view.png')
		}
	});
}


/*function successDeleteRow(){
	mensajeParaMantenedor('El registro se elimino correctamente.');
	asignacionModals();
}*/

//Validando que el ancho de la tabla no supere los valores asignados como máximo. Esto puede pasar al colocar un link demasiado largo
//Validando que el ancho de la tabla no supere los valores asignados como máximo. Esto puede pasar al colocar un link demasiado largo
function validarAnchoTabla(){
	//En caso de utilizar mas de una grilla en la misma página
	$('.grid-view').each(function(){
		if($(this).children('table').width() > $(this).width()){
			$(this).children('table').children('tbody').children('tr').each(function(){				
				$(this).children('td').each(function(){					
					var words=$(this).text().split(' ');
					for (var i = 0; i < words.length; i++){
						if(words[i].length >40){	
							//Debemos validar que sea solo texto antes de realizar un replace
							if($(this).find('input, textarea, select').length==0)
								 $(this).html($(this).html().replace(words[i],words[i].substring(0, 40)+'...'));					
						}
			        }
				});
			});
		}
	});	
}

function afterAjaxUpdateSuccess(){
	//mensajeParaMantenedor('La solicitud se ha procesado con exito.');
	validarAnchoTabla();
	asignacionModals();
}

function asignacionModals(){
	$(".update,.button-column .view,.btn-small.view").colorbox({current:'',previous:'',next:'',overlayClose:false,iframe:true,fastIframe:false, width:"990", height:"90%", title:true,
		onLoad:function(){
			$("#cboxPrevious,#cboxCurrent,#cboxNext").hide();
		},
		onOpen:function(){
			$("#cboxPrevious,#cboxCurrent,#cboxNext").hide();
		},
		onComplete: function(){
			$("#cboxPrevious,#cboxCurrent,#cboxNext").hide();
			var x= $('.cboxIframe')[0].contentWindow.document.body;
			var title = $(x).find('.form').eq(0).find('h3').eq(0).html();
			if($(x).find('.form').eq(0).find('h3').eq(0).attr('rel')){
				title=$(x).find('.form').eq(0).find('h3').eq(0).attr('rel');
			}    
            $('#cboxTitle').text(title);
        }
	});
	
	$(".modalIndice").colorbox({rel:false,overlayClose:false,iframe:true,fastIframe:false, width:"990", height:"90%", title:true,
		onComplete: function(){
			$("#cboxPrevious,#cboxCurrent,#cboxNext").hide();
			var x= $('.cboxIframe')[0].contentWindow.document.body;
			var title = $(x).find('.form').eq(0).find('h3').eq(0).html();
			if(!$(x).find('.form').eq(0).find('h3').eq(0).attr('rel')){
				title=$(x).find('.form').eq(0).find('h3').eq(0).attr('rel');
			} 
			$('#cboxTitle').text(title);
        }
	});
	
	$(".MenuOperations").not('.NoModal').find('li a').colorbox({rel:false,overlayClose:false,iframe:true,fastIframe:false, width:"990",height:"90%",  
		onComplete: function(){
			$("#cboxPrevious,#cboxCurrent,#cboxNext").hide();
			var x= $('.cboxIframe')[0].contentWindow.document.body;
			var title = $(x).find('.form').eq(0).find('h3').eq(0).html();
			if(!$(x).find('.form').eq(0).find('h3').eq(0).attr('rel')){
				title=$(x).find('.form').eq(0).find('h3').eq(0).attr('rel');
			} 
			$('#cboxTitle').text(title);
        }
	});
}

/*function cambiarTituloModal(){
	$.colorbox({rel: 'gal', title:true});
}*/

//Al momento de actualizar un dato al interior de un formulario con un grilla, esta pantalla no se cierre automatica, 
//se debe cerrar con el boton cerrar respectivo del modal, en este caso debemos actualizar la grilla principal cuando 
//se cierre la página que se actualizo. Un ejemplo se encuentra en el formulario de edición de Actividades.
function actualizarCierreModal(){
	$(document).bind('cbox_closed', function(){
	       $(document).unbind('cbox_closed');
	       actualizarDatosDeListasYGrillas();       
	});
}

function cerrarModal(){
	$.colorbox.close();
	actualizarDatosDeListasYGrillas();
}

function actualizarDatosDeListasYGrillas(){
	 $('.grid-view').each(function(){
		 $.fn.yiiGridView.update(''+$(this).attr('id'),{
		        complete: function(jqXHR, status) {
		            if (status=='success'){
		            	mensajeParaMantenedor('Los datos han sido actualizados exitosamente.');
		            }
		        }
		 });
	 });
	 $('.list-view').each(function(){
		 $.fn.yiiListView.update(''+$(this).attr('id'),{
		        complete: function(jqXHR, status) {
		            if (status=='success'){
		            	mensajeParaMantenedor('Los datos han sido actualizados exitosamente.');
		            }
		        }
		 });
	 });
}

function mostrarElementosDeGestion(id){
	
	var action = baseURL + '/elementosGestionPriorizados/obtenerElementosDeGestion/'+id;
	
	// se pide al action la lista de productos de la categoria seleccionada
	$.getJSON(action, function(listaJson) {
		
		// el action devuelve los productos en su forma JSON, el iterador "$.each" los separará.
		// limpiar el combo
		$('#elementoGestion').find('option').each(function(){ $(this).remove(); });
		$('#elementoGestion').append("<option value='0'>Seleccione Elemento de Gestion</option>");
		
		if(listaJson!=''){
			$.each(listaJson, function(key, scriterio) {
	
				$('#elementoGestion').append("<option value='"+scriterio.id+"'>"
				+scriterio.nombre+"</option>");
			});
		}else{
			mensajeParaMantenedor("No se encuentran Elementos de Gestión");
		}		
	}).error(function(e){ 
			mensajeParaMantenedor(e.responseText);
		});

	
}

function agregarElementodeGestion(periodoActual, idElementoGestion){
	
	
	
	
	if(!periodoActual)
	{
		mensajeParaMantenedor("Periodo actual no está definido, No es realizar la operación.");
		return false;
	}else if(idElementoGestion == 0){
		
		mensajeParaMantenedor("Selector de elemento de gestión, Se encuentra vacio");
		return false;
	}else{

		var action = baseURL + '/elementosGestionPriorizados/create/'+idElementoGestion;
		$.getJSON(action, function(listaJson) {
		if(listaJson ==true){
			
			mensajeParaMantenedor("Registros Guardados!!!");
			$.fn.yiiGridView.update("elementos-gestion-priorizados-grid");
		}else{
			mensajeParaMantenedor("Existen un elemento de gestión asociado a los datos ingresados");
		}		
		}).error(function(e){ 
			mensajeParaMantenedor(e.responseText);
		});
		
		
	}
	
	
}

function mensajeParaMantenedor(mensaje){
	if(!$("#mensajeSuccess").html()){
	    $("#content h3").eq(0).after('<span id="mensajeSuccess" class="required">'+mensaje+'</span>');
	}
	$("#mensajeSuccess").fadeOut(6000).delay(1000).queue(function() { $(this).remove(); });


}

function mostrarProductosEstrategicos(id)
{
	
	var idcategoria = id; // el "value" de ese <option> seleccionado

	// limpiar el combo productoEspecifico
	$('#productoEspecifico').find('option').each(function(){ $(this).remove(); });
	$('#productoEspecifico').append("<option value='0'>Productos Específicos</option>");
	$('#grillaDatos').hide('slow');
	
	var action = baseURL + '/indicadores/obtenerProductos/'+idcategoria;
	
	// se pide al action la lista de productos de la categoria seleccionada
	$.getJSON(action, function(listaJson) {
		//
		// el action devuelve los productos en su forma JSON, el iterador "$.each" los separará.
		//
		// limpiar el combo productoEstrategico
		$('#productoEstrategico').find('option').each(function(){ $(this).remove(); });
		$('#productoEstrategico').append("<option value='0'>Producto Estratégico</option>");
		$.each(listaJson, function(key, producto) {

			$('#productoEstrategico').append("<option value='"+producto.id+"'>"
			+producto.nombre+"</option>");
		});
		
	}).error(function(e){ 
		mensajeParaMantenedor(e.responseText);
		});

}
function mostrarSubProductos(id)
{
		// limpiar el combo productoEspecifico
		$('#productoEspecifico').find('option').each(function(){ $(this).remove(); });
		$('#productoEspecifico').append("<option value='0'>Productos Específicos</option>");
		$('#grillaDatos').hide('slow');
	
	var action = baseURL + '/indicadores/obtenerSubProductos/'+id;
	

	$.getJSON(action, function(listaJson) {
		
		
		// limpiar el combo de  subproductos
		$('#subProducto').find('option').each(function(){ $(this).remove(); });
		$('#subProducto').append("<option value='0'>SubProducto</option>");
		
		//Preguntamos si la lista contiene datos
		if(listaJson!=''){
			$.each(listaJson, function(key, producto) {
				$('#subProducto').append("<option value='"+producto.id+"'>"
				+producto.nombre+"</option>");
			});
			

		}else{
			mensajeParaMantenedor("No se encuentran registros para SubProducto");
		}
	}).error(function(e){ 
		mensajeParaMantenedor(e.responseText);
		});
	
}
function mostrarProductosEspecificos(id)
{	
	var action = baseURL + '/indicadores/obtenerProductosEspecificos/'+id;

	$.getJSON(action, function(listaJson) {
		
		// limpiar el combo de  subproductos
		$('#productoEspecifico').find('option').each(function(){ $(this).remove(); });
		$('#productoEspecifico').append("<option value='0'>Productos Específicos</option>");
		
		//Preguntamos si la lista contiene datos
		if(listaJson!=''){
			$.each(listaJson, function(key, producto) {
				$('#productoEspecifico').append("<option value='"+producto.id+"'>"
				+producto.nombre+"</option>");
			});
			
		}else{
			mensajeParaMantenedor("No se encuentran registros para Productos Específicos");
		}
	}).error(function(e){ 
		mensajeParaMantenedor(e.responseText);
		});	
}
/**************************************
 * mostrarIndicadores
 * 
 * **********************************/
function mostrarIndicadores(id)
{
	if(id != 0) {

		//Actualizar Grilla con el filtro del producto especifico
		$.fn.yiiGridView.update('indicadores-grid', {
              data: '&Indicadores[producto_especifico_id]='+id });
              
		//eliminar los datos
		$("#indicadores-grid tbody").remove();
		$("#indicadores-grid .pager").remove();
		
		//Mostramos la grilla y el boton guardar
		$('#grillaDatos').show('slow');
	 	
		return;
	}else{
		$('#grillaDatos').hide('slow');
	}
	
}
function abrirModal(url){
	var direccion = baseURL+url;
	 $.fn.colorbox({width:"80%", height:"80%", iframe:true, href:direccion});
}
function createIndicador(agregar){
	
	
	if(agregar == 0 ){

		mensajeParaMantenedor("Selector Productos Especificos Se Encuentra Vacio.");
	
	}else{
			
		var indice_productoEstrategico = productoEstrategico.selectedIndex
		var indice_subProducto = subProducto.selectedIndex
	
		var nombre_productoEstrategico = productoEstrategico.options[indice_productoEstrategico].text
		var nombre_subProducto = productoEstrategico.options[indice_subProducto].text
		
		var url = '/indicadores/create/'+productoEspecifico.value;
		abrirModal(url);
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
//Si existe problemas al eliminar registros... el sistema mostrará la información por medio del siguiente DIV
function mostrarMensajes(data){
	
	$("#statusMsg").show("slow").html(data);

}

function mostrarSubcriterios2(id)
{		
	if(id != 0) {
		$("#yw0 li").eq(0).children('a').attr('href',$("#urlSitioWeb").val()+'/subcriterios/create?idCriterio='+id);
		$("#subcriterios-grid tbody").remove();
		$("#subcriterios-grid thead").remove();
		$("#subcriterios-grid .pager").remove();
		$("#subcriterios-grid .summary").html('');
		$('#yw0').show();
		//Actualizar Grilla con el filtro de Criterio
		$.fn.yiiGridView.update('subcriterios-grid', {
              data: '&Subcriterios[id_criterio]='+id,  });
		//Mostramos la grilla y el boton guardar
		$('#botonGuardar').show();
		$('#grillaDatos').show();
	 	
		return;
	}else{
		$('#yw0').hide();
		$('#botonGuardar').hide('slow');
		$('#grillaDatos').hide('slow');
	}
	
}

function mostrarElementosdeGestion2(idc, id)
{	
	if(id != 0) {
		$("#yw0 li").eq(0).children('a').attr('href',$("#urlSitioWeb").val()+'/elementosGestion/create?idSubcriterio='+id+'&idCriterio='+idc);
		$("#elementos-gestion-grid tbody").remove();
		$("#elementos-gestion-grid thead").remove();
		$("#elementos-gestion-grid .pager").remove();
		$("#elementos-gestion-grid .summary").html('');
		$('#yw0').show();
		//Actualizar Grilla con el filtro de Criterio
		$.fn.yiiGridView.update('elementos-gestion-grid', {
              data: '&ElementosGestion[id_subcriterio]='+id,  });

		//Mostramos la grilla y el boton guardar
		$('#botonGuardar').show();
		$('#grillaDatos').show();
	 	
		return;
	}else{
		$('#yw0').hide();
		$('#botonGuardar').hide('slow');
		$('#grillaDatos').hide('slow');
	}
	
}

function funcionalidadNoHabilitada(){
	jAlert("Funcionalidad aún no disponible","Mensaje"); 
}

function mostrarSubCriterios(id){
 	var action = baseURL + '/elementosGestionPriorizados/obtenerSubCriterios/'+id;
	
	// se pide al action la lista de productos de la categoria seleccionada
	$.getJSON(action, function(listaJson) {
		
		// el action devuelve los productos en su forma JSON, el iterador "$.each" los separará.
		// limpiar el combo
		$('#subcriterio').find('option').each(function(){ $(this).remove(); });
		$('#subcriterio').append("<option value='0'>Seleccione SubCriterio</option>");
		
		if(listaJson!=''){
			$.each(listaJson, function(key, scriterio) {
	
				$('#subcriterio').append("<option value='"+scriterio.id+"'>"
				+scriterio.nombre+"</option>");
			});
		}else{
			mensajeParaMantenedor("No se encuentran SubCriterios");
		}		
		//$('#siguiente').show('slow');
	}).error(function(e){ 
			mensajeParaMantenedor(e.responseText);
		});
}	

//Al momento de almacenar un indicador desde una vista que lo ocupa como 
//iframe(lineas de accion) debemos cerrar el modal y actualizar su contenido
function indicadorAlmacenadoDesdeLineasDeAccion(id){
	$.colorbox.close();
	$("#agregarIndicador").attr('href',baseURL+'/indicadores/updatenew/'+id+'/?referer=lineasdeaccion');
	$("#agregarIndicador span").html('Editar Indicador');
	$("#informacionCumplimiento").before('<div id="loadingCumplimiento"><img src="'+baseURL+'/images/loading.gif"/></div>');
	$("#informacionCumplimiento").hide();
	$("#LineasAccion_id_indicador").val(id);
	$.ajax({
		  url: baseURL+'/indicadores/obtenerIndicador/'+id,
		  success: function(data) {
			  $("#loadingCumplimiento").remove();
			  $.each(data, function(i, item) {
				  $('#LineasAccion_idIndicador_descripcion').val(item.descripcion);
				  $('#LineasAccion_idIndicador_medio_verificacion').val(item.medio_verificacion);
				  $('#LineasAccion_idIndicador_meta_anual').val(item.meta_anual);
				  $('#LineasAccion_idIndicador_frecuencia_control_id').val(item.nombre);
			  });
			 
			  $("#informacionCumplimiento").show('slow');
		  }
	});
		
}


function agregarElementoGestionAsociadoLA(thisCheck,id,nelemento_gestion){
	var isChecked=$(thisCheck).is(':checked');
	var nombre=$(thisCheck).parent('td').parent('tr').children('td').eq(0).html();
	if(isChecked){
		//Ocultando mensaje "No se encontraron resultados"
		parent.$("#la-elem-gestion-grid tbody td.empty").parent('tr').hide();
		
		var idExiste=false;
		parent.$("#la-elem-gestion-grid tbody td.id_elem_gestion input").each(function(){
			if(parseInt($(this).val())==parseInt(id)){
				idExiste=true;
				if($(this).parent('td').parent('tr').hasClass('deleteRecord')){
					$(this).parent('td').parent('tr').children('td').eq(0).children('input').remove();
					$(this).parent('td').parent('tr').removeClass('deleteRecord');
				}
			}
		});
		if(!idExiste){
			var TrActual=parent.$("#la-elem-gestion-grid tbody tr").length+1;
			if(parent.$("#la-elem-gestion-grid tbody tr").hasClass('newRecord')){
				TrActual=parseInt(parent.$("#la-elem-gestion-grid tbody tr").attr('valueActualTr'))+1;
			}
			var classCSS="odd";
			if(TrActual%2) classCSS="even";
			var htmlTemp='<tr id="la-elem-gestion-grid_'+id+'" class="newRecord '+classCSS+'" valueActualTr="'+TrActual+'"><td width="90">'+nelemento_gestion+'</td>';
					htmlTemp+='<td>'+nombre+'</td>';
					htmlTemp+='<td width="90"></td>';
					htmlTemp+='<td width="90"><input type="text" id="LaElemGestion_'+TrActual+'_puntaje_esperado_" name="LaElemGestion['+TrActual+'][puntaje_esperado][]" value="" style="width:40px;"></td>';
					htmlTemp+='<td style="width:0%; display:none" class="id_elem_gestion"><input type="hidden" id="LaElemGestion_'+TrActual+'_id_elem_gestion" name="LaElemGestion['+TrActual+'][id_elem_gestion]" value="'+id+'"></td>';
					htmlTemp+='<td width="90">&nbsp;</td>';
					//htmlTemp+='<td class="button-column"><a href="#" title="" class="update cboxElement"><img alt="" src="'+$("#urlSitioWeb").val()+'/images/edit.png"></a></td>';
					htmlTemp+='<td class="button-column"></td>';
					htmlTemp+='</tr>';
			htmlTemp+='';
			parent.$("#la-elem-gestion-grid tbody").append(htmlTemp);
		}
	}else{
		
		if(parent.$("#la-elem-gestion-grid_"+id).html()){
			//Elimiando TR que fueron agregados a mano
			parent.$("#la-elem-gestion-grid_"+id).remove();
		}else{
			var posicion="";
			var idLa_elem_gestion="";
			//Debemos buscar y agregar la clase al TR que esta almacenado en la base de datos
			parent.$("#la-elem-gestion-grid tbody td.id_elem_gestion input").each(function(){
				if(parseInt($(this).val())==parseInt(id)){
						$(this).parent('td').parent('tr').addClass('deleteRecord');
						posicion=$(this).parent('td').parent('tr').index();
						idLa_elem_gestion=$(this).parent('td').parent('tr').children('td.id_la_elem_gestion').children('input').val();
				}
			});
			parent.$("#la-elem-gestion-grid tbody tr").eq(posicion).children('td').eq(0).append('<input type="hidden" id="LaElemGestion_'+posicion+'_delete" name="LaElemGestion['+posicion+'][delete]" value="'+idLa_elem_gestion+'">');
		}
		if(parent.$("#la-elem-gestion-grid tbody tr").length==1){
			//Mostrando resultados "No se encontraron resultados"
			parent.$("#la-elem-gestion-grid tbody td.empty").parent('tr').show();
		}
	}
	
	//Debemos actualizar el link con los id's de elementos de gestión que necesitamos enviar para que aparescan como checkeados
	var atributos="";
	parent.$("#la-elem-gestion-grid tbody td.id_elem_gestion").children('input').each(function(){
			if(!$(this).parent('td').parent('tr').hasClass('deleteRecord')){
				atributos+="el[]="+$(this).val()+"&";
			}
	});	
	parent.$("#agregarLA").attr('href',$("#urlSitioWeb").val()+'/ElementosGestion/indexLA/?'+atributos);
}

function eliminandoElementoGestionAsociadoLA(idLink){	
	var posicion=$(this).parent('td').parent('tr').index();
	var idLa_elem_gestion=$(idLink).parent('td').parent('tr').children('td.id_la_elem_gestion').children('input').val();
	$(idLink).parent('td').parent('tr').addClass('deleteRecord');
	$("#la-elem-gestion-grid tbody tr").eq(posicion).children('td').eq(0).append('<input type="hidden" id="LaElemGestion_'+posicion+'_delete" name="LaElemGestion['+posicion+'][delete]" value="'+idLa_elem_gestion+'">');
	//Debemos actualizar el link con los id's de elementos de gestión que necesitamos enviar para que aparescan como checkeados
	var atributos="";
	$("#la-elem-gestion-grid tbody td.id_elem_gestion").children('input').each(function(){
			if(!$(this).parent('td').parent('tr').hasClass('deleteRecord')){
				atributos+="el[]="+$(this).val()+"&";
			}
	});	
	$("#agregarLA").attr('href',$("#urlSitioWeb").val()+'/ElementosGestion/indexLA/?'+atributos);
	
	return false;
}


function activarTextField(check){
	//obtenemos el nombre del texField a partir del ID del checkbox
	//var nombreText = check.id+"textField";
	

	//Habilitamos y deshabilitamos el textField asociado al checkbox 
	//document.getElementById(nombreText).disabled = !check.checked
	
	//Mostramos o ocultamos el textField asociado al checkbox
	if(check.checked){
		$(check).parent().children("input[type=\'text\']").removeAttr("disabled").show();
		//despstyle.display = 'inherit';
	}else{
		$(check).parent().children("input[type=\'text\']").attr("disabled","disabled").hide();
		//document.getElementById(nombreText).style.display = 'none';
	}
	//Actualiza grilla superior con el resumen de los campos
	resumenIndicadoresAsignadosInstrumentos();

	
}

function crearGraficoBarra(){
	
	$('.graficoProgressbar').each(
	    	function(){   

	    		$(this).progressbar({value:parseInt($(this).attr('valIndicador'))});
	    		
	    		var selector = '#' + this.id + ' > div';
	    	
	    		   var value = parseInt($(this).attr('valIndicador'));
			         if (value > 99){
			            $(selector).css({ 'background': '#009e0f' });
			        } 
			        else{
			        
			        	if(value < 99 && value > 50){
			        	
			        		$(selector).css({ 'background': '#ffff00' });
			        	}
			        	else{
			        	
			        		$(selector).css({ 'background': '#cc0000' });
			        	
			        	}
			        }
			     
	  				$(this).css({ 'height': '25px' });
	  				$(this).css({ 'width': '150px' });
	  			
	  				
	    
	    	});
	
}
function mostrarCentrosCostos(id, bandera)
{
	
	var idivision = id; 
	
	var action = baseURL + '/ejecucionPresupuestaria/obtenerCentros/'+idivision;
	

	$.getJSON(action, function(listaJson) {
		$('#combo2').find('option').each(function(){ $(this).remove(); });
		$('#combo2').append("<option value='0'>Seleccione Centro de Costos</option>");
		if(listaJson!=''){
			$.each(listaJson, function(key, centro) {
				$('#combo2').append("<option value='"+centro.id+"'>"
				+centro.nombre+"</option>");
			});
			
			if(bandera !=0){
				
				$('#combo2').val(bandera);
			}
			
		}else{
			mensajeParaMantenedor("No se encuentran registros para el centro de responsabilidad seleccionado");
		}
	}).error(function(e){ 
		mensajeParaMantenedor(e.responseText);
		});	
	obtenerDatosExcelReporteAvancesIndicadores();

}

function mostrarEjecucionPresupuestaria(id)
{
	
	if(parseInt(id) != 0) {


		$.fn.yiiGridView.update('items-grid', {
              data: '&EjecucionPresupuestaria[id_centro_costo]='+parseInt(id) });
	
		$("#items-grid tbody").remove();
		$("#items-grid.pager").remove();
		$('#grillaDatos').show('slow');
			 	
		return;
	}else{
	
		$('#grillaDatos').hide('slow');
		
	}
	
}

function mostrarIndicadoresFiltro(id)
{
	
	//if(parseInt(id) != 0) {


		$.fn.yiiGridView.update('indicadores-grid', {
              data: '&EjecucionPresupuestaria[id_centro_costo]='+parseInt(id) });
	
		$("#indicadores-grid tbody").remove();
		$("#items-grid.pager").remove();
		//$('#grillaDatos').show('slow'); este es el div para hacerla visible
		/*	 	
		return;
	}else{
	
		$('#grillaDatos').hide('slow');
		
	}*/
	
}


function mostrarBoton(){
	
	var datosGrid = $("#items-grid tbody tr td span").html();

	 if(datosGrid != null){
	   $('#botonGuardar').hide('slow');
	   
	   $('#contenedorExcel').hide('slow');
	 }else{

		 $('#botonGuardar').show('slow');
		 $('#contenedorExcel').show('slow');
		 
	 }
	
}

function calcularAcumuladoEjecucionPresupuestaria(idInput){
	var acumulado=0;
	var saldo = 0;
	var asignado =0;
	
	$(idInput).parent('td').parent('tr').children('.mes').each(function(){
		if($(this).children('input').val()){
			acumulado+=parseInt($(this).children('input').val());
		}		
	});
	$(idInput).parent('td').parent('tr').children('.acumuladoInput').children('input').val(acumulado);
	asignado = parseInt($(idInput).parent('td').parent('tr').children('.asignado').html());
	
	saldo = asignado - acumulado;
	$(idInput).parent('td').parent('tr').children('.saldoInput').children('input').val(saldo);
	$(idInput).parent('td').parent('tr').children('.acumulado').html(acumulado);
	$(idInput).parent('td').parent('tr').children('.saldo').html(saldo);
}

function maskInput(event) {
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


function maskInputFloat(event) {

		if(event.keyCode == 190 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 9  ){

		}else {
			
			if (event.keyCode < 48 || event.keyCode > 57 ) {
				event.preventDefault();	
			}			
		}
}


function  resumenIndicadoresAsignadosInstrumentos(desdeDonde)
{
	 
       var obj= new Array();
       $("#indicadores-instrumentos-grid input[type='text']:visible").each(function(){
       		var className=$(this).attr('class');
       		if(!isNaN(this.value) && $(this).val().length!=0) {
	       		if(obj[className] != undefined){
	       			 
	       				obj[className]+=parseFloat($(this).val());
	       				//obj[className]= parseFloat(obj[className]) + parseFloat($(this).val());
	       		}else{
	       			 
	       				obj[className]=parseFloat($(this).val());
	       			
	       		
	       		}
       		}
       });
       
      	  if(desdeDonde=="btnGuardar"){
      	   var msg=" ";
      	   var nombreObjeto ="";
      	   for(var x in obj){
      	   		switch(x)
      	   		{
					case 'input_FH':
  						nombreObjeto='FH';
  						break;
        	   		case 'input_CDC':
  						nombreObjeto='CDC';
  						break;		
      	   			case 'input_MG':
  						nombreObjeto='MG';
  						break;
      	   			case 'input_T':
  						nombreObjeto='T';
  						break;
      	   			case 'input_PMG':
  						nombreObjeto='PMG';
  						break;  
  					default:
  						nombreObjeto='';							 						 										
      	   		}
	       		//msg += nombreObjeto +" = "+obj[x]+"\n";
	       		msg += nombreObjeto +" = "+ (Math.round(obj[x]*100)/100) +"\n";
	       }
	       		
	       		return msg;
	       
      	  }else{ 	
	       for(var x in obj){
	       		$("#resumen_"+x).html( (Math.round(obj[x]*100)/100)+'%');
	       }
       	 }
}

function mostrarSubCriteriosenElementosDeGestion(id){
 	var action = baseURL + '/elementosGestion/obtenerSubCriterios2/'+id;
	
	// se pide al action la lista de productos de la categoria seleccionada
	$.getJSON(action, function(listaJson) {
		
		$('#yw0').hide();
		$("#elementos-gestion-grid tbody").remove();
		$("#elementos-gestion-grid thead").remove();
		$("#elementos-gestion-grid .pager").remove();
		$("#elementos-gestion-grid .summary").html('');
		// el action devuelve los productos en su forma JSON, el iterador "$.each" los separará.
		// limpiar el combo
		$('#subcriterio').find('option').each(function(){ $(this).remove(); });
		$('#subcriterio').append("<option value='0'>Seleccione SubCriterio</option>");
		
		if(listaJson!=''){
			$.each(listaJson, function(key, scriterio) {
	
				$('#subcriterio').append("<option value='"+scriterio.id+"'>"
				+scriterio.nombre+"</option>");
			});
		}else{
			mensajeParaMantenedor("No se encuentran SubCriterios");
		}		
		//$('#siguiente').show('slow');
	}).error(function(e){ 
			mensajeParaMantenedor(e.responseText);
		});
}

function mostrarGestoresReporteAvanceIndicadores(id){
	
	var centroid = id; 
	
	var action = baseURL + '/reporteAvanceIndicadores/obtenerGestores/'+centroid;
	

	$.getJSON(action, function(listaJson) {
		$('#combo_gestor').find('option').each(function(){ $(this).remove(); });
		$('#combo_gestor').append("<option value='0'>Seleccione Gestor</option>");
		if(listaJson!=''){
			$.each(listaJson, function(key, gestor) {
				$('#combo_gestor').append("<option value='"+gestor.id+"'>"
				+gestor.nombres+"</option>");
			});

			
		}else{
			mensajeParaMantenedor("No se encuentran registros para el centro de costo seleccionado");
		}
	}).error(function(e){ 
		mensajeParaMantenedor(e.responseText);
		});	
	obtenerDatosExcelReporteAvancesIndicadores();
}

function mostrarProductosEstrategicosReporteAvanceIndicadores(id){
	
	var tipoId = id; 
	
	var action = baseURL + '/reporteAvanceIndicadores/obtenerProductosEstrategicos/'+tipoId;
	

	$.getJSON(action, function(listaJson) {
		$('#combo_producto_estrategico').find('option').each(function(){ $(this).remove(); });
		$('#combo_producto_estrategico').append("<option value='0'>Seleccione Producto Estratégico</option>");
		if(listaJson!=''){
			$.each(listaJson, function(key, gestor) {
				$('#combo_producto_estrategico').append("<option value='"+gestor.id+"'>"
				+gestor.nombre+"</option>");
			});

			
		}else{
			mensajeParaMantenedor("No se encuentran registros para el tipo de producto seleccionado");
		}
	}).error(function(e){ 
		mensajeParaMantenedor(e.responseText);
		});	
	obtenerDatosExcelReporteAvancesIndicadores();
}

function mostrarSubproductosReporteAvanceIndicadores(id){
	
	var peId = id; 
	
	var action = baseURL + '/reporteAvanceIndicadores/obtenerSubproductos/'+peId;
	

	$.getJSON(action, function(listaJson) {
		$('#combo_subproducto').find('option').each(function(){ $(this).remove(); });
		$('#combo_subproducto').append("<option value='0'>Seleccione Subproducto</option>");
		if(listaJson!=''){
			$.each(listaJson, function(key, gestor) {
				$('#combo_subproducto').append("<option value='"+gestor.id+"'>"
				+gestor.nombre+"</option>");
			});

			
		}else{
			mensajeParaMantenedor("No se encuentran registros para el producto estratégico seleccionado");
		}
	}).error(function(e){ 
		mensajeParaMantenedor(e.responseText);
		});	
	obtenerDatosExcelReporteAvancesIndicadores();
}


function mostrarProductoEspecificoReporteAvanceIndicadores(id){
	
	var subId = id; 
	
	var action = baseURL + '/reporteAvanceIndicadores/obtenerProductoEspecifico/'+subId;
	

	$.getJSON(action, function(listaJson) {
		$('#combo_pre_especifico').find('option').each(function(){ $(this).remove(); });
		$('#combo_pre_especifico').append("<option value='0'>Seleccione Producto Específico</option>");
		if(listaJson!=''){
			$.each(listaJson, function(key, gestor) {
				$('#combo_pre_especifico').append("<option value='"+gestor.id+"'>"
				+gestor.nombre+"</option>");
			});

			
		}else{
			mensajeParaMantenedor("No se encuentran registros para el subproducto seleccionado");
		}
	}).error(function(e){ 
		mensajeParaMantenedor(e.responseText);
		});	
	obtenerDatosExcelReporteAvancesIndicadores();
}

function mostrarIndicadoresReporteAvanceIndicadores(id){
	

	var pEspeId = id; 
	
	var action = baseURL + '/reporteAvanceIndicadores/obtenerIndicadores/'+pEspeId;
	

	$.getJSON(action, function(listaJson) {
		$('#combo_indicadores').find('option').each(function(){ $(this).remove(); });
		$('#combo_indicadores').append("<option value='0'>Seleccione Indicador</option>");
		if(listaJson!=''){
			$.each(listaJson, function(key, gestor) {
				$('#combo_indicadores').append("<option value='"+gestor.id+"'>"
				+gestor.nombre+"</option>");
			});

			
		}else{
			mensajeParaMantenedor("No se encuentran registros para el producto específico seleccionado");
		}
	}).error(function(e){ 
		mensajeParaMantenedor(e.responseText);
		});	
	obtenerDatosExcelReporteAvancesIndicadores();
}

function mostrarReporteAvances(id)
{
	

	var division = $('#combo1').val();
	var centro = $('#combo2').val();
	var gestor = $('#combo_gestor').val();
	var tipo = $('#combo_tipo_prodcuto').val();
	var gestor = $('#combo_gestor').val();
	var estrategico = $('#combo_producto_estrategico').val();
	var sub = $('#combo_subproducto').val();
	var especifico = $('#combo_pre_especifico').val();
	var indicadores = $('#combo_indicadores').val();
	var estado = $('#combo_estado').val();
	var instrumentos = $('#Instrumentos_nombre').val();
	//alert(instrumento1);


	if(parseInt(id) != 0) {


		$.fn.yiiGridView.update('indicadores-grid', {
              data: '&ReporteAvanceIndicadores[divisionNombre]='+parseInt(division)+'&ReporteAvanceIndicadores[centroCostoNombre]='+parseInt(centro)+
              '&ReporteAvanceIndicadores[responsableNombre]='+parseInt(gestor)+'&ReporteAvanceIndicadores[tipoProductoEstrategico]='+parseInt(tipo)+
              '&ReporteAvanceIndicadores[productoEstrategicoNombre]='+parseInt(estrategico)+
              '&ReporteAvanceIndicadores[subproductoNombre]='+parseInt(sub)+'&ReporteAvanceIndicadores[productoEspecificoNombre]='+parseInt(especifico)+
              '&ReporteAvanceIndicadores[id]='+parseInt(indicadores)+
              '&ReporteAvanceIndicadores[estado]='+parseInt(estado)+'&ReporteAvanceIndicadores[instrumentos]='+instrumentos});
	
		$("#indicadores-grid tbody").remove();
		$("#indicadores-grid.pager").remove();
		//$('#grillaDatos').show('slow');
			 	
		return;
	}else{
	
		//$('#grillaDatos').hide('slow');
		
	}
	
	
}


function obtenerDatosExcelReporteAvancesIndicadores()
{
	

	var division = $('#combo1').val();
	var centro = $('#combo2').val();
	var gestor = $('#combo_gestor').val();
	var tipo = $('#combo_tipo_prodcuto').val();
	var estrategico = $('#combo_producto_estrategico').val();
	var sub = $('#combo_subproducto').val();
	var especifico = $('#combo_pre_especifico').val();
	var indicadores = $('#combo_indicadores').val();
	var estado = $('#combo_estado').val();
	var instrumento1 = $('#Instrumentos_nombre').val();


	$('#linkExcel').attr('href', baseURL+'/reporteAvanceIndicadores/create?div='+division+'&centro='+centro+'&gestor='+gestor+
			'&tipo='+tipo+'&estrategico='+estrategico+'&sub='+sub+'&especifico='+especifico+'&indicador='+indicadores+'&estado='+estado);

	
	
}

function calcularFormulaRegistroAvancesPanelGeneralAvance(a, b, c, formula)
{
	//yo ya tengo la formula
	//var formula =$("#formula b").html();
	
	//tengo los valores a,b,c
	/*var valorA = $("#valorA:visible").val();
	var valorB = $("#valorB:visible").val();
	var valorC = $("#valorC:visible").val();*/
	
	//$("#resultadoCalculoFormula").html(" ");
	
	var resultado=0;
	var faltanParametros=false;
	
	if(formula.indexOf('A') != -1 ){
	      if (/^[0-9]+$/.test(a)){ 
		      formula= formula.replace (/A/,a)	
		  }else{
		      faltanParametros =true;
		  }
	}else{
	//	$("#conceptoa").css("display", "none");
	}
	if(formula.indexOf('B') != -1 ){
	     if (/^[0-9]+$/.test(b)){ 
		      formula= formula.replace (/B/,b)	
		  }else{
		      faltanParametros =true;
		  }
	}else{
		//$("#conceptob").css("display", "none");
	}
	if(formula.indexOf('C') != -1 ){
	      if (/^[0-9]+$/.test(c)){ 
		      formula= formula.replace (/C/,c)	
		  }else{
		      faltanParametros =true;
		  }
	}else{
		//$("#conceptoc").css("display", "none");
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


