<?php
session_start();
require("conexion.php");
require("./template/cabecera.php");
/*echo "<h5 class='mt-2' style='color:white'>".$_SESSION['nombreCliente']."</h5>";*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];

if (isset($_POST["submit"])) {

	$N = $_POST["nombreCliente"];

	if ($N != "") {
		$consulta = "SELECT * FROM clientesclub WHERE nombreCliente LIKE '%$N%'";
		$paquete = $db->query($consulta);

	} else {
		?>
		<div class="navbar-mx-5 VolverDerecha ">
			<a href='./verClientes.php' style='text-decoration:none;'><span style='color: white; font-size: 18px;'>&#8592;
					Volver</span></a>
		</div>
		</nav>
		<div class="container pt-5">
			<div class="row pt-5">
				<div class="col-12">
					<h3>No disponible</h3>
				</div>
			</div>
		</div>

		<?php

	}

	?>

	<div class="navbar-mx-5 VolverDerecha">
		<a href='./verClientes.php' style='text-decoration:none;'><span style='color: white; font-size: 18px;'>&#8592;
				Volver</span></a>
	</div>
	</nav>
	<div class="container pt-5 container-fluid contenido1 ">
		<div class="row">
			<div class="col-12 pt-5 container-fluid d-flex justify-content-center align-items-center ">
				<table class="table table-striped ">
					<thead class=" thead-inverse">
						<tr>
							<th>Referencia</th>
							<th>Nombre</th>
							<th>Código</th>
						</tr>
					</thead>
					<tbody>

						<?php

						while ($fila = $paquete->fetch_array()) {

							?>
							<tr>
								<!--echo "<td>".$fila['idplanta'],"</td>";-->
								<td>
									<?php echo $fila['nombreCliente']; ?>
								</td>
								<td>
									<?php echo $fila['apellidoCliente']; ?>
								</td>
								<td>
									<?php echo $fila['passWordCliente']; ?>
								</td>
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