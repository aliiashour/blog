<?php
    $dsn = "mysql:host=localhost;dbname=blog" ; 
    $user = "root" ; 
    $pass = "" ; 
    $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    try{
        $con    = new PDO($dsn, $user, $pass, $option);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        

        function modigy_emoji($post_id, $emoji_type, $mood, $con){
            $q = '' ; 
            if($mood == 'add'){
                $q ="UPDATE post_emojis SET $emoji_type = $emoji_type+1 WHERE post_emojis_id = $post_id" ;
            }else{
                $q ="UPDATE post_emojis SET $emoji_type = $emoji_type-1 WHERE post_emojis_id = $post_id" ;
            }
            $stmt = $con->prepare($q) ; 
            $stmt->execute() ; 
        }
    }
    catch (PDOException $e){
        echo $e ->getMessage() ; 
    }
    
?>