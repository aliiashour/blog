<?php
    $page_title = 'publisher' ; 
    include_once 'init.php' ; 
    $q = "SELECT * FROM users WHERE user_id = ".$_GET['publisher_id'] ; 
    $stmt = $con->prepare($q) ; 
    $stmt->execute() ; 
    $row = $stmt->fetch();
    
?>

<div class="container-fluid">
    <div class="row">
        <div class="info col-12 col-sm-3 mb-1">
            <div class="user_img">
                <img src="<?php echo $img.$row['user_image']?>" alt="not-found">
            </div>
            <h4><?php echo $row['user_uname'] ;?></h4>
            <h6><?php echo $row['user_name'] ;?></h6>
            <span><?php echo $row['user_email'] ;?><span>
                
            <hr>
            <span><?php echo "JUST BIO JUST BIO JUST BIO" ;?><span>
        </div>
        <div class="user_posts col-12 col-sm-9">
            <div class="row">
            
                <?php
                    
                    $q = "SELECT * FROM posts WHERE post_publisher = :user_id ORDER BY post_time DESC" ; 
                    $stmt = $con->prepare($q) ; 
                    $stmt->execute(array(
                        ":user_id" => $_GET['publisher_id']
                    )) ; 
                    if($stmt->rowCount()){
                        $data = '' ; 
                        $rows = $stmt->fetchAll() ; 
                        foreach($rows as $row){
                            $data .= 
                            '<div class="col-12 col-sm-6 col-md-4">
                                <div class="card">
                                    <img src="./assets/images/'.$row['post_image'].'" class="card-img-top" alt="post_image_'.$row['post_id'].'">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-11 text-start">
                                                <h5 class="card-title text-truncate"><a href="posts.php?post_id='. $row['post_id'] .'&lang='.$_SESSION['lang'].'">'.$row['post_title'].'</a></h5>
                                            </div>
                                            <div class="col-1 text-end">
                                                <div class="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="publisher.php?user_id='.$row['post_publisher'].'&lang='.$_SESSION['lang'].'">
                                                                publisher
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="card-text">'.$row['post_content'].'</p>
                                        <div class="row">
                                            <div class="col-11 text-start">
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>';
                                            
                                                $data .= '
                                        </div>
                                    </div>
                                </div>
                            </div>' ; 
                        }
                        echo $data ; 
                    }else{
                        echo "empty" ; 
                    }
                
                ?>
            </div>
        </div>
    </div>
</div>




<?php include_once $tmp . "footer_design.php" ;?>
<?php include_once $tmp . "footer.php" ;?>
<script>

</script>
</body>
</html>