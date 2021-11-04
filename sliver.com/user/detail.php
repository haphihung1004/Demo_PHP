<?php
require_once './../config/database.php';

spl_autoload_register(function ($className) {
    require './../model/' . $className . '.php';
});
$path = explode('=', $_SERVER['REQUEST_URI']);
$id = $path[count($path) - 1];


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
        <style>
        .fa-star {
            color: #888;
            margin-right: 5px;
            cursor: pointer;
            font-size:20px;
        }

        .rate {
            color: gold;
        }

        .fa-star:hover {
            color: gold;
        } 
        #commentArea {
            padding-left:100px;
            padding-bottom:30px;
        }
       #commentArea img{
            border:1px solid red;
            border-radius:100px;
       }
       #commentArea p{
           font-size:30px;
       }
    </style>
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
                <h3 style="text-align: center"> Product detail</h3>
                <br>
                <?php
                   
                    $products = new Products;
                    $getProducts = $products->getProductsID($id);
                    //var_dump($getProducts);
                    foreach($getProducts as $value)
                    {
                ?>
                <div class="row">
                    <div class="col-md-5">
							<img class="large-pic" src="./../assets/public_user/images/<?php echo $value['image']?> ">			
                    </div>
                    <div class="col-md-7 add_cart">
                        <h3><?php echo $value['name'] ?></h3>
                        <p class="price"><?php  echo "Gia: ".number_format($value['price']) ?></p>
                        <p ><?php   echo $value['description']?></p>
                        <div class="addcart"><<<?php  echo "<a  href='addcart.php?p=".$id."'>Add To cart</a>" ?>>></div>
					
					</div>
			   </div>					
               <?php } ?>
               
               <h3 style="padding-top:100px;border-bottom:1px solid red;">Add Commnent</h3>
               <div class="comment">
                    <label for="rating">Rate:</label>
                    <ul id="rating" style="list-style:none; padding-left:0; display:flex;margin-bottom: 5px;">
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </li>
                    </ul>
                    <label for="validationTextarea">Comment:</label>
                    <textarea class="form-control" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                    <button class="btn btn-primary px-4 mt-2" id="btnPost">Post</button>
            </div>
            <h3 style="padding-top:100px;border-bottom:1px solid red;">List Commnent</h3>
            
               
            <div id="commentArea">
                
            </div>
            
         </div>
         <?php require("./footer/footer.html") ?>
    </div>    
    
        <?php require("./link/link_js.html") ?>
        <script>
            const productId = <?php echo $id; ?>;
       </script>
     <script src="./../assets/public_user/js/comment.js"></script>
     
    </body>
</html>


