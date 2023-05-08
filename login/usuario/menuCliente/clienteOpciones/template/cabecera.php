<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/bootstrap.css" />
  <link rel='stylesheet' type='text/css' media='screen' href='./css/style1.css'>
  <link rel="icon" type="image/x-icon" href="./img/imagesFavicon.png">
  <!--iconos-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $_SESSION['id_cliente']; ?> &currency=€"></script>

  <script src="./template/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div id=" container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <img src="./img/1logoV.png" class="mx-2" style="width:150px"></td>
        <div class="navbar-mx-5" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <p class="nav-link active mx-5">Menú
              <span class="visually-hidden">(current)</span>
            </p>
        </div>