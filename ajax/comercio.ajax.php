<?php

require_once "../controllers/comercio.controlador.php";
require_once "../models/comercio.modelo.php";

class AjaxComercio{

	/*=============================================
	CAMBIAR SCRIPT
	=============================================*/

	public $apiFacebook;
	public $pixelFacebook;
	public $googleAnalytics;

	public function ajaxCambiarScript(){

		$datos = array("apiFacebook"=>$this->apiFacebook,
					   "pixelFacebook"=>$this->pixelFacebook,
					   "googleAnalytics"=>$this->googleAnalytics);

		$respuesta = ControladorComercio::ctrActualizarScript($datos);

		echo $respuesta;

	}

	/*=============================================
	CAMBIAR INFORMACIÓN
	=============================================*/

	public $impuesto;
	public $envioNacional;
	public $envioInternacional;
	public $tasaMinimaNal;
	public $tasaMinimaInt;
	public $seleccionarPais;
	public $modoPaypal;
	public $clienteIdPaypal;
	public $llaveSecretaPaypal;

	public function ajaxCambiarInformacion(){

		$datos = array("impuesto"=>$this->impuesto,
						"envioNacional"=>$this->envioNacional,
						"envioInternacional"=>$this->envioInternacional,
						"tasaMinimaNal"=>$this->tasaMinimaNal,
						"tasaMinimaInt"=>$this->tasaMinimaInt,
						"seleccionarPais"=>$this->seleccionarPais,
						"modoPaypal"=>$this->modoPaypal,
						"clienteIdPaypal"=>$this->clienteIdPaypal,
						"llaveSecretaPaypal"=>$this->llaveSecretaPaypal
						);

		$respuesta = ControladorComercio::ctrActualizarInformacion($datos);

		echo $respuesta;

	}

}


/*=============================================
CAMBIAR SCRIPT
=============================================*/	

if(isset($_POST["apiFacebook"])){

	$script = new AjaxComercio();
	$script -> apiFacebook = $_POST["apiFacebook"];
	$script -> pixelFacebook = $_POST["pixelFacebook"];
	$script -> googleAnalytics = $_POST["googleAnalytics"];
	$script -> ajaxCambiarScript();

}

/*=============================================
CAMBIAR INFORMACION
=============================================*/	

if(isset($_POST["impuesto"])){

	$informacion = new AjaxComercio();
	$informacion -> impuesto = $_POST["impuesto"];
	$informacion -> envioNacional = $_POST["envioNacional"];
	$informacion -> envioInternacional = $_POST["envioInternacional"];
	$informacion -> tasaMinimaNal = $_POST["tasaMinimaNal"];
	$informacion -> tasaMinimaInt = $_POST["tasaMinimaInt"];
	$informacion -> seleccionarPais = $_POST["seleccionarPais"];
	$informacion -> modoPaypal = $_POST["modoPaypal"];
	$informacion -> clienteIdPaypal = $_POST["clienteIdPaypal"];
	$informacion -> llaveSecretaPaypal = $_POST["llaveSecretaPaypal"];
	$informacion -> ajaxCambiarInformacion();

}

