<?php
//el siguiente arreglo contiene todo el codigo que nos permite autenticarnos con las apis
  return

  array(
    "base_url" => "http://localhost/programaciondinamica/TpLibreriasUtiles/callback.php",
    "providers" => array(
      "Facebook" => array(
        "enabled" => true,
        "keys" => array(
          "id" =>"910517176456612",
          "secret" =>"069f9376e1d5d2d98923d921a109cf36"
        ),
        "scope" => "email"
      ),
      "Google" => array(
        "enabled" => true,
        "keys" => array(
          "id" => "1068146243618-2t9dlp6ac7co0336f7n79pii6ubqmmsr.apps.googleusercontent.com",
          "secret" => "oQGG32gF3VorKS73lYan9xCG"
        )
        ),
        "Twitter" => array(
          "enabled" => true,
          "keys" => array(
            "key" => "PLnQeErBb3zPv35VCUyLTU6zn",
            "secret" => "ecycqWbk2Ag66bfpKMDJXfgEutzf8IMaeHu4v6fML9fzg3BMqg"
          ),
          "includeEmail" => true
          )


      )
    
  )

 ?>
