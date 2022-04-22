<?php
// Classe controleur principal
namespace ABI\controller;

class Controller
{
    

    public static function viewPage($url)
    {
        require $url;
    }
    
    
    public static function logOut()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location:./index.php');
    }
  
}

?>