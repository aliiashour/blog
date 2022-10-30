<?php
    $page_title = 'my posts' ; 

    include_once 'init.php' ; 
    if(isset($_SESSION["user_id"])){
        $q = "SELECT * FROM posts WHERE post_publisher = :user_id ORDER BY post_time DESC" ; 
        $stmt = $con->prepare($q) ; 
        $stmt->execute(array(
            ":user_id" => $_SESSION['user_id']
        )) ; 
        if($stmt->rowCount()){
            echo '<div class="container-fluid"><div class="row all-page">' ; 
            $data = '' ; 
            $rows = $stmt->fetchAll() ; 
            foreach($rows as $row){
                $data .= 
                '<div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-1">
                    <div class="row">
                        <div class="col-12 text-end">
                            <a href="edit.php?post_id='.$row['post_id'].'&lang='.$_SESSION['lang'].'"><i class="fa-solid fa-pen-to-square"></i></a>
                        </div>
                        <div class="card col-12 col-md-8">
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
                        <div class="col-12 col-md-4">';
                        
                            $q = "SELECT * FROM post_emojis WHERE post_emojis_id = :post_id" ; 
                            $stmt = $con->prepare($q) ; 
                            $stmt->execute(array(
                                ":post_id" => $row['post_id']
                            )) ;
                            $roww = $stmt->fetch()  ; 
                            $data .= '<h5 class="mt-3 emoji" data-emoji="post_like" data-post_id ='. $row['post_id'].'>&#128077; <span class="badge bg-info post_like">';
                            if($roww['post_like'] != 0) $data .= $roww['post_like'] ; 
                            $data .= '</span></h5>' ; 

                            $data .= '<h5 class="mt-3 emoji" data-emoji="post_perfect" data-post_id = '.$row['post_id'].'>&#128076; <span class="badge bg-info post_perfect">';
                            if($roww['post_perfect'] != 0) $data .= $roww['post_perfect'] ; 
                            $data .= '</span></h5>' ; 
                            $data .= '<h5 class="mt-3 emoji" data-emoji="post_love" data-post_id = '.$row['post_id'].'>&#128151; <span class="badge bg-info post_love">';
                            if($roww['post_love'] != 0) $data .= $roww['post_love'] ; 
                            $data .= '</span></h5>' ; 
                            $data .= '<h5 class="mt-3 emoji" data-emoji="post_love_eye" data-post_id = '.$row['post_id'].'>&#128525; <span class="badge bg-info post_love_eye">';
                            if($roww['post_love_eye'] != 0) $data .= $roww['post_love_eye'] ; 
                            $data .= '</span></h5>' ; 
                            $data .= '<h5 class="mt-3 emoji" data-emoji="post_laugh" data-post_id = '.$row['post_id'].'>&#128517; <span class="badge bg-info post_laugh">';
                            if($roww['post_laugh'] != 0) $data .= $roww['post_laugh'] ; 
                            $data .= '</span></h5>' ; 
                            $data .= '<h5 class="mt-3 emoji" data-emoji="post_cute" data-post_id = '.$row['post_id'].'>&#128519; <span class="badge bg-info post_cute">';
                            if($roww['post_cute'] != 0) $data .= $roww['post_cute'] ; 
                            $data .= '</span></h5>' ; 
                            $data .= '<h5 class="mt-3 emoji" data-emoji="post_sad" data-post_id = '.$row['post_id'].'>&#128532; <span class="badge bg-info post_sad">';
                            if($roww['post_sad'] != 0) $data .= $roww['post_sad'] ;
                            $data .='</span></h5></div>
                        <div class ="col-12 text-start">there are <strong>'.$row['post_visitor_count'].'</strong> read this post</div>
                    </div>
                </div>' ; 

            }
            echo $data ; 
            
            echo '</div></div>' ; 
        }else{
            echo "there are no posts yet.!" ; 
        }
?>



        <?php include_once $tmp . "footer_design.php" ;?>
        <?php include_once $tmp . "footer.php" ;?>
        <script>
        
            $("#search_form").on("submit", function(event){
                event.preventDefault() ; 
                var search_for = $("#searchable").val() ; 
                if(search_for.length > 0){
                    $.ajax({
                        url:"./handle_files/handle_search.php",
                        method:"post",
                        data:{search_for:search_for},
                        befodataend:function(){
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
        </script>
        </body>
        </html>
<?php
}else{
    echo "you are not allowed to be here" ; 
}   
?>
