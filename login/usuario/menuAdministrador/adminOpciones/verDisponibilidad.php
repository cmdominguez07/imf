<?php
session_start();
include ("conexion.php");
include ("./template/cabecera.php");
/*echo "<h5 class='mt-2' style='color:white'>".$_SESSION['nombreCliente']."</h5>";*/
 $_SESSION['passWordCliente'];
 $_SESSION['id_cliente'];



if (!isset($_POST["submit"]))
{ 

?>

      <div class="navbar-mx-5 VolverDerecha">
        <li>
        <a href='./borrarPlantas.php' style='text-decoration:none;'><span style='color: white; font-size: 20px;'>&#8592; Volver</span></a>         </li>
        </li>
     
    </div>
</nav>
<div class=" d-fluid" >
<div class=" d-flex container justify-content-center align-items-center">
<h3 class="text-primary my-5">Introduce el nombre del producto:</h3>
</div>
<div class=" d-flex container justify-content-center align-items-center">
<form method="post" class=" justify-content-center align-items-center" action="verDisponibilidad.php"> 


<input type="text" class="form-control px-5 " name="nombrePlanta"   required>
<input type="submit"  class="btn btn-success mx-5 my-3" name="submit" value="Ver si está disponible"> 

</form>

</div>
</div>
<?php
}else{ 

	$N=$_POST["nombrePlanta"]; 


	

   if($N != ""){
    $consulta="SELECT * FROM plantas WHERE nombrePlanta LIKE '%$N%'";
	$paquete=$db->query($consulta);


} else {
	?>
      <div class="navbar-mx-5 VolverDerecha">
        <li>
        <a href='./verDisponibilidad.php' style='text-decoration:none;'><span style='color: white; font-size: 20px;'>&#8592; Volver</span></a>         </li>
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
        <a href='./verDisponibilidad.php' style='text-decoration:none;'><span style='color: white; font-size: 20px;'>&#8592; Volver</span></a>         </li>
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


	while($fila=$paquete->fetch_array()){ 
		
		echo"<tr>";
		//echo "<td>".$fila['idplanta'],"</td>";
		echo "<td >" . $fila['nombrePlanta'],"</td>";
		echo "<td>" .$fila['codigoPlanta'],"</td>";
		echo "<td>" .$fila['numeroEjemplares'],"</td>";
    echo "<td><img style='width:150px' src='".$fila['ruta_imagen']."'></td>";
		echo "</tr>";
	}
	
	echo '<td>Búsqueda finalizada</td>'; 
	echo "</tbody>";

echo "</table>"; 
echo "</div>";
echo "</div>";
echo "</div>";
}
include ("./template/pie.php");
$db->close();
?>