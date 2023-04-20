<?php

include("./template/cabeceraIndex.php");

?>    


      <form class="d-flex mx-5">
      <a class="btn btn-secondary my-2 my-sm-0 mx-3" type="submit" name="submit" value="Login" href="usuario/loginCliente.php">Login</a>
		<a class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit" value="Nuevo usuario" onclick=location.href="usuario/guardarCliente.php">Nuevo usuario</a>
  </form>
          

</nav> 


<?php
include("./template/pieIndex.php");

?>