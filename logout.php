<?php
    session_start() ; 
    $lang = $_SESSION['lang'] ; 
    session_unset();
    session_destroy();
    header('location:index.php?lang='.$lang) ; 
?>