<?php
include("conexion.php");
include("./template/cabecera.php");
session_start();
/*echo "<h5 style='color:white'>" . $_SESSION['nombreCliente'] . "</h5>";*/
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];
?>
<div class="navbar-mx-5 VolverDerecha">

    <a href='../menuAdministrador.php' style='text-decoration:none;'><span
            style='color: white; font-size: 20px;'>&#8592; Volver</span></a>

</div>
</nav>

<div class="form col-lg-6 mx-0">
    <form method='POST' action='contestarMensajes.php'>
        <label for="floatingInput1">Nombre</label>
        <input type="text" class="form-control" id="floatingInput1" placeholder="Nombre">
        <label for="email">Email address</label>
        <input type="email" class="form-control email" name="email" id="email" placeholder="name@example.com">
        <label for="TextArea" class="form-label mt-4">Example textarea</label>
        <textarea class="form-control TextArea" name='TextArea' id="TextArea" rows="3"></textarea>
        <input id="caja3" type='submit' class='class="btn btn-primary my-5' name='submit' value='Enviar'>
    </form>

    <?php

    include("./template/pie.php");
    $db->close();
    ?>