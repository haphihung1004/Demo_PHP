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
              <h1 class="page-header-title"> Detail Comments</h1>
            </div>
          </div>
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
          <!-- Header -->
         
          <!-- End Header -->

          <!-- Table -->
        <div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>Detail Comments</h5>
					</div>
					<div class="widget-content nopadding">
          <?php 
            $id= $_GET['ID'];
						$comment = new Comment;
						$getCommentById = $comment->getCommentById($id);
					?>
						<!-- BEGIN USER FORM -->
						<form action="./action/update/updateComments.php?ID=<?php echo $id?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                  <?php 
                   $products= new Products;
                   $getAllProduct=$products->getAllProducts();
                   ?>
                  <div class="control-group">
                        <label  for="fname">Products:</label>
                        <select name="productId">
                                  <?php  foreach($getAllProduct as $key=>$value)
                                   { 
                                     if( $value['ID']==	$getCommentById[0]['product_id']){?>
                                         <option value="<?php echo $value['ID'] ?>" selected="selected"><?php echo $value['name'] ?></option>
                                     <?php }
                                      else{ ?>
                                           <option value="<?php echo $value['ID'] ?>" ><?php echo $value['name'] ?></option>
                                      <?php } ?>   
                                    <?php } ?>
                          </select>
						        </div>
							<div class="control-group">
                            
                                <label  for="fname">commentContent: </label>
                                <div class="controls">
										 <textarea rows="9" cols="70" placeholder="input commentContent" name = "commentContent"><?php echo $getCommentById[0]['comment_content']?></textarea>
								</div>
							</div>	
             
                            <div class="control-group">
                               
                                <label  for="fname">commentRate:</label>
                              <select name="commentRate">
                                  <?php
                                  if($getCommentById[0]['comment_rate']==1) {?>
                                    <option value="1" selected="selected">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                  <?php }
                                  if($getCommentById[0]['comment_rate']==2) {?>
                                  <option value="1" >1</option>
                                    <option value="2" selected="selected">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <?php }

                                  if($getCommentById[0]['comment_rate']==3) {?>
                                  <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" selected="selected">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <?php }
                                  if($getCommentById[0]['comment_rate']==4) {?>
                                  <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3">3</option>
                                    <option value="4" selected="selected">4</option>
                                    <option value="5">5</option>
                                    <?php }
                                  if($getCommentById[0]['comment_rate']==5){ ?>
                                  <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5" selected="selected">5</option>
                                    <?php } ?>
                            </select>

							</div>
                <?php 
                    $u =new User;
                    $getAllUser=$u->getAllUser();
                  ?>
                  <div class="control-group">
                              
                            <label  for="fname">comment_user_id:</label>
                            <select name="comment_user_id">
                                <?php  foreach($getAllUser as $key=>$value)
                                   { 
                                     if( $value['id']==	$getCommentById[0]['comment_user_id']){?>
                                         <option value="<?php echo $value['id'] ?>" selected="selected"><?php echo $value['last_name'].'_'. $value['first_name'] ?></option>
                                   <?php }
                                      else{ ?>
                                         <option value="<?php echo $value['id'] ?>" ><?php echo $value['last_name'].'_'. $value['first_name'] ?></option>
                                      <?php } ?>   
                                      <?php } ?>
                                      
                            </select>
						    	</div>     
									<div class="form-actions" method ="get">
										<button type="submit" class="btn btn-success">Add</button>
									</div>
								</div>
						</form>
          
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
