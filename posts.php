<?php
    $page_title= 'post' ; 
    include_once "init.php" ;
    if(isset($_REQUEST['post_id']) && !empty($_REQUEST['post_id'])){
        $post_id = $_REQUEST['post_id'] ; 
        $q = 'SELECT * FROM users INNER JOIN posts ON 
                user_id = post_publisher
                INNER JOIN post_emojis ON
                :post_id = post_emojis_id
                WHERE post_id = :post_id' ; 
        $stmt = $con->prepare($q) ; 
        $stmt->execute(array(
            ':post_id' => $post_id
        )) ; 

        if($stmt->rowCount()){
            $row = $stmt->fetch() ; 
            ?>
            
                <div class="container">
                    <div class="row">
                        <div class="post col-12 col-sm-11">
                            <div>
                                <div class="post-title text-primary fs-2">
                                    <?php echo $row['post_title'] ; ?>
                                </div>
                                <div class="post-body text-secondary fs-4">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum ratione fugiat odio ea in incidunt cupiditate sequi non praesentium. Voluptatem nulla placeat, dolores incidunt ex provident repellat autem sequi itaque!
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste aliquid modi ut, sit repellat eaque, in pariatur vitae sunt reprehenderit porro assumenda iure numquam aspernatur voluptate aut rem quod et.
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum ratione fugiat odio ea in incidunt cupiditate sequi non praesentium. Voluptatem nulla placeat, dolores incidunt ex provident repellat autem sequi itaque!
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste aliquid modi ut, sit repellat eaque, in pariatur vitae sunt reprehenderit porro assumenda iure numquam aspernatur voluptate aut rem quod et.
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum ratione fugiat odio ea in incidunt cupiditate sequi non praesentium. Voluptatem nulla placeat, dolores incidunt ex provident repellat autem sequi itaque!
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste aliquid modi ut, sit repellat eaque, in pariatur vitae sunt reprehenderit porro assumenda iure numquam aspernatur voluptate aut rem quod et.
                                    <?php echo $row['post_content'] ; ?>
                                </div>
                                <div class="post-info text-end fw-lighter mt-5 mb-5 fs-5">
                                    <div class="row">
                                        <div class="col-6 text-start publisher-info">
                                            <?php
                                                $lnk =  '<a href="publisher.php?publisher_id='.$row['user_id'] ;
                                                if(isset($_SESSION["user_id"])){
                                                    $lnk .= '&lang='.$_SESSION['lang'] ; 
                                                }
                                                $lnk .= '" >'.$row['user_name'].'</a>' ; 
                                                echo $lnk ; 
                                            ?>
                                        </div>
                                        <div class="col-6 text-end post-info">    
                                            <?php echo $row['post_time'] ; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="emojii col-12 col-sm-1">
                            <h5 class="mt-3 emoji" data-emoji='post_like' data-post_id = <?php echo $row['post_id']?>>&#128077; <span class="badge bg-info post_like"><?php if($row['post_like'] != 0) echo $row['post_like'] ?></span></h5>
                            <h5 class="mt-3 emoji" data-emoji='post_perfect' data-post_id = <?php echo $row['post_id']?>>&#128076; <span class="badge bg-info post_perfect"><?php if($row['post_perfect'] != 0) echo $row['post_perfect']?></span></h5>
                            <h5 class="mt-3 emoji" data-emoji='post_love' data-post_id = <?php echo $row['post_id']?>>&#128151; <span class="badge bg-info post_love"><?php if($row['post_love'] != 0) echo $row['post_love']?></span></h5>
                            <h5 class="mt-3 emoji" data-emoji='post_love_eye' data-post_id = <?php echo $row['post_id']?>>&#128525; <span class="badge bg-info post_love_eye"><?php if($row['post_love_eye'] != 0) echo $row['post_love_eye']?></span></h5>
                            <h5 class="mt-3 emoji" data-emoji='post_laugh' data-post_id = <?php echo $row['post_id']?>>&#128517; <span class="badge bg-info post_laugh"><?php if($row['post_laugh'] != 0) echo $row['post_laugh']?></span></h5>
                            <h5 class="mt-3 emoji" data-emoji='post_cute' data-post_id = <?php echo $row['post_id']?>>&#128519; <span class="badge bg-info post_cute"><?php if($row['post_cute'] != 0) echo $row['post_cute']?></span></h5>
                            <h5 class="mt-3 emoji" data-emoji='post_sad' data-post_id = <?php echo $row['post_id']?>>&#128532; <span class="badge bg-info post_sad"><?php if($row['post_sad'] != 0) echo $row['post_sad']?></span></h5>
                            
                        </div>
                    </div>
                </div>
            
            
            
            <?php
        }else{
            echo "this post id:$post_id is not defined" ;
        }

    }else{
        echo 'this post is not defined' ; 
    }
?>


<?php include_once $tmp."footer_design.php" ; ?>
<?php include_once $tmp . "footer.php" ; ?>

<script>
    $(".emoji").on('click', function(){
        var post_id = $(this).data('post_id') ; 
        var emoji_type = $(this).data('emoji') ; 
        var mood = 'add' ; 
        if($(this).hasClass('clicked')){
            mood = 'remove' ; 
        }
        $.ajax({
            url:'./handle_files/moify_post_emoji.php' ,
            method:"post",
            data:{mood:mood, post_id:post_id, emoji_type:emoji_type},
            success:function(data){
                if(data != 0)
                    $("."+emoji_type).html(data) ; 
                else
                    $("."+emoji_type).html('') ; 
            }
        });
        $(this).toggleClass('clicked') ; 
    }) 
</script>
</body>
</html>