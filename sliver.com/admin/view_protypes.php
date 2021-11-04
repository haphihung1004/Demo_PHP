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
              <h1 class="page-header-title">Protypes List</h1>
            </div>
          </div>
          <br> 
          <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
              <a href="./view_add_protypes.php">Add New Protypes</a>
            </div>
          </div>
        </div>
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
          <!-- Header -->
         
          <!-- End Header -->

          <!-- Table -->
          <table id="customers">
          <thead>
				
                <tr>
					<th>Type_Id</th>
					<th>Type_Name</th>
					<th>Type_image</th>
					<th>Action</th>
				</tr>
		   </thead>
			<tbody>
                <?php 
					$protypes =new Protypes();
                    $getAllProtypes=$protypes->getAllProtypes();
                    $total_Row=sizeof($getAllProtypes);
					foreach($getAllProtypes as $key=>$value)
					{
				?>
				<tr >
                     <td><?php echo $value['type_ID']?> </td>
					<td><?php echo $value['type_name']?> </td>
					<td><img src="./../assets/public_user/images/<?php echo $value['type_img']?>"  style="width:100px"></td>
					<td>
						<a href="detail_protypes.php?ID=<?php echo $value['type_ID']?>" class="btn btn-success btn-mini">Edit</a>
						<a href="./action/delete/deleteProtypes.php?delete=<?php echo $value['type_ID']?>" class="btn btn-danger btn-mini">Delete</a>
					</td>
				</tr>
				<?php }?>
			
                <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    
                      <td>Tổng Protypes:<?php echo $total_Row ?> </td>
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
