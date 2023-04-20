<?php 
include("conexion.php");
include ("./template/cabecera.php");

session_start();
echo "Usuario: " . $_SESSION['nombreCliente'];
 $_SESSION['passWordCliente'];
 $_SESSION['id_cliente'];


$NombreC=$_SESSION['nombreCliente'];

$C=$_SESSION['passWordCliente'];

$idC=$_SESSION['id_cliente'];

     


if (!isset($_POST['submit'])) { 
    $consulta= $consulta= "SELECT * FROM `plantas` WHERE plantas.TipoPlanta='Medicinal'"; 
    $paquete=$db->query($consulta);
 
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
    echo "<form method='POST' action='reservaPlantaMedicinal.php' >"; 
    echo "<tr>"; 
    echo "<td> <input  type='hidden' name='idplanta' value='".$fila['idplanta']."' readonly class='form-control-plaintext'> </td>"; 
    echo "<td >".$fila['nombrePlanta']."</td>"; 
    echo "<td ><input  type='text' name='codigoPlanta' value='".$fila['codigoPlanta']."' readonly class='form-control-plaintext'></td>";
    echo "<td ><input  type='text' name='numeroEjemplares' value='".$fila['numeroEjemplares']."' readonly class='form-control-plaintext'></td>";
    echo "<td>"," <input type='submit' class='btn btn-primary' name='submit' value='Añadir a la cesta'>"," </td>"; 
    echo "</tr>"; 
    echo "</form>"; } 

    echo "</table>"; 
     echo "<br>";

    


} else {      


         $contadorNumPlantas=$_POST["numeroEjemplares"];
         $I=$_POST["idplanta"]; 

         $consulta= "select * from plantas WHERE idplanta='$I'"; 
         $paquete=$db->query($consulta);
         //$paquete=mysqli_query($conexion, $consulta);


while ($fila=$paquete->fetch_array()) { 
      
        
         $N=$fila['nombrePlanta'];
         $L=$fila['codigoPlanta'];
  }
        if($contadorNumPlantas>0){
 
        $contadorNumPlantas=$contadorNumPlantas-1;
    
       
        $consulta="UPDATE plantas SET numeroEjemplares='$contadorNumPlantas' WHERE idplanta='$I' "; 
        $paquete=$db->query($consulta);
        //$paquete=mysqli_query($conexion, $consulta);

        $consulta="select * from plantas WHERE idplanta='$I' "; 
        $paquete=$db->query($consulta);
        //$paquete=mysqli_query($conexion, $consulta);


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
        echo "<td><h4 >Planta reservada: </h4></td><br>";
        echo "<td >" . "$N" . "</td>";
        echo "<td> " . "$L" . "</td>";

        echo "</tr>";
          echo "</table>";

        

        $consulta = "INSERT INTO conector (f_idplanta, f_idCliente) VALUES ('$I', '$idC')";
        $paquete=$db->query($consulta);
        //$paquete=mysqli_query($conexion, $consulta);

      
    } else{

  echo '  <table width=400>';
            echo "<tr><td > El producto que has elegido no está disponible.</td></tr>";
            echo "<td> <a href='../menuCliente/menuClientes.php' style='text-decoration:none;'><span font-size: 20px;'>&#8592;</span></a></td>";
                 echo "</table>"; 
        }
} 

include ("./template/pie.php");

$db->close();
?>