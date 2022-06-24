<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo JQUERY Mobile</title>
	<link rel="stylesheet" href="jquerymobile/jquery.mobile-1.4.5.min.css" />

	<link rel="stylesheet" href="jquerymobile/tema2.min.css" />
	<link rel="stylesheet" href="jquerymobile/jquery.mobile.icons.min.css">
	<!-- <link rel="stylesheet" href="jquerymobile/themes/colores.css"> -->
	<script src="jquerymobile/jquery-1.11.1.min.js"></script>
	<script src="jquerymobile/jquery.mobile-1.4.5.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php
		$servidor = "localhost"; $usuario = "root"; $contrasena = ""; $bd = "carls'jr";
		$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);

		if($conexion->connect_error){ echo "Error al conectar a la Base de datos"; }

		$sql = "SELECT * FROM pedido";
		$datos = $conexion->query($sql);
	?>
	
	<div data-role="page" id="#" data-theme="c">

		<div data-role="header">
			<h1>JIK</h1>
		</div>

		<div role="main" class="ui-content">
			<h2 style="text-align: center; color:orange">Carrito</h2><hr>
			<div class="" style="align-items: center">
				<?php
					if ($datos->num_rows > 0) {
				?>
				<table class="table table-hover" style="border: 2px solid gray; border-collapse: separate; align-content: center; text-align: center">
					<thead>
						<tr>
							<th>ID</th>
							<th>Articulo</th>
							<th>Pre$io</th>
							<!-- <th>Comentarios</th> -->
                            <th>metodo de pago</th>
                            <!-- <th>Extras</th> -->
							<th style="background-color: red; color:white; text-shadow: 1px 1px 1px black">Cancelar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($registro = $datos->fetch_assoc()){
								echo "<tr>";
									echo "<td style='background-color:#D433FF'>".$registro["id"]."</td>";
									echo "<td style='background-color:#BDA2FF'>".$registro["nombre_hamburguesa"]."</td>";
									echo "<td style='background-color:#D433FF'>".$registro["costo_de_articulo"]."</td>";
									// echo "<td style='background-color:#BDA2FF'>".$registro["comentario"]."</td>";
                                    echo "<td style='background-color:#BDA2FF'>".$registro["metodo_de_pago"]."</td>";
                                    // echo "<td style='background-color:#A9FFA2'>".$registro["extras"]."</td>";
									echo "<td style='background-color:#FF3333'><a class='btn btn-danger' href='borrar_carrito.php?id=".$registro["id"]."'>Cancelar pedido</a> ";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
				<?php } else { echo "<h1>No tienes productos en espera</h1>"; $conexion->close(); } ?>
			</div>

		</div>

		<div data-role="footer" data-position="fixed">
			<div data-role="navbar">
				<ul>
					<li><a href="index.html" data-icon="grid">Inicio</a></li>
					<li><a href="index.html" data-icon="star">menu</a></li>
					<li><a href="#" data-icon="gear" class="ui-btn-active">Carrito</a></li>
				</ul>
			</div>
		</div>
	</div>
</body>

	


</body>
</html>