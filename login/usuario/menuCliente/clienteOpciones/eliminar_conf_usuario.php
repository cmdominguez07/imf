<?php
include("conexion.php");

include("./template/cabecera.php");

session_start();
echo "Usuario: " . $_SESSION['nombreCliente'];
$_SESSION['passWordCliente'];
$_SESSION['id_cliente'];

$N = $_SESSION['nombreCliente'];

$C = $_SESSION['passWordCliente'];


$idC = $_SESSION['id_cliente'];


$consulta = "select * from cliente_planta where id_cliente='$idC'";
$paquete = $db->query($consulta);


$N = $_POST["nombrePlanta"];
$L = $_POST["codigoPlanta"];
$idReserva = $_POST["id_reservado"];
$contadorNumeroPlantas = $_POST["numeroEjemplares"];


$contadorNumeroPlantas = $contadorNumeroPlantas + 1;
$consulta = "UPDATE plantas SET numeroEjemplares='$contadorNumeroPlantas' WHERE idplanta='$idplanta' ";
$paquete = $db->query($consulta);

$consulta = "DELETE FROM conector WHERE id_reservado='$idReserva' ";
$paquete = $db->query($consulta);

if ($contadorNumeroPlantas == 0) {
  echo ' <table width=330> ';

  echo "<h3> >Producto eliminado del carrito</h3>";

}



include("./template/pie.php");

$db->close();
?>