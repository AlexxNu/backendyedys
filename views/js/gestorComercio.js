

/*=============================================
CAMBIAR CÓDIGOS
=============================================*/

$(".cambioScript").change(function(){

	var apiFacebook = $("#apiFacebook").val();

	var pixelFacebook = $("#pixelFacebook").val();

	var googleAnalytics = $("#googleAnalytics").val();


	$("#guardarScript").click(function(){


		var datos = new FormData();
		datos.append("apiFacebook", apiFacebook);
		datos.append("pixelFacebook", pixelFacebook);
		datos.append("googleAnalytics", googleAnalytics);

		$.ajax({

			url:"ajax/comercio.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					swal({
				      title: "Cambios guardados",
				      text: "¡La plantilla ha sido actualizada correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
			
				}
				
			}

		})

	})

})

/*=============================================
SELECCIONAR PAIS
=============================================*/

$.ajax({
	url:"views/js/countries.json",
	type: "GET",
	cache: false,
	contentType: false,
	processData:false,
	dataType:"json",
	success: function(respuesta){

		respuesta.forEach(seleccionarPais);

		function seleccionarPais(item, index){

			var pais = item.name;
			var codPais = item.code;

			if($("#codigoPais").val() == codPais){

				$("#paisSeleccionado").attr("value",codPais);
				$("#paisSeleccionado").html(pais);

			}

			$("#seleccionarPais").append('<option value="'+codPais+'">'+pais+'</option>');

		}

	}

})

/*=============================================
CAMBIAR INFORMACIÓN
=============================================*/

var impuesto = $("#impuesto").val();
var envioNacional = $("#envioNacional").val();
var envioInternacional = $("#envioInternacional").val();
var tasaMinimaNal = $("#tasaMinimaNal").val();
var tasaMinimaInt = $("#tasaMinimaInt").val();
var seleccionarPais = $("#codigoPais").val();
var clienteIdPaypal = $("#clienteIdPaypal").val();
var llaveSecretaPaypal = $("#llaveSecretaPaypal").val();


/*=============================================
CAMBIAR MODO PAYPAL
=============================================*/
$("input[name='modoPaypal']").on("ifChecked",function(){

	var modoPaypal = $(this).val();


	$("#guardarInformacion").click(function(){

		cambiarInformacion(modoPaypal);

	});

})


/*=============================================
GUARDAR LA INFORMACION
=============================================*/

$(".cambioInformacion").change(function(){

	impuesto = $("#impuesto").val();

	envioNacional = $("#envioNacional").val();

	envioInternacional = $("#envioInternacional").val();

	tasaMinimaNal = $("#tasaMinimaNal").val();

	tasaMinimaInt = $("#tasaMinimaInt").val();

	seleccionarPais = $("#seleccionarPais").val();

	modoPaypal = $("input[name='modoPaypal']:checked").val();

	clienteIdPaypal = $("#clienteIdPaypal").val();

	llaveSecretaPaypal = $("#llaveSecretaPaypal").val();


	$("#guardarInformacion").click(function(){

		cambiarInformacion(modoPaypal);
	
	})	

})

/*=============================================
// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN
=============================================*/

function cambiarInformacion(modoPaypal){

	var datos = new FormData();
	datos.append("impuesto", impuesto);
	datos.append("envioNacional", envioNacional);
	datos.append("envioInternacional", envioInternacional);
	datos.append("tasaMinimaNal", tasaMinimaNal);
	datos.append("tasaMinimaInt", tasaMinimaInt);
	datos.append("seleccionarPais", seleccionarPais);
	datos.append("modoPaypal", modoPaypal);	
	datos.append("clienteIdPaypal", clienteIdPaypal);
	datos.append("llaveSecretaPaypal", llaveSecretaPaypal);


	$.ajax({

		url:"ajax/comercio.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			
			if(respuesta == "ok"){

				swal({
			      title: "Cambios guardados",
			      text: "¡El comercio ha sido actualizado correctamente!",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    });
			
			}
							
		}

	})

}




