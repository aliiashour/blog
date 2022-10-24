<?php ?>

  <div class="row bg-dark first_nav" style="background-color: #e5e5e5 !important;">
      <div class="col-6 col-xm-4 col-md-4 text-primary" style="line-height:36px"><?php echo ucfirst(value_of('welcome')) . " ". ucfirst(value_of('ali')) ;  ?></div>
      <div class="col-6 col-xm-4 col-md-4">
        <form class="d-flex" role="search" id="search_form">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <input class="btn btn-outline-success" type="submit" value="Search">
        </form>
      </div>
      <div class="col-sm-4 d-none d-md-block">
          <ul class="nav justify-content-end">
              <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="https://www.linkedin.com/in/ali-ashour-1265961b8/" target="_blank"><?php echo strtolower(value_of('linkedin')) ?></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="https://github.com/aliiashour?tab=repositories" target="_blank"><?php echo strtolower(value_of('github')) ?></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="https://drive.google.com/file/d/194gW2g5zkC2kFF7CtyOPXt9vjBsNXLuO/view?usp=sharing" target="_blank"><?php echo strtoupper(value_of('cv')) ?></a>
              </li>
          </ul>
      </div>
  </div>
