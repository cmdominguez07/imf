<?php 
include("conexion.php");

include ("./template/cabecera.php");

session_start();
echo "Usuario: " . $_SESSION['nombreCliente'];
 $_SESSION['passWordCliente'];
 $_SESSION['id_cliente'];


$N=$_SESSION['nombreCliente'];

$C=$_SESSION['passWordCliente'];

$idC=$_SESSION['id_cliente'];

$contador=0;

?>


<div class="container mt-3">
 <div class="row">
  <div class="col-12">
<table class="table table-striped">
  <thead class=" thead-inverse">
    <tr>
      <th>Imagen</th>
      <th>Nombre</th>
      <th>Código</th>
    </tr>
  </thead> 
<tbody>

<?php
    $consulta= "select * from clientes_plantasreservadas where id_cliente='$idC'";
    $paquete=$db->query($consulta);



while ($fila=$paquete->fetch_array()) {
    $contador=$contador+1;

    $idplanta=$fila['idplanta'];

    ?>
   
  

  
    <tr>
    <td>
      <img width="100" src="data:image/png;base64; <?php echo base64_encode($fila['ruta_imagen'])?>">
  </td>
    <td> <?php echo $fila['nombrePlanta']?></td> 
    <td> <?php echo $fila['codigoPlanta']?></td>
 
<?php
}
?>

   </tbody>
   <div>
   </div>
   </div>
 
  <?php

   if($contador==0){

    echo ' <table>'; 
    echo "<tr>"; 
    echo "<td>No hay plantas en el carrito.</td>";
    echo "<td><br> <a href='../menuCliente/menuClientes.php' style='text-decoration:none;'><span font-size: 20px;'>&#8592;</span></a></td>"; 
    echo "</tr>"; 
    echo "</table>";
   }
  

    include ("./template/pie.php");
    $db->close();
?>