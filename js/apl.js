$(document).ready(function() {
		//Activando menus si vienen desde el breadcrums
        
});


$.yiimailbox={};
function paramPeriodo()
{
	
  if($("#selectPeriodo").val() !=''){
	
	$("#loadingProcesos").show();
	console.log("PERIODO")
	$.ajax({
		url: 'site/menuJson/'+$("#selectPeriodo").val(),
 		dataType:"json",
 		cache: false,
 		success: function(data) 
 		{	
 		$("#contenidoProcesosPrincipal").show();
 			
		console.log(data);
 			$(".breadcrumbs a").eq(0).html(data.anio);
 			
 			$("#loadingProcesos").hide();
 			
 		}
	});
 }else{
 	$('.menusProcesos').hide();
 }
}

function activarProceso2(idContenedor){
	$(".menusTerceros").hide();
	$(".menusSecundarios").hide();
	$("#"+idContenedor).show();
	$("#contenidoProcesosTercero").hide();
	$("#contenidoProcesosSecundarios").hide().show('slow');	
	
}

function activarProceso3(idContenedor){
	$(".menusTerceros").hide();
	$("#"+idContenedor).show();
	$("#contenidoProcesosTercero").hide().show('slow');	
	
}	

function getParameterByName(name)
{
  name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
  var regexS = "[\\?&]" + name + "=([^&#]*)";
  var regex = new RegExp(regexS);
  var results = regex.exec(window.location.search);
  if(results == null)
    return "";
  else
    return decodeURIComponent(results[1].replace(/\+/g, " "));
}
