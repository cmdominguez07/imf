
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

if (!isset($_POST['submit'])) {

    $consulta= "select idplanta, nombrePlanta, codigoPlanta, numeroEjemplares, nombreCliente, id_reservado from cliente_planta where nombreCliente='$N' and passWordCliente='$C'";
    $paquete=$db->query($consulta);
/*group by codigoPlanta*/

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
while ($fila=$paquete->fetch_array()) { 
  $contador=$contador+1;
    echo "<form method='POST' action='devolucionPlantas.php' >"; 
 
    echo "<td><input type='hidden' name='idplanta' value='".$fila['idplanta']."' readonly class='form-control-plaintext'> </td>"; 
    echo "<td><input
     type='text' name='nombrePlanta' value='".$fila['nombrePlanta']."'readonly class='form-control-plaintext'></td>"; 
    echo "<td><input
     type='text' name='codigoPlanta' value='".$fila['codigoPlanta']."'readonly class='form-control-plaintext'></td>";
    echo "<td><input
     type='hidden' name='numeroEjemplares' value='".$fila['numeroEjemplares']."'readonly  class='form-control-plaintext'></td>";
    echo "<td><input
     type='text' style='width:15px' name='id_reservado' value='".$fila['id_reservado']."'readonly  class='form-control-plaintext'></td>";
    echo "<td>"," <input type='submit' class='btn btn-danger' name='submit' value='Eliminar de la cesta'>"," </td>"; 
  
    echo "</form>"; } 

  
   
        }
    else {      
         $contadorNumPlantas=$_POST["numeroEjemplares"];
         $contador=$contador+1;
        $contadorNumPlantas=$contadorNumPlantas+1;
    
         $I=$_POST["idplanta"]; 
        $N=$_POST["nombrePlanta"]; 
        $L=$_POST["codigoPlanta"];
        $idAlqu=$_POST["id_reservado"];

        $consulta="UPDATE plantas SET numeroEjemplares='$contadorNumPlantas' WHERE idplanta='$I' "; 
        $paquete=$db->query($consulta);
       

          $consulta= "DELETE FROM conector WHERE id_reservado='$idAlqu' ";
          $paquete=$db->query($consulta);
  


 echo ' <table width=330> ';

        echo "<h3>Producto Devuelto</h3>";
    
      } 

       
      if($contador==0){
   
        echo ' <table class="table table-striped">'; 
        echo "<tr>"; 
        echo "<td>No hay plantas en el carrito.</td>";
        echo "</tr>"; 
        echo "</tbody>";
  echo "</table>"; 

   
       }
    
        include ("./template/pie.php");

        $db->close();

?>