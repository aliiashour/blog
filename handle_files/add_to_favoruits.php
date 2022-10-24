<?php
include_once '../connect_data_base.php' ; 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user_id = $_REQUEST['user_id'] ; 
        $post_id = $_REQUEST['post_id'] ; 
        if($_REQUEST['mood'] == 'add'){
            $q = "INSERT INTO favoruits(favourit_user_id, favourit_post_id) VALUES(?, ?)" ; 
            $stmt2 = $con->prepare($q) ; 
            $stmt2->execute(array($user_id, $post_id));
        }else{
            $q = "DELETE FROM favoruits WHERE favourit_user_id= ? AND favourit_post_id = ?" ; 
            $stmt2 = $con->prepare($q) ; 
            $stmt2->execute(array($user_id, $post_id));
        }
    }else{
        echo "undefined to be here" ; 
    }

?>