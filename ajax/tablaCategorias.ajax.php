<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";

class TablaCategorias{

  /*=============================================
  MOSTRAR LA TABLA DE CATEGORÍAS
  =============================================*/ 

 	public function mostrarTabla(){	

 	$item = null;
 	$valor = null;

 	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
 		
 	if(count($categorias) == 0){

      $datosJson = '{ "data":[]}';

      echo $datosJson;

      return;

    }	

 	$datosJson = '{
		 
		  "data": [ ';

	for($i = 0; $i < count($categorias); $i++){
	
			/*=============================================
			REVISAR ESTADO
			=============================================*/ 

			if( $categorias[$i]["estado"] == 0){
				
				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoCategoria = 1;

			}else{

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoCategoria = 0;

			}

		 	$estado = "<button class='btn ".$colorEstado." btn-xs btnActivar' estadoCategoria='".$estadoCategoria."' idCategoria='".$categorias[$i]["id_category"]."'>".$textoEstado."</button>";

		 	/*=============================================
			REVISAR IMAGEN PORTADA
			=============================================*/ 

			$item = "ruta";
			$valor = $categorias[$i]["rute"];

			$cabeceras = ControladorCabeceras::ctrMostrarCabeceras($item, $valor);

			if($cabeceras["portada"] != ""){

				 $imgPortada = "<img class='img-thumbnail imgPortadaCategorias' src='".$cabeceras["portada"]."' width='100px'>";

			}else{

				$imgPortada = "<img class='img-thumbnail imgPortadaCategorias' src='views/images/cabeceras/default.png' width='100px'>";
			}

			/*=============================================
			REVISAR OFERTAS
			=============================================*/

			if($categorias[$i]["oferta"] != 0){

				if($categorias[$i]["precioOferta"] != 0){

					$tipoOferta = "PRECIO";
					$valorOferta = "$ ".number_format($categorias[$i]["precioOferta"],2);

				}else{

					$tipoOferta = "DESCUENTO";
					$valorOferta = $categorias[$i]["descuentoOferta"]." %";

				}


			}else{

				$tipoOferta = "No tiene oferta";
				$valorOferta = 0;

			}

			if($categorias[$i]["imgOferta"] != ""){

				 $imgOfertas = "<img class='img-thumbnail imgOfertaCategorias' src='".$categorias[$i]["imgOferta"]."' width='100px'>";

			}else{

				$imgOfertas = "<img class='img-thumbnail imgOfertaCategorias' src='views/images/ofertas/default/default.png' width='100px'>";

			}

			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/
	    
		    $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='".$categorias[$i]["id_category"]."' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='".$categorias[$i]["id_category"]."'rutaCabecera='".$categorias[$i]["rute"]."' imgOferta='".$categorias[$i]["imgOferta"]."'><i class='fa fa-times'></i></button></div>";
				    
			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$categorias[$i]["category"].'",
				      "'.$categorias[$i]["rute"].'",
				      "'. $estado.'",
				      "'.$cabeceras["descripcion"].'",
				      "'.$cabeceras["palabrasClaves"].'",
				      "'.$valorOferta.'",
				      "'.$imgOfertas.'",
				      "'.$categorias[$i]["finOferta"].'",
				      "'.$acciones.'"		    
				    ],';

	}

	$datosJson = substr($datosJson, 0, -1);

	$datosJson.=  ']
		  
	}'; 

	echo $datosJson;


 	}


}

/*=============================================
ACTIVAR TABLA DE CATEGORÍAS
=============================================*/ 
$activar = new TablaCategorias();
$activar -> mostrarTabla();