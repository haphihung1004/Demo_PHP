<?php
require_once './../config/database.php';

spl_autoload_register(function ($className) {
    require './../model/' . $className . '.php';
});
$path = explode('=', $_SERVER['REQUEST_URI']);

$id = $path[count($path) - 1];

if( isset($id))
{
   
   if(isset($_COOKIE['user_ID']))
     setcookie("user_ID", $id, time() + 86400,"/");
  else
      header("location: ./../login/error.php");
}

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
              <h1 class="page-header-title">Products List</h1>
            </div>
          </div>
          <br> 
          <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
              <a href="./view_add_products.php">Add New Products</a>
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
								<th>Image</th>
								<th>Name</th>
								<th>Protype</th>
                <th>Manufacture</th>
								<th>Description</th>
								<th>Price (VND)</th>
								<th>Action</th>
							</tr>
							</thead>

              <tbody>
                  <?php 
                    $page=isset($_GET['page'])?$_GET['page']:1;
                    $per_page=5;
                    $products= new Products;
                    $getAllProduct=$products->PerPage($page,$per_page);
                    $total_Row=sizeof($products->TolTal());
                      ?>
                  <?php foreach($getAllProduct as $key=>$value)  { 
                    
                    ?>
                <tr>
                  <td><img  src="./../assets/public_user/images/<?php echo $value['image']?> " alt="" width="100px"></td>
                  
                  <td><a href="detail_products.php?ID=<?php echo $value['ID']?>"><?php echo $value['name']?></a></td>
                  <td><?php echo $value['type_name']?></td>
                  <td><?php echo $value['manu_name']?></td>
                  <td><?php echo $value['description']?></td>
                  <td><?php echo number_format($value['price'])?></td>
                  <td>
                    <a href="detail_products.php?ID=<?php echo $value['ID'] ?>" class="btn-edit ">Edit</a>
                    <br>
                    <a href="./action/delete/deleteProducts.php?delete=<?php echo $value['ID']?>" class="btn-delete ">Delete</a>
                  </td>
                </tr>
                <?php } ?>
                <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Tổng products:<?php echo $total_Row ?> </td>
                      <td></td>
                      <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                        <ul class="pagination">
                      <?php
                        $dislay=$products->dislay($total_Row,$per_page);
                      
                      ?>
                      </ul>
                  </td>
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
