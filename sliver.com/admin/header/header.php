<div id="headerMain" class="d-none">
  <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
  <div class="navbar-nav-wrap">
    <div class="navbar-brand-wrapper">
      <!-- Logo -->
      <a class="navbar-brand" href="index.php" aria-label="Front">
        <img class="navbar-brand-logo" src="./../assets/public_admin/svg/logos/logo.svg" alt="Logo">
        <img class="navbar-brand-logo-mini" src="./../assets/public_admin/svg/logos/logo-short.svg" alt="Logo">
      </a>
      <!-- End Logo -->
    </div>

    <div class="navbar-nav-wrap-content-left">
      <!-- Navbar Vertical Toggle -->
      <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
        <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip" data-placement="right" title="Collapse"></i>
        <i class="tio-last-page navbar-vertical-aside-toggle-full-align" data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-toggle="tooltip" data-placement="right" title="Expand"></i>
      </button>
      <!-- End Navbar Vertical Toggle -->

      <!-- Search Form -->
      <div class="d-none d-md-block">
        <form class="position-relative">
          <!-- Input Group -->
          <div class="input-group input-group-merge input-group-borderless input-group-hover-light navbar-input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="tio-search"></i>
              </div>
            </div>
            <input type="search" class="js-form-search form-control" placeholder="Search in front" aria-label="Search in front" data-hs-form-search-options='{
                     "clearIcon": "#clearSearchResultsIcon",
                     "dropMenuElement": "#searchDropdownMenu",
                     "dropMenuOffset": 20,
                     "toggleIconOnFocus": true,
                     "activeClass": "focus"
                   }'>
            <a class="input-group-append" href="javascript:;">
              <span class="input-group-text">
                <i id="clearSearchResultsIcon" class="tio-clear" style="display: none;"></i>
              </span>
            </a>
          </div>
          <!-- End Input Group -->

          <!-- Card Search Content -->
          <div id="searchDropdownMenu" class="dropdown-menu dropdown-card overflow-hidden">
            <!-- Body -->
            <div class="card-body-height py-3">
              <small class="dropdown-header mb-n2">Recent searches</small>
              <div class="dropdown-divider my-3"></div>
            </div>
          </div>
          <!-- End Card Search Content -->
        </form>
      </div>
      <!-- End Search Form -->
    </div>

    <!-- Secondary Content -->
    <div class="navbar-nav-wrap-content-right">
      <!-- Navbar -->
      <ul class="navbar-nav align-items-center flex-row">
        <li class="nav-item">
          <!-- Account -->
          <div class="hs-unfold">
            <?php $u=new User;
            
                if( isset($_COOKIE["user_ID"]))
                {
                  $user=$u->getUserById( $_COOKIE['user_ID'] );
                }
                 
            ?>
            <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;" data-hs-unfold-options='{
                 "target": "#accountNavbarDropdown",
                 "type": "css-animation"
               }'>

              <div class="avatar avatar-sm avatar-circle">
                <img class="avatar-img" src="./../assets/public_user/images/<?php echo $user[0]['access_img']?>" alt="Image Description">
                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
              </div>
            </a>
          
            <div id="accountNavbarDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account" style="width: 16rem;">
              <div class="dropdown-item-text">
                <div class="media align-items-center">
                  <div class="avatar avatar-sm avatar-circle mr-2">
                    <img class="avatar-img" src="./../assets/public_user/images/<?php echo $user[0]['access_img']?>" alt="Image Description">
                  </div>
                  <div class="media-body">
                    <span class="card-title h5"><?php echo $user[0]['first_name']?>__<?php echo $user[0]['last_name']?></span>
                    <span class="card-text"><?php echo $user[0]['email']?></span>
                  </div>
                </div>
              </div>

              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="detail_user.php?ID=<?php echo $_COOKIE["user_ID"] ?>">
                <span class="text-truncate pr-2" title="Profile &amp; account">Profile &amp; account</span>
              </a>

              <a class="dropdown-item" href="#">
                <span class="text-truncate pr-2" title="Settings">Settings</span>
              </a>
              <a class="dropdown-item" href="./../login/logout.php">
                <span class="text-truncate pr-2" title="Sign out">Sign out</span>
              </a>
            </div>
          </div>
          <!-- End Account -->
        </li>
      </ul>
      <!-- End Navbar -->
    </div>
    <!-- End Secondary Content -->
  </div>
</header>
</div>

<div id="headerFluid" class="d-none">
 
</div>

<div id="headerDouble" class="d-none">
  
</div>