<?php 
include ("conexion.php"); 
include ("./template/cabeceraLoginYGuardar.php");
if (!isset($_POST["submit"]))
{ 

?>


  <form class="d-flex m-5" method="post" action="guardarCliente.php"> 
          
  
          <img  src="./img/Captura.png" class="w-25 m-5">
          <div class="row d-flex justify-content-left align-items-center mx-5 my-2">

          <h3 style="color:black"> Introduce aquí tus datos</h3>
                <label>Nombre</label>
                <input type="text" name="nombreCliente" class="form-control" placeholder="Nombre Usuario" required />
                <label>Apellido</label>
                <input type="text" name="apellidoCliente" class="form-control"  placeholder="Apellido Usuario" required />
                <label>Contraseña</label>
                <input type="password" name="passWordCliente" class="form-control" placeholder="Escribir contraseña" required />
                <br>
                <input type="submit" name="submit" class="btn btn-secondary w-25" value="Enviar">
         </div>
        </form>
<?php 


}else{ 

$N=$_POST["nombreCliente"]; 
$A=$_POST["apellidoCliente"];
$P=$_POST["passWordCliente"]; 
   
    $consulta="INSERT INTO clientesclub (id_cliente,nombreCliente,apellidoCliente,tipoCliente,passWordCliente) VALUES (' ','$N','$A','Cliente','$P') " ; 
   
    $paquete=$db->query($consulta);


    echo  '<table>';
            echo '<tr><td><h3>Datos agregados</h3><br></tr></td>';
        echo '</table>';
}

include ("./template/pieLoginYGuardar.php");
$db->close();
?>






