<div id="sidebarMain" class="d-none">
  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
  <div class="navbar-vertical-container">
    <div class="navbar-vertical-footer-offset">
      <div class="navbar-brand-wrapper justify-content-between">
        <!-- Logo -->
          <a class="navbar-brand" href="index.php" aria-label="Front">
            <img class="navbar-brand-logo" src="./../assets/public_admin/svg/logos/logo.svg" alt="Logo">
            <img class="navbar-brand-logo-mini" src="./../assets/public_admin/svg/logos/logo-short.svg" alt="Logo">
          </a>
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
          <i class="tio-clear tio-lg"></i>
        </button>
        <!-- End Navbar Vertical Toggle -->
      </div>

      <!-- Content -->
      <div class="navbar-vertical-content">
        <ul class="navbar-nav navbar-nav-lg nav-tabs">
          <!-- Dashboards -->
          <li class="navbar-vertical-aside-has-menu show">
            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle active" href="index.php" title="Dashboards">
              <i class="tio-home-vs-1-outlined nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Dashboards</span>
            </a>
          </li>
      
          <li class="navbar-vertical-aside-has-menu ">
            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="view_manufactures.php" title="Authentication">
              <i class="tio-lock-outlined nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Manufactures</span>
            </a>
          </li>

          <li class="navbar-vertical-aside-has-menu ">
            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="view_protypes.php" title="Authentication">
              <i class="tio-lock-outlined nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Protypes</span>
            </a>
          </li>
          <li class="navbar-vertical-aside-has-menu ">
            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="view_comments.php" title="Authentication">
              <i class="tio-lock-outlined nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Comments</span>
            </a>
          </li>
          <!-- End Authentication -->
          <?php $u=new User;
                if( isset($_COOKIE["user_ID"]))
                {
                  $user=$u->getUserById( $_COOKIE['user_ID'] );
                }
              
            if($user[0]['access']=="admin")
            {
              ?>
              <li class="navbar-vertical-aside-has-menu ">
                 <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="view_user.php" title="Authentication">
                    <i class="tio-lock-outlined nav-icon"></i>
                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">User</span>
                </a>
             </li>
         <?php
            }
           ?>

          </li>
    </div>
  </div>
</aside>
</div>

<div id="sidebarCompact" class="d-none">
  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
 
</aside>
</div>