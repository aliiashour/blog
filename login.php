<?php 
    $page_title = "login" ; 
    include_once "init.php" ; 
    $response = '' ;  
    if(isset($_SESSION['user_id'])){
        header('location:index.php?lang='.$_SESSION["lang"]) ; 
    }
    if(isset($_POST['login']) && $_POST['login']='login'){
        if($_REQUEST['user_uname']){
            $q = 'SELECT * FROM users WHERE user_uname = :user_name' ; 
            $stmt = $con->prepare($q) ; 
            $stmt->execute(array(
                ':user_name' => $_REQUEST['user_uname']
            )) ; 
            $count = $stmt->rowCount() ; 
            if($count){
                $res = $stmt->fetch() ; 
                if (sha1($_REQUEST['user_password']) == $res['user_password']){
                    $_SESSION['user_id'] = $res['user_id'] ; 
                    $_SESSION['user_uname'] = $res['user_uname'] ; 
                    header('location:index.php?lang='.$_SESSION["lang"]) ; 
                }else{
                    $response = '<div class="alert alert-danger">'. value_of('passlognwrong') .'</div>' ;     
                }
            }else{
                $response = '<div class="alert alert-danger">'. value_of('usrlognwrong') .'</div>' ; 
            }

        }else{
            $response = '<div class="alert alert-danger">'. value_of('usremptywrong') .'</div>' ; 
        }
    }



?>


<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-sm-10 col-md-8 mt-5">
            <div id="response"><?php echo $response ; ?></div>
            <form method="POST">
                <div class="mb-3">
                    <label for="user_uname" class="form-label"><?php echo ucfirst(value_of('username'));?></label>
                    <input type="text" class="form-control" name="user_uname" required>
                    <div id="user_name_help" class="form-text"><?php echo ucfirst(value_of('username_note'));?></div>
                </div>
                <div class="mb-3">
                    <label for="user_password" class="form-label"><?php echo ucfirst(value_of('password'));?></label>
                    <input type="password" class="form-control" name="user_password" required>
                </div>
                <div class="mb-3 form-check text-center">
                    <span><?php echo ucfirst(value_of('signup_note'));?><a href="./register.php?lang=<?php echo $_SESSION['lang']?>"><?php echo ucfirst(value_of('signup'));?></a></span>
                </div>
                
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="login" value="<?php echo ucfirst(value_of('login'));?>">
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
    include_once $tmp."footer.php" ; 
?>


