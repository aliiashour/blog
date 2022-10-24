<?php

?>
<!DOCTYPE html>
 
<html lang="<?php echo $_SESSION['lang'] ; ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css ; ?>reset.css">
    <link rel="stylesheet" href="<?php echo $css ; ?>bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $css ; ?>style.css">
    <title><?php echo strtoupper(value_of($page_title)) ; ?></title>
</head>
<body onresize="re_size_page()" dir="<?php if($_SESSION['lang']=='ar'){ echo 'rtl'; }else{ echo 'ltr'; }?>">

  <?php if(isset($_SESSION['user_id'])) include_once $tmp."nav.php" ;?>

  <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
          <a class="navbar-brand" href='index.php?lang=<?php echo $_SESSION["lang"]?>'>Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
              <ul class="navbar-nav mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="most_rated.php?lang=<?php echo $_SESSION['lang']?>"><?php echo ucfirst(value_of('most_rated'))?></a>
                  </li>
                  <?php if(isset($_SESSION['user_id'])) :?>
                      <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="populer.php?lang=<?php echo $_SESSION['lang']?>"><?php echo ucfirst(value_of('my_populer'))?></a>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <?php echo value_of($_SESSION['user_uname']);?>
                          </a>
                          <ul class="dropdown-menu">
                              <li>
                                  <a class="dropdown-item" href="profile.php?lang=<?php echo $_SESSION['lang']?>"><?php echo ucfirst(value_of('profile'))?></a>
                              </li>
                              <li>
                                  <a class="dropdown-item" href="posts.php?lang=<?php echo $_SESSION['lang']?>"><?php echo ucfirst(value_of('my_posts'))?></a>
                              </li>
                              <li>
                                  <hr class="dropdown-divider">
                              </li>
                              <li>
                                  <a class="dropdown-item" href="logout.php?lang=<?php echo $_SESSION['lang']?>"><?php echo ucfirst(value_of('logout'))?></a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item">
                          <button class="btn btn-info btn-md">
                              <?php echo strtoupper(value_of('admin'))?>
                          </button>
                      </li>
                  <?php else:?>
                      <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="login.php?lang=<?php echo $_SESSION['lang'] ?>"><?php echo ucfirst(value_of('login'))?></a>
                      </li>
                  <?php endif ?>
              </ul>
          </div>
      </div>
  </nav>