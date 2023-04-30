<?php
session_start();
require_once("conexion.php");
require_once("./template/cabecera.php");
/*echo "<h5 class='mt-2' style='color:white'>".$_SESSION['nombreCliente']."</h5>";*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];

if (isset($_POST["submit"])) {

	$N = $_POST["nombrePlanta"];

	if ($N != "") {
		$consulta = "SELECT * FROM plantas WHERE nombrePlanta LIKE '%$N%'";
		$paquete = $db->query($consulta);

	} else {

		?>
		<div class="navbar-mx-5 VolverDerecha">
				<a href='./borrarPlantas.php' style='text-decoration:none;'><span style='color: white; font-size: 20px;'>&#8592;
						Volver</span></a>
		</div>
		</nav>
		<div class="container mt-3">
			<div class="row">
				<div class="col-12">
					<h3>No disponible</h3>
				</div>
			</div>
		</div>

		<?php

		echo "<p>No disponible</p>";
	}

	?>

	<div class="navbar-mx-5 VolverDerecha">
		<li>
			<a href='./borrarPlantas.php' style='text-decoration:none;'><span style='color: white; font-size: 20px;'>&#8592;
					Volver</span></a>
		</li>
	</div>
	</nav>
	<div class="container mt-3">
		<div class="row">
			<div class="col-12">
				<table class="table table-striped">
					<thead class=" thead-inverse">
						<tr>
							<th>Referencia</th>
							<th>Nombre</th>
							<th>Código</th>
							<th>Código</th>
						</tr>
					</thead>
					<tbody>

						<?php


						while ($fila = $paquete->fetch_array()) {
							?>
							<tr>
								<!--	<td>  php  echo $fila['idplanta']</td>-->
								<td>
									<?php echo $fila['nombrePlanta']; ?>
								</td>
								<td>
									<?php echo $fila['codigoPlanta']; ?>
								</td>
								<td>
									<?php echo $fila['numeroEjemplares']; ?>
								</td>
								<td><img style='width:150px' src='<?php echo $fila['ruta_imagen']; ?>'></td>
							</tr>
							<?php

						}
						?>
						<td>Búsqueda finalizada</td>
					</tbody>

				</table>
			</div>
		</div>
	</div>
	
	<?php
}
require_once("./template/pie.php");
$db->close();
?>