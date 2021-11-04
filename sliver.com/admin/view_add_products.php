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
              <h1 class="page-header-title">Add New Products</h1>
            </div>
          </div>
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
	
		    <div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>Add Products</h5>
					</div>
					<div class="widget-content nopadding">
					   <form action="./action/add/addProducts.php" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="control-group">
								<label  for="fname">Product name:</label>
								<input type="text" id="fname" placeholder="Product name" name="name" /> *
							</div>
							<div class="control-group">
								<label class="control-label">Choose a product type :</label>
								
								<select name="type_ID">
								
									<?php
									//lua chon san pham 
								$protypes =new Protypes();
								$getAllProtypes=$protypes->getAllProtypes();
								
								foreach($getAllProtypes as $key=>$value)
								{
									?>
				                <option value="<?php echo $value['type_ID']?>"><?php echo $value['type_name']?></option>
						 
								<?php }?>
								</select>
								
							</div>
							<div class="control-group">
								<label class="control-label">Choose a manufacture :</label>
								
								<select name="manu_ID">
									<?php 
									//lua chon loai cua san pham
								$protypes =new Manufactures();
								$getAllProtypes=$protypes->getAllManufactures();
								
								foreach($getAllProtypes as $key=>$value)
								{
									?>
				                <option value="<?php echo $value['manu_ID']?>"><?php echo $value['manu_name']?></option>
						 
								<?php }?>
								</select>
								<div class="control-group">
								    <label  for="fname">Description: </label>
									<div class="controls">
									     <textarea rows="9" cols="70" placeholder="input description" name = "description"></textarea>
									</div>
								</div>
								<div class="control-group">
									    <label  for="fname">Price: </label>
										<input type="text" id="fname" placeholder="price" name = "price">

								</div>
								<div class="control-group">
										<label for="fname">Choose an image :</label>   
										<input type="file" name="fileToUpload" id="fileUpload" onchange="preview()">
										<div class="img_view">
												<img id="thumb"  src="" width="200px" heigh="200px"/>
										</div>
								</div>
									<div class="form-actions" method ="get">
										<button type="submit" class="btn btn-success">Add</button>
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
