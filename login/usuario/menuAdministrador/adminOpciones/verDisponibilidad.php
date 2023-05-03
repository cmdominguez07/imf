<?php
session_start();
require_once("conexion.php");
require_once("./template/cabecera.php");
/*echo "<h5 class='mt-2' style='color:white'>".$_SESSION['nombreCliente']."</h5>";*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];

if (isset($_POST["buscar"])) {

	$N = $_POST["nombrePlanta"];

	if ($N != "") {
		$consulta = "SELECT * FROM plantas WHERE nombrePlanta LIKE '%$N%'";
		$paquete = $db->query($consulta);

	} else {

		?>
		<div class="navbar-mx-5 VolverDerecha">
			<a href='./borrarPlantas.php' style='text-decoration:none;'><span style='color: white; font-size: 18px;'>&#8592;
					Volver</span></a>
		</div>
		</nav>
		<div class="container pt-5">
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
			<a href='./borrarPlantas.php' style='text-decoration:none;'><span style='color: white; font-size: 18px;'>&#8592;
					Volver</span></a>
		</li>
	</div>
	</nav>

	<div class="container py-5 d-flex justify-content-center align-items-center h-100">
		<div class="row">
			<div class="col-12 my-5 py-5">
				<table class="table table-striped mt-3 px-2">
					<thead class=" thead-inverse pt-5">
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Código</th>
							<th>Precio</th>
							<th>Tipo</th>
							<th>Imagen</th>
						</tr>
					</thead>
					<tbody>
						<?php


						while ($fila = $paquete->fetch_array()) {
							?>
							<form method='POST' action='borrarPlantas.php'
								class="container-fluid d-flex justify-content-center align-items-center mt-2">
								<tr>
									<td> <input type='text' name='idplanta' value='<?php echo $fila['idplanta']
									; ?>' readonly class='form-control-plaintext'> </td>
									<td><input type='text' name='nombre' value='<?php echo $fila['nombrePlanta']
									; ?>' readonly class='form-control-plaintext'></td>
									<td><input type='text' name='codigo' value='<?php echo $fila['codigoPlanta']
									; ?>' readonly class='form-control-plaintext'></td>
									<td><input type='text' name='precio' value='<?php echo $fila['precio']
									; ?>' readonly class='form-control-plaintext'></td>
									<td><input type='text' name='TipoPlanta' value='<?php echo $fila['TipoPlanta']
									; ?>' readonly class='form-control-plaintext'></td>
									<td><img style='width:100px' src='<?php
									echo $fila['ruta_imagen']; ?> '></td>
									<td>
										<input type='submit' name='Editar' value='Editar' class='btn btn-info'>
									</td>
									<td>
										<input type='submit' name='Borrar' value='Borrar' class='btn btn-danger'>
									</td>
								</tr>
							</form>
						</tbody>
						<?php
						}
						if (isset($_POST['Editar'])) {

							$IPP = $_POST['idplanta'];
							header("Location:/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/borrarPlantas.php?idplanta=$IPP");
						}
						?>

				</table>
			</div>
		</div>

		<?php


}
require_once("./template/pie.php");
$db->close();
?>