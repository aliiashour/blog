<?php 
    // here i should get all posts includeing the word in title column
    session_start() ; 
    include_once "../connect_data_base.php" ; 
    if(isset($_SERVER['REQUEST_METHOD']) == 'POST' ){
        $search_for = $_REQUEST['search_for'] ; 
        $q = "SELECT * FROM posts WHERE post_title LIKE '%$search_for%'" ; 
        $stmt = $con -> prepare($q)  ;
        $stmt->execute() ; 
        if($stmt->rowCount()){
            $data = '' ; 
            $rows = $stmt->fetchAll() ; 
            foreach($rows as $row){
                $data .= 
                '<div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-5">
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
        }
        // echo $search_for ; 
    }else{
        echo 'you are not allowed to be here' ; 
    }

?>