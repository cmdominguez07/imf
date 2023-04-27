<?php
session_start();
require_once("conexion.php");
require_once("./template/cabecera.php");
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
		<div class="navbar-mx-5 VolverDerecha">
			<li>
				<a href='./verClientes.php' style='text-decoration:none;'><span style='color: white; font-size: 20px;'>&#8592;
						Volver</span></a>
			</li>
			</li>
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

	}

	?>

	<div class="navbar-mx-5 VolverDerecha">
		<li>
			<a href='./verClientes.php' style='text-decoration:none;'><span style='color: white; font-size: 20px;'>&#8592;
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