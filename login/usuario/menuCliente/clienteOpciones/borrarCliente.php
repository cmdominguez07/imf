<?php 
include("conexion.php");

include ("./template/cabecera1.php"); 
session_start();
echo "<h5 style='color:white'>". $_SESSION['nombreCliente'] . "</h5>";
 $_SESSION['passWordCliente'];
 $_SESSION['id_cliente'];

$N=$_SESSION['nombreCliente'];

$C=$_SESSION['passWordCliente'];

?>

</nav>
<div class="container mt-3">
 <div class="row">
  <div class="col-12">
<table class="table table-striped">
  <thead class=" thead-inverse">
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>tipo</th>
      <th>Contraseña</th>
    </tr>
  </thead> 
<tbody>


<?php
    $consulta= "select * from clientesclub WHERE nombreCliente='$N' and passWordCliente='$C'"; 
    $paquete=$db->query($consulta);

while ($fila=$paquete->fetch_array()) { 
    ?>

<td> <?php echo $fila['id_cliente']?></td> 
    <td> <?php echo $fila['nombreCliente']?></td>
    <td> <?php echo $fila['tipoCliente']?></td> 
    <td> <?php echo $fila['passWordCliente']?></td>
  <td><input type='submit' class='btn btn-danger' name='submit' value='Borrar'></td>
 <td> <a href='../menuClientes.php' style='text-decoration:none;'><span font-size: 30px;'>&#8592;</span></a>Volver</a></td>

 <?php
}
?>

   </tbody>
   <div>
   </div>
   </div>
 <?php
      if (isset($_POST['submit'])){     
    $I=@$_POST["id"]; $consulta="DELETE FROM clientesclub WHERE id_cliente='$I' "; 
        $paquete=$db->query($consulta);
    
echo "<h4 >Cuenta eliminada</h4>";
 echo "<tr><td> <a href='../../../index.php' style='text-decoration:none;'><span font-size: 30px;'>&#8592;</span></a>Menú principal</a></td></tr>";
 } 

 include ("./template/pie.php");

 $db->close();
?>