<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Favicon-->
  <title>Green Leaves</title>
  <link rel="icon" type="image/x-icon" href="./img/favicon-removebg-preview.png">
  <!--link bootstrap-->
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/bootstrap.css" />
  <!--css-->
  <link rel='stylesheet' type='text/css' media='screen' href='./css/styleOpcCliente.css'>
  <!--iconos-->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <script src="./template/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div id="contenido1">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <img src="./img/1logoV.png" class="px-2" style="width:150px"></td>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
          aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active px-5" href="#caja2">Productos
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-5" href="#caja3">Contacto

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-5"
                href="/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/devolucionPlantas.php"><span
                  class="material-symbols-outlined">
                  shopping_cart
                </span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-5"
                href="/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/actualizarDatosCliente.php">Modificar
                datos</a>
            </li>
            <li class="nav-item mx-5">
              <input type="submit" class="btn btn-danger" name="cantidad" value="Eliminar cuenta"
                onclick=location.href="//localhost/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/borrarCliente.php">
            </li>
          </ul>
        </div>
        <a href=../../index.php><span style="color: white; font-size: 18px;">&#8592;Salir</span></a>
      </div>

  </div>
  </nav>
  <!--   <li>
        <input type="submit" class="btn btn-primary" name="cantidad" value="Añadir a la cesta" onclick=location.href="//localhost/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/alquilerPeli.php">
  
        </li>
        -->