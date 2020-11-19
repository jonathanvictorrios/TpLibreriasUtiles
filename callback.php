
<?php

  require_once('vendor/autoload.php');
//Cuando la pagina nos redireccione , preguntamos si ya hay una peticion en proceso
//o si la peticion ya termino
  if (isset($_REQUEST['hauth_start']) || isset($_REQUEST['hauth_done']))
  {
    //este metodo lo que hace es procesar la peticion cuando inicia o cuando termina
    Hybrid_Endpoint::process();
  }

 ?>
 
