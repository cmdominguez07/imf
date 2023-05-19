<?php
session_start();
require("conexion.php");
require("./template/cabecera.php");
require("./template/accesibilidad.php");

$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];
$NombreC = $_SESSION['nombreCliente'];
$C = $_SESSION['passWordCliente'];
$idC = $_SESSION['id_cliente'];
$cnt = 0;

if (isset($_POST["buscar"])) {

    $N = $_POST["nombrePlanta"];

    if ($N != "") {
        $consulta = "SELECT * FROM plantas WHERE nombrePlanta LIKE '%$N%' AND TipoPlanta='Medicinal'";
        $paquete = $db->query($consulta);
    }
}
?>
<a href="../menuClientes.php" style="text-decoration:none;"><span style="color: white; font-size: 18px;">&#8592;
        Volver</span></a>
</div>
</nav>
<?php
if (!isset($_POST['Reservar'])) {
    ?>
    <div class="container-fluid row contenido1 p-3">
        <table class="table table-striped pt-3 px-2">
            <thead class="thead-inverse pt-5">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Precio</th>
                    <th>Tipo</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($fila = $paquete->fetch_array()) {
                    $cnt = $cnt + 1;
                    ?>
                    <form method='POST' action='buscadorPlantaMedicinal.php'
                        class="container-fluid d-flex justify-content-center align-items-center p-3 mt-2">
                        <tr>
                            <td> <input type='text' name='idplanta' value='<?php echo $fila['idplanta']
                            ; ?>' readonly class='form-control-plaintext'> </td>
                            <td><input type='text' name='nombre' value='<?php echo $fila['nombrePlanta']
                            ; ?>' readonly class='form-control-plaintext'></td>
                            <td><input type='text' name='codigo' value='<?php echo $fila['codigoPlanta']
                            ; ?>' readonly class='form-control-plaintext'></td>
                            <td><input type='text' name='precio' value='<?php echo $fila['precio']
                            ; ?>' readonly class='form-control-plaintext'></td>
                            <td><input type='text' name='TipoPlanta' value='<?php echo $fila['TipoPlanta']
                            ; ?>' readonly class='form-control-plaintext'></td>
                            <td><input type='text' name='numeroEjemplares' value='<?php echo $fila['numeroEjemplares']
                            ; ?>' readonly class='form-control-plaintext'></td>
                            <td><img style='width:100px' src='../../menuAdministrador/adminOpciones/<?php
                            echo $fila['ruta_imagen']; ?> '></td>
                            <td>
                                <input type='submit' name='Reservar' value='Añadir al carrito' class='btn btn-info'>
                            </td>
                        </tr>
                        <?php
                }
                ?>
                </form>
            </tbody>
        </table>
        <?php
        if ($cnt == 0) {
            ?>

            <h3 class="text-center pt-5">Búsqueda finalizada</h3>
        </div>
        </div>

        <meta http-equiv="Refresh"
            content="1;url=/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/reservaPlantaMedicinal.php">
        <?php
        }
} else {

    $contadorNumPlantas = $_POST["numeroEjemplares"];
    $I = $_POST["idplanta"];
    ?>

    <?php
    $consulta = "select * from plantas WHERE idplanta='$I'";
    $paquete = $db->query($consulta);

    while ($fila = $paquete->fetch_array()) {

        $N = $fila['nombrePlanta'];
        $L = $fila['codigoPlanta'];
        $T = $fila['TipoPlanta'];
        $P = $fila['precio'];
        $R = $fila['ruta_imagen'];
    }
    if ($contadorNumPlantas > 0) {

        $contadorNumPlantas = $contadorNumPlantas - 1;
        $consulta = "UPDATE plantas SET numeroEjemplares='$contadorNumPlantas' WHERE idplanta='$I' ";
        $paquete = $db->query($consulta);

        ?>
        <div class="container-fluid row contenido1 p-3">
            <table class="table table-striped pt-3 px-2">
                <thead class="thead-inverse pt-5">
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Tipo</th>
                        <th>Precio</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <td>
                        <h4>Añadida al carrito: </h4>
                    </td>
                    <td>
                        <?php echo "$N"; ?>
                    </td>
                    <td>
                        <?php echo "$L"; ?>
                    </td>
                    <td>
                        <?php echo "$T"; ?>
                    </td>
                    <td>
                        <?php echo "$P"; ?>
                    </td>
                    <td>
                    <td><img style='width:100px' src='../../menuAdministrador/adminOpciones/<?php echo $R; ?>'>
                    </td>
                    </tr>
                <tbody>
            </table>
        </div>
        <meta http-equiv="Refresh"
            content="1;url=/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/reservaPlantaMedicinal.php">
        <?php
        $consulta = "INSERT INTO conector (f_idplanta, f_idCliente) VALUES ('$I', '$idC')";
        $paquete = $db->query($consulta);
    } else {
        ?>
        <div class="container-fluid contenido1">
            <h3 class="text-center pt-5">No disponible</h3>
            <meta http-equiv="Refresh"
                content="1;url=/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/reservaPlantaMedicinal.php">
        </div>
        </div>
        <?php
    }
}
require("./template/pie.php");
$db->close();
?>