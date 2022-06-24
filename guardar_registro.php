<?php 
	$nombre_hamburguesa = $_POST["nombre_hamburguesa"];
	$costo_de_articulo = $_POST["costo_de_articulo"];
	$comentario = $_POST["comentario"];
	$metodo_de_pago = $_POST["metodo_de_pago"];
	$extras = $_POST["extras"];



	$servidor = "localhost"; $usuario = "root"; $contrasena = ""; $bd = "carls'jr";
	$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);

	if($conexion->connect_error){ echo "Error al conectar a la Base de datos"; }

	$sql = "INSERT INTO pedido (nombre_hamburguesa, costo_de_articulo, comentario, metodo_de_pago, extras) VALUES ('$nombre_hamburguesa', '$costo_de_articulo', '$comentario', '$metodo_de_pago', '$extras')";

	if($conexion->query($sql) === TRUE){		
		header('Location: index.html');
	}else{
		echo "Ocurrio un error: " . $conexion->error;
	}

 ?>