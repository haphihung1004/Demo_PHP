<?php
require_once './../config/database.php';

spl_autoload_register(function ($className) {
    require './../model/' . $className . '.php';
});

session_start();
if(isset($_GET['p']))
{
	$id=$_GET['p'];
	if(isset($_SESSION['cart'][$id]))
	{
		$_SESSION['cart'][$id]+=1;
	}
	else {$_SESSION['cart'][$id]=1;}
}
?>
<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index28:48-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sliver.com</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="./../assets/public_user/images/favicon.png">
        <?php require("./link/link_css.html") ?>
    </head>
    <body>
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <?php require("./header/header.php") ?>
            <!-- Header Area End Here -->
            <!-- Begin Slider With Banner Area -->
            <?php require("./slider/slider.html") ?>
            <!-- Slider With Banner Area End Here -->
            <div class="container">
            <!--line 1 -->
        
            <!-- Begin Product Area -->
            <div class="product-area pt-60 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            
                   
                </div>            
            </div>          
                   
            <!-- Product Area End Here -->
            <!-- Begin Li's Static Banner Area -->
            <?php require("./banner/banner.html") ?>
            <!-- Li's Static Banner Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-60 pb-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                    <ul class="nav li-product-menu">
                                    <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li>
                                    </ul>               
                                </div>
                                <!-- Begin Li's Tab Menu Content Area -->
                            </div>
                        </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                <?php
                                        $products= new Products;
                                        $getAllProduct=$products->getAllProducts();
                                        foreach($getAllProduct as $key=>$value)
                                        {
                                ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="./../assets/public_user/images/<?php echo $value['image']?> " alt="">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="shop-left-sidebar.html"><?php echo substr($value['description'],0,40)?></a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="detail.php?id=<?php echo $value['ID']?>"><?php echo $value['name']?></a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price"><?php echo number_format($value['price'])?></span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Li's Laptop Product Area End Here -->
           
            <!-- Begin Li's Static Home Area -->
            <div class="li-static-home">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Li's Static Home Image Area -->
                            <div class="li-static-home-image"></div>
                            <!-- Li's Static Home Image Area End Here -->
                            <!-- Begin Li's Static Home Content Area -->
                            <div class="li-static-home-content">
                                <p>Sale Offer<span>-20% Off</span>This Week</p>
                                <h2>Featured Product</h2>
                                <h2>Meito Accessories 2018</h2>
                                <p class="schedule">
                                    Starting at
                                    <span> $1209.00</span>
                                </p>
                                <div class="default-btn">
                                    <a href="shop-left-sidebar.html" class="links">Shopping Now</a>
                                </div>
                            </div>
                            <!-- Li's Static Home Content Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Li's Static Home Area End Here -->
           

            <div class="content" style="padding-top:30px">
                <div class="container">
                <h3 style="text-align: center">List Product</h3>
                <br>
            <!--line 1 -->
                <div class="row">
                    <table id="customers">
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        
                            <?php
                             $sum=0;
                               if(isset($_GET['p']))
                              {
                               
                                $product = new Products;
                                foreach($_SESSION['cart'] as $id=>$value)
                                {
                                    $getAllProducts=$product->getProductsId($id);
                                    $sum+=$getAllProducts[0]['price'];
                                ?>
                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $getAllProducts[0]['name']?></td>	
                                    <td><?php echo $value?></td>
                                    <td><?php echo  number_format($getAllProducts[0]['price'])?></td>
                                    <td><a href="delcart.php?p=<?php echo $id?>">Delete</a></td>
                                </tr>
                                <?php } 
                                }?>
                        
                    </table>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="sum_money">
                             Tổng tiền :<?php echo number_format($sum) ?> VNĐ
                      </div>
                    </div>
                  
                </div> 
         </div> 
         <h3 style="text-align:center;padding-top:50px">CẬP NHẬT ACCOUNTS</h3>
         <div class="widget-content nopadding">
						<?php 
							$id=$_COOKIE['user_ID'];
							$pro = new User;
							$getUserById = $pro->getUserById($id);
							//var_dump($getAllProductsBYid);
							
							?>
					   <form action="updateUser.php?id=<?php echo $getUserById[0]['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                           <div class="control-group">
                                <label  for="fname">Email:</label>
                                <label  for="fname" name="email"><?php echo $getUserById[0]['email'] ?></label>
                            </div>
                            <br>     
                            <div class="control-group">
								<label class="control-label">Access :</label>
								<label  for="fname" name="access">user</label>
								
                            </div>    
                            <br>
                            <div class="control-group">
								<label  for="fname">Password:</label>
								<input type="text" id="fname" name="password" value="<?php echo $getUserById[0]['password'] ?>"/> 
                            </div>
                            <br>
                            <div class="control-group">
								<label  for="fname">First name:</label>
								<input type="text" id="fname"   name="first_name" value="<?php echo $getUserById[0]['first_name'] ?>"/> 
                            </div>
                            <br>
                            <div class="control-group">
								<label  for="fname">Last name:</label>
								<input type="text" id="fname"  name="last_name" value="<?php echo $getUserById[0]['last_name'] ?>"/> 
                            </div>
                            <br>
                           
							<div class="control-group">
								<label class="control-label">Choose a access :</label>
								
								<select name="access">
                                  <option value="user" >user</option>
                                </select>
                            </div>    
								<div style="padding-top:30px;padding-bottom:30px;">
										<label for="fname">Choose an image :</label>   
										<input type="file" name="access_img" id="fileUpload" onchange="preview()">
										<div class="img_view">
												<img id="thumb"  src="./../assets/public_user/images/<?php echo $getUserById[0]['access_img'] ?>" width="200px" heigh="200px"/>
										</div>
								</div>
									<div class="form-actions" method ="get">
										<button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                    <br><br>
								</div>

						</form>
						
				</div>
     <?php require("./footer/footer.html") ?>
     </div> 
    <?php require("./link/link_js.html") ?>
    <script type="text/javascript">
        function preview() {
        thumb.src=URL.createObjectURL(event.target.files[0]);
      }
	  
    </script>
    </body>
</html>
    