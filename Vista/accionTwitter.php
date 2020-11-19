<?php
include_once("estructura/cabecera.php");
require_once("../vendor/autoload.php") ;
require_once("../Control/Auth.php");

?>

<?php 
$datos = data_submitted();
$objAuth=new Auth();
$comentario=$datos["comentario"];
$objAuth->setEstadoUsuario("Twitter");

?>
<hr>
<div class="container ">
    <div class="row text-center">
        <div class="col-md-12">
        <h2 class="text-center">Mensaje posteado con exito</h2>
        
        </div>
    </div>
    <hr>
    <div class="row text-center">
        <div class="col-md-12">
        <a class="btn btn-Dark" href="Twitter.php" role="button">Volver Atras</a>
        </div>
    </div>
    <hr>
    <div class="row text-center">
        <div class="col-md-12">
            <h2 class="text-center">Ultima actividad:</h2>
            <?php
            Auth::getActividadUsuario("Twitter");
            ?>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
        <h2 class="text-center">Contactos:</h2>
        <?php
            Auth::getContactosUsuario("Twitter");
            ?>
        </div>
    </div>
</div>





<?php
include_once("estructura/pie.php");
?>
