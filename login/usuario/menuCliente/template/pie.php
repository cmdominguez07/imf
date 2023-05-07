<p id="pInicio" class="text-left" style="color:grey">Ut sed quam lacinia, aliquet orci pretium, fringilla justo. Cras
  volutpat orci ut viverra convallis. Etiam malesuada sodales risus sit amet sollicitudin. Integer hendrerit mauris
  felis, ut malesuada metus tincidunt vitae. Donec ac sodales ligula, at imperdiet erat. Aenean rutrum aliquet magna sit
  amet viverra. Quisque sodales, orci at euismod laoreet, justo lectus consequat nulla, quis luctus leo sapien at
  libero. Donec ligula ipsum, imperdiet ut tellus bibendum, maximus vestibulum est. Mauris vel justo sed felis iaculis
  tristique ac eu urna. Cras feugiat condimentum tortor, quis tempor est hendrerit nec. Sed quis leo vel leo sodales
  rutrum. Mauris iaculis id lorem ac efficitur. Fusce consequat nibh tellus. Cras ultrices sed odio et maximus. Ut
  dignissim mattis diam at ullamcorper.

  Phasellus at molestie turpis. Mauris nisi metus, dapibus eget tincidunt vitae, convallis eget dui. Nunc vel turpis
  augue. Duis eget aliquet orci, ut rhoncus magna. Etiam sagittis leo a ligula euismod posuere. Morbi pretium, tortor id
  eleifend lobortis, erat libero dictum ipsum, at eleifend magna velit quis dolor. Vestibulum commodo volutpat arcu
  sodales sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
  Suspendisse laoreet feugiat risus, non placerat libero fringilla ac. Proin placerat orci eros, quis gravida purus
  consectetur sit amet. Nulla a lacus pretium sapien ultrices congue. Integer viverra lacinia nisi id lobortis.
  Vestibulum sed tincidunt dolor, at faucibus metus. Ut sed quam lacinia, aliquet orci pretium, fringilla justo. Cras
  volutpat orci ut viverra convallis. Etiam malesuada sodales risus sit amet sollicitudin. Integer hendrerit mauris
  felis, ut malesuada metus tincidunt vitae. Donec ac sodales ligula, at imperdiet erat. Aenean rutrum aliquet magna sit
  amet viverra. Quisque sodales, orci at euismod laoreet, justo lectus consequat nulla, quis luctus leo sapien at
  libero. Donec ligula ipsum, imperdiet ut tellus bibendum, maximus vestibulum est. Mauris vel justo sed felis iaculis
  tristique ac eu urna. Cras feugiat condimentum tortor, quis tempor est hendrerit nec. Sed quis leo vel leo sodales
  rutrum. Mauris iaculis id lorem ac efficitur. Fusce consequat nibh tellus. Cras ultrices sed odio et maximus. Ut
  dignissim mattis diam at ullamcorper.

  Phasellus at molestie turpis. Mauris nisi metus, dapibus eget tincidunt vitae, convallis eget dui.</div>
  </div>
  <br>

<div class="container-fluid ">

  <div class="container-fluid">
    <h2 id="caja2" class="text-secondary text-center">Nuestros productos</h2>
  </div>
  <div class=" row d-flex m-5 d-flex justify-content-center align-items-center">

    <div class=" col-lg-4 card text-white bg-primary mb-3 mx-2" style="max-width: 20rem;">
      <div class="card-header d-flex justify-content-center"> <img style="width:150px" src="img/nenufarFavicon1.jpg"
          alt=""></div>
      <div class="card-body">
        <h4 class="card-title d-flex justify-content-center">Plantas de interior</h4>
        <div class="justify-content-center">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>

          <input type="submit" class="btn btn-secondary" name="catalogo" value="Ver catálogo"
            onclick=location.href="//localhost/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/reservaPlantaInterior.php">
        </div>
      </div>
    </div>
    <div class=" col-lg-4 card text-white bg-primary mb-3 mx-2" style="max-width: 20rem;">
      <div class="card-header d-flex justify-content-center"> <img style="width:150px" src="img/nenufarFavicon1.jpg"
          alt=""></div>
      <div class="card-body">
        <h4 class="card-title d-flex justify-content-center">Plantas de exterior</h4>
        <div class="justify-content-center">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>

          <input type="submit" class="btn btn-secondary" name="catalogo" value="Ver catálogo"
            onclick=location.href="//localhost/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/reservaPlantaExterior.php">
        </div>
      </div>
    </div>
    <div class=" col-lg-4 card text-white bg-primary mb-3 mx-2" style="max-width: 20rem;">
      <div class="card-header d-flex justify-content-center"> <img style="width:150px" src="img/nenufarFavicon1.jpg"
          alt=""></div>
      <div class="card-body">
        <h4 class="card-title d-flex justify-content-center">Plantas medicinales</h4>
        <div class="justify-content-center">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>

          <input type="submit" class="btn btn-secondary" name="catalogo" value="Ver catálogo"
            onclick=location.href="//localhost/TFG/proyectoGreen/login/usuario/menuCliente/clienteOpciones/reservaPlantaMedicinal.php">
        </div>
      </div>
    </div>
  </div>
</div>



<div class="container-fluid d-flex m-0">
  <div class="col-lg-6">
    <h1 class="mt-5">Contacto</h1>
    <p class="text-primary text-left m-0">Ut sed quam lacinia, aliquet orci pretium,eget aliquet orci, ut rhnt dolor, at
      faucibus metus iquet orci pretium,eget aliquet orci, ut rhnt dolor, at faucibus metus iquet orci pretium,eget
      aliquet orci, ut rhnt dolor, at faucibus metus
      iquet orci pretium,eget aliquet orci, ut rhnt dolor, at faucibus metus.</p>
  </div>
  <?php
  if (!isset($_POST["submit"])) {
    ?>
    <div class="form col-lg-6 mx-0">
      <form method='POST' action='menuClientes.php' name="msgMail">
      <br><label for="floatingInput1">Nombre</label>
        <input type="text" name="nombreMail" class="form-control" id="floatingInput1" placeholder="Nombre">


        <br><label for="email">Email address</label>
        <input type="email" class="form-control email" name="email" id="email" placeholder="name@example.com">



        <br><label for="TextArea" class="form-label mt-4">Aquí su consulta</label>
        <textarea class="form-control TextArea" name='TextArea' id="TextArea" rows="3"></textarea>
        <input id="caja3" type='submit' class='class="btn btn-primary my-5' name='submit' value='Enviar'>

      </form>


      <?php




  } else {
    $idC = $_SESSION['id_cliente'];
    $NC = $_SESSION['nombreCliente'];

    $textoMensaje = $_POST["TextArea"];
    $email = $_POST['email'];

    $consulta = "INSERT INTO mensajes (id_mensaje,email,mensaje,fid_cliente,nombre_cliente_msj) VALUES (' ','$email','$textoMensaje','$idC','$NC') ";
    $paquete = $db->query($consulta);
    echo "mensaje enviado";
    echo "<meta http-equiv='Refresh' content='0.4;url=/TFG/proyectoGreen/login/usuario/menuCliente/menuClientes.php'>";
  }



  ?>
  </div>

</div>

<footer id="footer" class="bg-light text-center text-white m-0">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="m-4 p-0">
        <!-- RRSS -->

        <ul class="socialIcons">
          <li class="facebook"><a href="#"><i class="fa fa-fw fa-facebook"></i>Facebook</a></li>
          <li class="twitter"><a href=""><i class="fa fa-fw fa-twitter"></i>Twitter</a></li>
          <li class="instagram"><a href=""><i class="fa fa-fw fa-instagram"></i>Instagram</a></li>
          <li class="pinterest"><a href=""><i class="fa fa-fw fa-pinterest-p"></i>Pinterest</a></li>
          <li class="steam"><a href=""><i class="fa fa-fw fa-steam"></i>Steam</a></li>
        </ul>

      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 m-0 bg-primary ">
      © 2023 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">Cristina Martín Domínguez</a>
    </div>
    <!-- Copyright -->
</footer>
<script src="./template/jquery-validation-1.19.5/dist/jquery.validate.min.js"></script>
  <script src="./template/jquery-validation-1.19.5/dist/additional-methods.js"></script>
<script src="./template/formValidationMsg.js"></script>
</body>

</html>