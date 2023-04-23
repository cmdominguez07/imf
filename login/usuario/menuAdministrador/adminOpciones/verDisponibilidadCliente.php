<?php
session_start();
include("conexion.php");
include("./template/cabecera.php");
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

		echo "<p>No disponible</p>";
	}
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

							echo "<tr>";
							//echo "<td>".$fila['idplanta'],"</td>";
							echo "<td >" . $fila['nombreCliente'], "</td>";
							echo "<td>" . $fila['apellidoCliente'], "</td>";
							echo "<td>" . $fila['passWordCliente'], "</td>";
							echo "</tr>";
						}

						echo '<td>Búsqueda finalizada</td>';
						echo "</tbody>";

						echo "</table>";
						echo "</div>";
						echo "</div>";
						echo "</div>";
}
include("./template/pie.php");
$db->close();
?>