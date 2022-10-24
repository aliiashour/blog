<?php
    include_once '../connect_data_base.php' ; 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $post_id = $_REQUEST['post_id'] ; 
        $emoji_type = $_REQUEST['emoji_type'] ; 
        $mood = $_REQUEST['mood'] ; 

        modigy_emoji($post_id, $emoji_type, $mood, $con) ;
        
        $q = "SELECT $emoji_type FROM post_emojis WHERE post_emojis_id = $post_id" ; 
        $stmt2 = $con->prepare($q) ; 
        $stmt2->execute();
        $res = $stmt2->fetch() ; 
        echo $res[$emoji_type] ;
    }else{
        echo "undefined to be here" ; 
    }

?>