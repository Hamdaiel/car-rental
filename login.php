<?php
session_start();
if (isset($_SESSION['user_id'])){
  header('Location:index.php');
}

include('controllers/Customer.php');
if (isset($_POST['login'])) {
  include("includes\db_connect.php");
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $passwod = mysqli_real_escape_string($conn, $_POST['passwod']);
  $thisCust=new Customer($email,$passwod,"","","","");
    if($thisCust->_login($email,$passwod)==="True"){
      header('Location:index.php');
    }
    else{
      $error_message = "Incorrect Email or Password!!!";
    }
}

?>
<html>
<head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<?php
include("includes/head.php");?>
</head>
<body style="background-color: white;">
  <?php
  include("includes/header.php");
  ?>
  <div style="position: absolute; top:30%; left:10%;">
    <h2 style="color: white; font-family:'Lato', sans-serif ;">Welcome <br> CRMS Services</h2>
  </div>
<div>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Login</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email address*">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="passwod" placeholder="Password*">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="remember">
               
                </div>
                <div class="form-group">
                  <input type="submit" name="login" value="Login" class="btn btn-block">
                  <?php if (isset($error_message))
                  {echo "Incorrect Email";}?>
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Don't have an account? <a href="registration.php" data-toggle="modal" data-dismiss="modal">Signup Here</a></p>
      </div>
    </div>
  </div>
</div>
<?php
  include("includes/footer.php");
  ?>
</body>
</html>