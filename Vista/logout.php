<?php

  session_start();

  require_once('../control/Auth.php');

  Auth::logout();

  //redirect user
  header('Location: index.php');  

 ?>
