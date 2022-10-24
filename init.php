<?php
   session_start() ; 
   ini_set('display_errors', 'On') ;
   error_reporting(E_ALL) ; 

   include_once "connect_data_base.php" ; 

    $css = "./assets/css/" ; 
    $js = "./assets/js/" ; 
    $tmp = "./inc/template/" ; 
    $lang = "./inc/language/" ; 
    $img = "./assets/images/" ; 

    if(!isset($_GET['lang'])){
        $_SESSION['lang'] = 'en' ; 
    }else{
        $_SESSION['lang'] = $_GET['lang'] ; 
    }

    include_once $lang . $_SESSION['lang'] . ".php" ; 


    include_once $tmp."header.php" ; 
    

?>