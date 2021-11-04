<?php
require_once './../config/database.php';

spl_autoload_register(function ($className) {
    require './../model/' . $className . '.php';
});

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Dashboard | Front - Admin &amp; Dashboard Template</title>

    <?php require("./links/link_css.html") ?>
  </head>

  <body class="footer-offset">
      <!-- JS Preview mode only -->
      <?php require("./header/header.php") ?>

      <?php require("./sider/sider.php") ?>

      <script src="./../assets/public_admin/js/demo.js"></script>
    
    <main id="content" role="main" class="main pointer-event">
      <!-- Content -->
      <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
          <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
              <h1 class="page-header-title"> Users</h1>
            </div>
          </div>
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
	
		    <div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>Detail User</h5>
					</div>
					<div class="widget-content nopadding">
						<?php 
							$id=$_GET['ID'];
							$pro = new User;
							$getUserById = $pro->getUserById($id);
							//var_dump($getAllProductsBYid);
							
							?>
					   <form action="./action/update/updateUser.php?id=<?php echo $getUserById[0]['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="control-group">
								<label  for="fname">First name:</label>
								<input type="text" id="fname"   name="first_name" value="<?php echo $getUserById[0]['first_name'] ?>"/> *
							</div>
                            <div class="control-group">
								<label  for="fname">Last name:</label>
								<input type="text" id="fname"  name="last_name" value="<?php echo $getUserById[0]['last_name'] ?>"/> *
							</div>
                            <div class="control-group">
								<label  for="fname">Email:</label>
								<input type="text" id="fname"  name="email" value="<?php echo $getUserById[0]['email'] ?>"/> *
							</div>
                            <div class="control-group">
								<label  for="fname">Password:</label>
								<input type="text" id="fname" name="password" value="<?php echo $getUserById[0]['password'] ?>"/> *
							</div>
							<div class="control-group">
								<label class="control-label">Choose a access :</label>
								
								<select name="access">
                <?php if($getUserById[0]['access']=="admin" || $getUserById[0]['access']=="user"){
                              
                                  if($getUserById[0]['access']=="user"){ ?>
                                    <option value="<?php echo $getUserById[0]['access'] ?>" selected="selected"><?php echo $getUserById[0]['access'] ?></option>
                                    <option value="admin" >admin</option>
                                    <option value="manager" >manager</option>
                                  <?php }
                                  if($getUserById[0]['access']=="admin"){ ?>
                                    <option value="<?php echo $getUserById[0]['access'] ?>" selected="selected"><?php echo $getUserById[0]['access'] ?></option>
                                    <option value="admin" >user</option>
                                    <option value="manager" >manager</option>
                                  <?php }
                                if($getUserById[0]['access']=="manager"){  ?>
                                    <option value="<?php echo $getUserById[0]['access'] ?>" selected="selected"><?php echo $getUserById[0]['access'] ?></option>
                                    <option value="admin" >user</option>
                                    <option value="manager" >admin</option>
                                  <?php } ?>
                  <?php } ?>
                  <?php if($getUserById[0]['access']=="manager"){ ?>
                       <option value="manager" >manager</option>
                  <?php } ?>   
                                </select>
                            </div>    
								<div class="control-group">
										<label for="fname">Choose an image :</label>   
										<input type="file" name="access_img" id="fileUpload" onchange="preview()">
										<div class="img_view">
												<img id="thumb"  src="./../assets/public_user/images/<?php echo $getUserById[0]['access_img'] ?>" width="200px" heigh="200px"/>
										</div>
								</div>
									<div class="form-actions" method ="get">
										<button type="submit" class="btn btn-success">Update</button>
									</div>
								</div>

						</form>
						
				</div>
			</div>
        
        </div>
      </div>
      <!-- End Content -->
      <?php require("./footer/footer.html") ?>

    </main>
    
    <!-- End Create a new user Modal -->
    <!-- ========== END SECONDARY CONTENTS ========== -->
    <?php require("./links/link_js.html") ?>
    <script type="text/javascript">
        function preview() {
        thumb.src=URL.createObjectURL(event.target.files[0]);
      }
	  
    </script>
  </body>
</html>

        