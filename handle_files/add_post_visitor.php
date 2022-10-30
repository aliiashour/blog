<?php
    include_once "../connect_data_base.php" ; 
    $q = "UPDATE posts SET post_visitor_count = post_visitor_count + 1 WHERE post_id=?" ; 
    $stmt2 = $con->prepare($q) ; 
    $stmt2->execute(array($_REQUEST['post_id']));
?>