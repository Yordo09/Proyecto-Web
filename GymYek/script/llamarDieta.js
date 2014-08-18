$(document).ready(function(){

$("#VerC").ready(function(){

var data = {accion:"VclienteDieta"};
$.ajax({
	type:"POST",url:"php/usuario.php",data:data,
	success:function(re){
		$("#centroTabla").append(re);
	}
});

});


});