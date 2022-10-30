<?php
    $page_title = "blog" ; 
    include_once "init.php" ;    
?>
    
<div class="container-fluid">
    <div class="row all-page">
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
            $page_size = 2;
            if(isset($_GET['page_id']) && !empty($_GET['page_id'])){
                $start_from = ($_GET['page_id'] - 1) * $page_size; 
            }else{
                $start_from = 0 ; 
            }

            $q = "SELECT * FROM posts" ; 
            $stmt = $con->prepare($q) ; 
            $stmt->execute();
            $all = $stmt->rowCount() ; 

            // now get all posts from database descanding order
            $q = "SELECT * FROM posts ORDER BY post_time DESC LIMIT $start_from, $page_size" ; 
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
                                                
                                                <i class="fa-solid fa-heart <?php if($stmt2->rowCount()){ echo 'favoruit ' ;}?>love_icon" data-user_id="<?php if(isset($_SESSION['user_id'])){ echo $_SESSION['user_id'] ;  }?>" data-post_id="<?php echo $row['post_id']?>"></i>
                                                
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                $pag = '' ; 
                $pag .= '<nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-1">
                            <li class="page-item';
                            if(!isset($_GET['page_id']) || $_GET['page_id'] == 1){
                                $pag .=' disabled'; 
                            }
                            $pag .= '">
                                <a class="page-link" href="?page_id=';
                                if(isset($_GET['page_id'])){
                                    $pag .= $_GET['page_id']-1 ; 
                                } 
                                $pag .= '">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="?page_id=1">1</a></li>
                            <li class="page-item"><a class="page-link" href="?page_id=2">2</a></li>
                            <li class="page-item"><a class="page-link" href="?page_id=3">3</a></li>
                            <li class="page-item';
                            if(isset($_GET['page_id']) && $_GET['page_id'] == ceil($all / $page_size) ){
                                $pag .=' disabled';
                            }
                            $pag .= '"><a class="page-link" href="?page_id=';
                            if(isset($_GET['page_id'])){
                                $pag .= $_GET['page_id']+1 ; 
                            }else{
                                $pag .= 1 ; 
                            } 
                            $pag .= '">Next</a>
                                </li>
                            </ul>
                        </nav>' ; 
                echo $pag ; 
            }else{ ?>
                <div class="col text-center text-primary">there are no posts yet!</div>
            <?php }
        
        ?>

        <div id="contact_us">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h2 class="mb-5">Contact Us</h2>
                    <p style="margin-bottom:1px">Our mailling address is : </p>
                    <span>aliashour592@gmail.com</span>
                    <p>Phone: 01007346184</p>
                </div>
                <div class="col-12 col-sm-6">
                    <form id="contact-us-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="name">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<?php include_once $tmp."footer_design.php" ; ?>
<?php include_once $tmp."footer.php" ; ?>

    <script>
        
        $("#search_form").on("submit", function(event){
            event.preventDefault() ; 
            var search_for = $("#searchable").val() ; 
            if(search_for.length > 0){
                $.ajax({
                    url:"./handle_files/handle_search.php",
                    method:"post",
                    data:{search_for:search_for},
                    beforeSend:function(){
                        $("#submit_button").html('loading') ; 
                        $("#submit_button").attr('disabled', 'disabled') ; 
                    },
                    success:function(data){
                        $(".all-page").html(data) ; 
                        $("#submit_button").html('search') ; 
                        $("#submit_button").attr('disabled', false) ; 
                    }
                })
            }else{
                alert('Enter a string to search') ; 
            }
        }) ; 

        $(".love_icon").on('click', function(){
            user_id = $(this).data('user_id') ; 
            post_id = $(this).data('post_id') ;
            mood = 'add' ; 
            if($(this).hasClass('favoruit')){
                mood = 'remove' ; 
            }
            $.ajax({
                url:"./handle_files/add_to_favoruits.php",
                method:"POST",
                data:{mood:mood, user_id:user_id, post_id:post_id}
            })
            
            $(this).toggleClass("favoruit") ; 
        })

    </script>

    </body>
</html>