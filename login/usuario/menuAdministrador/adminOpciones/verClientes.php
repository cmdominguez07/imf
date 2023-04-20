<?php
session_start();
include ("conexion.php");
include ("./template/cabecera.php");


echo '<input type="submit" class="btn btn-success" name="cantidad" value="consultar" onclick=location.href="//localhost/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/verDisponibilidadCliente.php">';
 

/*echo "<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";*/
 $_SESSION['passWordCliente'];
 $_SESSION['id_cliente'];


$consulta="select * from clientesclub";
$paquete=$db->query($consulta);

?>
   <div class="navbar-mx-5 VolverDerecha">
        <li>
        <a href='../menuAdministrador.php' style='text-decoration:none;'><span style='color: white; font-size: 20px;'>&#8592; Volver</span></a>         </li>
        </li>
     
    </div>
    
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
          <th>Contraseña</th>
        </tr>
      </thead> 
    <tbody>


      <?php
	while($fila=$paquete->fetch_array()){ 


		if($fila['tipoCliente']=='Cliente'){
		

		echo"<tr>";
		echo "<td>" . $fila['id_cliente'],"</td>";
		echo "<td>" . $fila['nombreCliente'],"</td>";
		echo "<td>" . $fila['passWordCliente'],"</td>";
	
		echo "</tr>";
	}
}

?>
  <tbody>
</table>
</div></div></div>

<?php
	 
	echo "</table></div>";
	
	include ("./template/pie.php");
	$db->close();
?>