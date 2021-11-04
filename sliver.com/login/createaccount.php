<?php 
/* Main page with two forms: sign up and log in */
require "./../config/database.php";
require "./../model/db.php";
require "./../model/user.php";
$user=new User;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./../assets/public_login/css/style.css">
</head>
<style>

.img_view{
    padding-top:30px;
    padding-left:150px;
    padding-bottom:30px;
   
}
.img_view img{
  border:5px solid rgba(19, 35, 47, 0.3);
  border-radius:100px;
}
</style>

<body>

  <div class="form">
          
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="register.php" method="post" autocomplete="off" enctype="multipart/form-data">
          
            <input type="file" name="access_img" onchange="preview()">
            <div class="img_view">
                  <img id="thumb"  src="" width="200px" heigh="200px"/>
            </div>
          

          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
          </div>

         
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'/>
          </div>
          <p class="forgot"><a href="index.php">Return login</a></p>
          <button type="submit" class="button button-block" name="register" />Register</button>
          
          </form> 
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script src="./../assets/public_login/js/index.js"></script>
  <script type="text/javascript">
        function preview() {
        thumb.src=URL.createObjectURL(event.target.files[0]);
      }
</script>
</body>
</html>
