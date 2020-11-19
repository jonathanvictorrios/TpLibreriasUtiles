<?php
include_once("estructura/cabecera.php");
require_once("../vendor/autoload.php") ;
require_once("../Control/Auth.php");

?>


<html>

<hr>
<div class="container">

    <div class="row text-center" >
        <div  class="col-md-12 " >
            <a href="Facebook.php?login=Facebook" class="align-center btn btn-social btn-facebook "><span class="fa fa-facebook"></span>Inicia sesion con Facebook</a>
        </div>
        
    </div>
    
    <hr>
    <div class="row text-center">
        <div class="col-md-12 ">
            <a href="Google.php?login=Google" class="btn btn-social  btn-google"><span class="fa fa-google"></span>Inicia sesion con Google</a>
        </div>
    </div>
    <hr>
    <div class="row text-center">
        <div class="col-md-12">
            <a href="Twitter.php?login=Twitter" class="btn btn-social btn-twitter"><span class="fa fa-twitter"></span>Inicia sesion con Twitter</a>
        </div>
    </div>

    <hr>
    

    
</div>
</html>

<?php
include_once("estructura/pie.php");
?>

