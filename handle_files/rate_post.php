<?php
session_start() ; 
    include_once "../connect_data_base.php" ; 
    // first we need to know if there was already a value for same post and user

    $q = "SELECT * FROM post_rats WHERE post_id = ? AND user_id= ?" ; 
    $stmt2 = $con->prepare($q) ; 
    $stmt2->execute(array($_REQUEST['post_id'], $_SESSION['user_id']));
    if($stmt2->rowCount()){    
        $q = "UPDATE post_rats SET post_num_of_stars = ? WHERE post_id = ? AND user_id= ?" ; 
        $stmt2 = $con->prepare($q) ; 
        $stmt2->execute(array($_REQUEST['star_num'], $_REQUEST['post_id'], $_SESSION['user_id']));
    }else{    
        $q = "INSERT INTO post_rats(user_id, post_id, post_num_of_stars) VALUES(?, ?, ?)" ; 
        $stmt2 = $con->prepare($q) ; 
        $stmt2->execute(array($_SESSION['user_id'], $_REQUEST['post_id'], $_REQUEST['star_num']));
    }
?>