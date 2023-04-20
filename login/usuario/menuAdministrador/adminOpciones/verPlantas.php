<?php

include ("conexion.php");
include ("./template/cabecera.php");
session_start();
echo "Usuario: " . $_SESSION['nombreCliente'];
 $_SESSION['passWordCliente'];
 $_SESSION['id_cliente'];


$consulta="select * from plantas";
$paquete=$db->query($consulta);
//$paquete=mysqli_query($conexion, $consulta);

echo " <table width=500> <tr> <td><h3>Nombre</h3></td><td ><h3 style='color:white'>Código</h3></td><td><h3 >Cantidad disponible</h3></td></tr>"; 

	while($fila=$paquete->fetch_array()){ 
		
		echo"<tr>";
		//echo "<td>".$fila['idplanta'],"</td>";
		echo "<td>" . $fila['nombrePlanta'],"</td>";
		echo "<td>" . $fila['codigoPlanta'],"</td>";
		echo "<td>" . $fila['numeroEjemplares'],"</td>";
		echo "</tr>";
	}

	
		echo "</table> <br>";

		include ("./template/pie.php");
		$db->close();
?>