<?php
    $page_title = "blog" ; 
    include_once "init.php" ;    
?>
    
<div class="container-fluid">
    <div class="row">
        <div class="slider">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo $img .'inspire_1.jpg' ; ?>" class="d-block w-100" alt="inspire_1">
                        <div class="carousel-caption">
                            <h5><?php echo ucfirst(value_of('crosl_itm_1'));?></h5>
                            <p><?php echo ucfirst(value_of('crosl_prgf_1'));?></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo $img .'inspire_2.jpg' ; ?>" class="d-block w-100" alt="inspire_2">
                        <div class="carousel-caption">
                            <h5><?php echo ucfirst(value_of('crosl_itm_2'));?></h5>
                            <p><?php echo ucfirst(value_of('crosl_prgf_2'));?></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo $img .'inspire_3.jpg' ; ?>" class="d-block w-100" alt="inspire_3">
                        <div class="carousel-caption">
                            <h5><?php echo ucfirst(value_of('crosl_itm_3'));?></h5>
                            <p><?php echo ucfirst(value_of('crosl_prgf_3'));?></p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>


        <?php
        
            // now get all posts from database descanding order
            $q = "SELECT * FROM posts ORDER BY post_time DESC" ; 
            $stmt = $con->prepare($q) ; 
            $stmt->execute();
            if($stmt->rowCount()){
                $rows = $stmt->fetchAll() ; 
                foreach($rows as $row){ ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-5">
                        <div class="card">
                            <img src="<?php echo $img.$row['post_image']?>" class="card-img-top" alt="post_image_<?php echo $row['post_id']?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11 text-start">
                                        <h5 class="card-title text-truncate"><a href="posts.php?post_id=<?php echo $row['post_id']?>&lang=<?php echo $_SESSION['lang']?>"><?php echo $row['post_title']?></a></h5>
                                    </div>
                                    <div class="col-1 text-end">
                                        <div class="dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="publisher.php?user_id=<?php echo $row['post_publisher']?>&lang=<?php echo $_SESSION['lang'] ; ?>">
                                                        <?php echo ucfirst(value_of('publisher'))?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-text"><?php echo $row['post_content']?></p>
                                <div class="row">
                                    <div class="col-11 text-start">
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                    <div class="col-1 text-end">
                                        <!-- check if this post are favouirt for sessioned user -->
                                        <?php 
                                            if(isset($_SESSION['user_id'])){
                                                $q = "SELECT * FROM favoruits WHERE favourit_user_id = :session_id AND favourit_post_id = :post_id" ; 
                                                $stmt2 = $con->prepare($q) ; 
                                                $stmt2->execute(array(
                                                    ':session_id' => $_SESSION['user_id'],
                                                    ':post_id' => $row['post_id']
                                                ));
                                                ?>
                                                
                                                <i class="fa-solid fa-heart <?php if($stmt2->rowCount()){ echo 'favoruit' ;}?> love_icon" data-user_id="<?php if(isset($_SESSION['user_id'])){ echo $_SESSION['user_id'] ;  }?>" data-post_id="<?php echo $row['post_id']?>"></i>
                                                
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            }else{ ?>
                <div class="col text-center text-primary">there are no posts yet!</div>
            <?php }
        
        ?>
    </div>
</div>

<a href="?lang=en">english</a>
<a href="?lang=ar">arabic</a>

<?php include_once $tmp."footer.php" ; ?>

    </body>
</html>