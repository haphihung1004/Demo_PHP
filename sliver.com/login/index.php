
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
      
         <div id="login">   
          <h1>Login</h1>
          
          <form action="login.php" method="post" autocomplete="off" enctype="multipart/form-data">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>
          <a href="createaccount.php">Create New Account</a>
          <p class="forgot"><a href="form_forgot.php">Forgot Password?</a></p>
         
          <button class="button button-block" name="login" />Log In</button>
          
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
