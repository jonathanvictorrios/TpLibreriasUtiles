<?php
include_once("estructura/cabecera.php");
require_once("../vendor/autoload.php") ;
require_once("../Control/Auth.php");

?>

<?php 
$datos = data_submitted();
$objAuth=new Auth();
$comentario=$datos["comentario"];
echo $comentario;
$objAuth->setEstadoUsuario("Facebook");

?>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-4">
        <h2>Mensaje enviado con exito</h2>
        
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
        <a class="btn btn-Dark" href="Twitter.php" role="button">Volver Atras</a>
        </div>
    </div>
    <hr>
    <div class="row text-center">
        <div class="col-md-12">
    <h2 class="text-center">Ultima actividad:</h2>
    <?php
    Auth::getActividadUsuario("Facebook");
    ?>
        </div>
    </div>
</div>





<?php
include_once("estructura/pie.php");
?>