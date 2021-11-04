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
              <h1 class="page-header-title">User List</h1>
            </div>
          </div>
          <br> 
          <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
              <a href="./view_add_users.php">Add New User</a>
            </div>
          </div>
        </div>
        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
          <!-- Header -->
         
          <!-- End Header -->

          <!-- Table -->
          <table id="customers">
          <thead>
				
				<tr>
					<th>User_id</th>
					<th>First_name</th>
                    <th>Last_name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>Access</th>
					<th>Avatar</th>
					<th>Action</th>
				</tr>
		   </thead>
			<tbody>
                <?php 
					$u =new User();
          $getAllUser=$u->getAllUser();
          $total_Row=sizeof($getAllUser);
					foreach($getAllUser as $key=>$value)
					{
				?>
				<tr >
					<td><?php echo $value['id']?> </td>
					<td><?php echo $value['first_name']?> </td>
                    <td><?php echo $value['last_name']?> </td>
                    <td><?php echo $value['email']?> </td>
                    <td><?php echo $value['password']?> </td>
                    <td><?php echo $value['access']?> </td>
					<td><img src="./../assets/public_user/images/<?php echo $value['access_img']?>"  style="width:100px"></td>
					<td>
						<a href="detail_user.php?ID=<?php echo $value['id']?>" class="btn btn-success btn-mini">Edit</a>
						<a href="./action/delete/deleteUser.php?delete=<?php echo $value['id']?>" class="btn btn-danger btn-mini">Delete</a>
					</td>
				</tr>
				<?php }?>
			
                <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    
                      <td colspan = "2">Tổng User:<?php echo $total_Row ?> </td>
                      <td></td>
                      <td></td>
                      <td></td>
                </tr>
              </tbody>
            </table>
           
        </div>
      </div>
      <!-- End Content -->
      <?php require("./footer/footer.html") ?>

    </main>
    
    <!-- End Create a new user Modal -->
    <!-- ========== END SECONDARY CONTENTS ========== -->
    <?php require("./links/link_js.html") ?>
    
  </body>
</html>
