<?php
include_once("estructura/cabecera.php");
require_once("../vendor/autoload.php") ;
require_once("../Control/Auth.php");
session_start();
?>
<html>
<hr>
<div class="container">

<?php
$infoUsuario=Auth::getUserAuth();

?>


<h2 class="text-center">Hola    
    <?php
    echo $_SESSION['user']['nombre'];
    ?>
</h2>
<div class="container ">
<form id="formTwitter" name="formTwitter" method="get" action="accionTwitter.php">
    <div class="row text-center">
        
    <div class="col-md-12">
        
        Ingrese un comentario a postear
        </div>
        <div class="col-md-12">
                

                <textarea id="comentario" name="comentario">
                
                </textarea>
        </div>
        <div class="col-md-12">
            <input type="submit" name="Enviar" value="Enviar">
        </div>
        
        
    </div>
    </form>
    <div class="row text-center">
        <div class="col-md-12 ">
            <a class="btn btn-Dark" href="logout.php" role="button">Cerrar Sesion</a>
        </div>
    </div>

    <hr>
    
</div>
<h3 class="text-center">Arreglo devuelto por la app de la red social</h3>
<div class="card">
  <div class="card-body bg-info">
  <?php
var_dump($infoUsuario);?>
  </div>
</div>

<hr>

</html>

<?php
include_once("estructura/pie.php");
?>
