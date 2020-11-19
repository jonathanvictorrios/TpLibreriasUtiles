<?php

  class Auth
  
  {
    
    protected static $allow = ['Facebook', 'Twitter', 'Google'];

    protected static function issetRequest()
    {
      if(isset($_GET['login'])){
        if(in_array($_GET['login'], self::$allow)){
          return true;
        }
      }
      return false;
    }

    public static function getUserAuth()
    {
      if(self::issetRequest())
      {
        $service = $_GET['login'];

        $hybridAuth = new Hybrid_Auth(__DIR__ . '\config.php');

        $adapter = $hybridAuth->authenticate($service);

        $userProfile = $adapter->getUserProfile();
        self::login($userProfile);
        //header('Location: index.php');
        return $userProfile;
        
      }
    }
 
    public static function setEstadoUsuario($redSocial){
      $hybridauth = new Hybrid_Auth(__DIR__ . '\config.php');
      
      $adapter = $hybridauth->authenticate($redSocial);
      switch($redSocial){
      case "Twitter":
        $adapter->setUserStatus($_GET['comentario']);break;
      case "Facebook":
        $adapter->setUserStatus( "Hi there! this is just a random update to test some stuff" );
        break;
      }

    }
    public static function getActividadUsuario($redSocial){

      $hybridauth = new Hybrid_Auth(__DIR__ . '\config.php');
      $adapter = $hybridauth->authenticate($redSocial);
      $user_timeline = $adapter->getUserActivity( "timeline" );
      foreach( $user_timeline as $item ){
        echo $item->user->displayName . ": " . $item->text . "<hr />";
     }
     
    
     // grab ONLY the user latest activity
     $user_timeline = $adapter->getUserActivity( "me" );
    
     // iterate over the user latest activity
     foreach( $user_timeline as $item ){
        echo $item->user->displayName . ": " . $item->text . "<hr />";
     }


    }
    public static function getContactosUsuario($redSocial){
        // init hybridauth
        $hybridauth = new Hybrid_Auth(__DIR__ . '\config.php');
 
        // try to authenticate with twitter
        $adapter = $hybridauth->authenticate("Twitter");
      
        // grab the user's friends list
        $user_contacts = $adapter->getUserContacts();
      
        // iterate over the user friends list
        foreach( $user_contacts as $contact ){
          echo $contact->displayName . " " . $contact->profileURL . "<hr />";
        }
    }
    public static function isLogin()
    {
      return (bool) isset($_SESSION['user']);
    }

    protected static function login($user)
    {
      $hybridAuth = new Hybrid_Auth(__DIR__ . '\config.php');
      $redSocial=$hybridAuth->getCurrentUrl();
      
      
      
      $user=array(
        "nombre"=>$user->firstName,
        "email"=>$user->email,
        
      );
      $_SESSION['user'] = $user;
    }

    public static function logout()
    {
      if(self::isLogin()){
        unset($_SESSION['user']);
      }
    }

  }
 ?>
