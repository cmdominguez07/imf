<?php
require("conexion.php");
require("./template/cabecera.php");
require("./template/accesibilidad.php");
session_start();
/*echo "<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];



if (!isset($_POST["submit"])) {
    ?>
    <div class="navbar-mx-2 VolverDerecha ">
        <a href='../menuAdministrador.php' style='text-decoration:none;'><span
                style='color: white; font-size: 18px;'>&#8592; Volver</span></a>
    </div>
    </nav>
 
 
<div class="container-fluid pt-5 fnd">
            <form id="form" class="form-vertical pt-5 mx-1" method="post" action="guardarPlantas.php"
                enctype="multipart/form-data" autocomplete="off" name="introducirPlanta"> 
                    <h2 class="text-primary pt-3">Introduzca producto:</h2>
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
                        <label for="precio" class="col-sm-2 control-label"> Precio (€)</label>
                        <div class="col-sm-10">
                            <input type="number" minlength="1" maxlength="5" class="form-control" id="precio" name="precio"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <legend class="mt-4">Tipo de planta</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipoPlanta" id="optionsRadios1"
                                value="Interior" checked="">
                            <label class="form-check-label" for="optionsRadios1">Interior </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipoPlanta" id="optionsRadios2"
                                value="Exterior">
                            <label class="form-check-label" for="optionsRadios2">Exterior</label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="tipoPlanta" id="optionsRadios3"
                                value="Medicinal">
                            <label class="form-check-label" for="optionsRadios3">Medicinal</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="archivo" class="col-sm-2 control-label"> Archivo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="archivo" name="archivo" accept="image/*">
                    </div>
                    <input type="submit" class="btn btn-primary my-4" name="submit" value="guardar">

            </form>
        </div>
   
    <?php

} else {
    if ($_FILES["archivo"]["error"] > 0) {
        echo "</nav>";
        echo "Error al cargar archivo";

    } else {
        $N = $_POST["nombrePlanta"];
        $T = $_POST["codigoPlanta"];
        $E = $_POST["numeroEjemplares"];
        $P = $_POST["tipoPlanta"];
        $PRE = $_POST["precio"];
        $foto = $_FILES["archivo"]["name"];
        $nameTemporal = $_FILES["archivo"]["tmp_name"];
        $id_insert = $db->insert_id;
        $ruta = 'files/' . $id_insert . '/';
        $archivo = $ruta . $_FILES["archivo"]["name"];

        $consulta = "INSERT INTO plantas (idplanta,nombrePlanta,codigoPlanta,numeroEjemplares,tipoPlanta,precio,ruta_imagen) VALUES (' ','$N','$T','$E','$P','$PRE','$archivo') ";
        $paquete = $db->query($consulta);
        ?>
        </nav>
 
        <div class="container-fluid contenido1 pt-5">

        <h3 class="pt-5 text-center">Datos agregados</h3>
    </div>
        <?php
        //$permitidos = array("image/gif", "image/png", "image/jpg"); 

        if (!file_exists($ruta)) {
            mkdir($ruta);
        }
    }

    ?>

    <meta http-equiv='Refresh'
        content='2;url=/TFG/proyectoGreen/login/usuario/menuAdministrador/adminOpciones/guardarPlantas.php'>

    <?php

}
require("./template/pie.php");
$db->close();
?>