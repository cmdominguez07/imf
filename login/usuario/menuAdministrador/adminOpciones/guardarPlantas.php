<?php
include("conexion.php");
include("./template/cabecera.php");
session_start();
/*echo "<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];



if (!isset($_POST["submit"])) {
    ?>
    <div class="navbar-mx-5 VolverDerecha">
        <li>
            <a href='../menuAdministrador.php' style='text-decoration:none;'><span
                    style='color: white; font-size: 20px;'>&#8592; Volver</span></a>
        </li>
        </li>

    </div>


    </nav>

    <form class="form-horizontal mx-3" method="post" action="guardarPlantas.php" enctype="multipart/form-data"
        autocomplete="off">

        <table>
            <h2 class="text-primary mt-4">Introduzca producto:</h2>

            <div class="form-group">
                <label for="nombrePlanta" class="col-sm-2 control-label"> Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombrePlanta" name="nombrePlanta" required>

                </div>
            </div>

            <div class="form-group">
                <label for="codigoPlanta" class="col-sm-2 control-label"> Código</label>
                <div class="col-sm-10">
                    <input type="number" minlength="2" maxlength="4" class="form-control" id="codigoPlanta"
                        name="codigoPlanta" required>
                    <p>Máximo de 9999</p>
                </div>
            </div>

            <div class="form-group">
                <label for="numeroEjemplares" class="col-sm-2 control-label"> Cantidad</label>
                <div class="col-sm-10">
                    <input type="number" minlength="1" maxlength="3" class="form-control" id="numeroEjemplares"
                        name="numeroEjemplares" required>
                    <p>Cantidad válida entre 0 y 999</p>

                </div>
            </div>
            <div class="form-group">
                <label for="tipoPlanta" class="col-sm-2 control-label"> Tipo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tipoPlanta" name="tipoPlanta"
                        pattern="Interior|Exterior|Medicinal" required>


                </div>
            </div>

            <div class="form-group">
                <label for="archivo" class="col-sm-2 control-label"> Archivo</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="archivo" name="archivo" accept="image/*">

                </div>
            </div>

            <input type="submit" class="btn btn-primary my-3" name="submit" value="guardar">
        </table>
    </form>


    <?php

} else {
    if ($_FILES["archivo"]["error"] > 0) {

        echo "Error al cargar archivo";
    } else {
        $N = $_POST["nombrePlanta"];
        $T = $_POST["codigoPlanta"];
        $E = $_POST["numeroEjemplares"];
        $P = $_POST["tipoPlanta"];
        $foto = $_FILES["archivo"]["name"];
        $nameTemporal = $_FILES["archivo"]["tmp_name"];
        $id_insert = $db->insert_id;
        $ruta = 'files/' . $id_insert . '/';
        $archivo = $ruta . $_FILES["archivo"]["name"];




        $consulta = "INSERT INTO plantas (idplanta,nombrePlanta,codigoPlanta,numeroEjemplares,tipoPlanta,ruta_imagen) VALUES (' ','$N','$T','$E','$P','$archivo') ";
        $paquete = $db->query($consulta);






        //$permitidos = array("image/gif", "image/png", "image/jpg"); 

        if (!file_exists($ruta)) {
            mkdir($ruta);
        }


        /*   if(!file_exists($archivo)){
        $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
        if($resultado){
        echo "Archivo guardado";
        }else{
        echo "Error al guardar el archivo";
        }
        }else{
        echo "El archivo ya existe";
        }*/
    }


    echo '<h3>Datos agregados</h3>';
    echo "<a href='./guardarPlantas.php' style='text-decoration:none;'><span style='color: white; font-size: 20px;'>&#8592; Volver</span></a></li>";
}
include("./template/pie.php");
$db->close();
?>


<!--else
{ 
      


if (isset($_POST['nombrePlanta']))
{
    $N= $_POST['nombrePlanta'];            
}
if (isset($_POST['codigoPlanta']))
{
    $T= $_POST['codigoPlanta'];            
}  
if (isset($_POST['numeroEjemplares']))
{
    $E= $_POST['numeroEjemplares'];            
}  
if (isset($_POST['tipoPlanta']))
{
    $P= $_POST['tipoPlanta'];            
} 

 
if (is_uploaded_file($_FILES["archivo"]["tmp_name"]))

{

    # verificamos el formato de la imagen

    if ($_FILES["archivo"]["type"]=="image/jpeg" || $_FILES["archivo"]["type"]=="image/jpg" || $_FILES["archivo"]["type"]=="image/gif" || $_FILES["archivo"]["type"]=="image/bmp" || $_FILES["archivo"]["type"]=="image/png")
    {

           # Escapa caracteres especiales
          $archivo=$_FILES["archivo"]["tmp_name"];
 

    

        $consulta="INSERT INTO plantas (idplanta,nombrePlanta,codigoPlanta,numeroEjemplares,tipoPlanta,ruta_imagen) VALUES (' ','$N','$T','$E','$P','$archivo') " ; 
        $paquete=$db->query($consulta);

        # Mostramos la imagen agregada

         echo "Imagen agregada";
         
   

    }else{

       echo "Error El formato de archivo tiene que ser JPG, GIF, BMP o PNG";
     

    }

}


*/-->