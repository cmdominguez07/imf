<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Favicon-->
  <title>Green Leaves</title>
  <link rel="icon" type="image/x-icon" href="../img/favicon-removebg-preview.png">
  <!--link bootstrap-->
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/bootstrap.css" />
  <!--css-->
  <link rel='stylesheet' type='text/css' media='screen' href='./css/style1.css'>
  <!--iconos-->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $_SESSION['id_cliente']; ?> &currency=€"></script>
  <!--js-->
  <script src="./template/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div id="contenido1">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-3">
      <div class="container-fluid">
        <img src="../img/1logoV.png" style="width:150px"></td>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
          aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-5" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active mx-5" href="#">Menú para el cliente
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
      </div>