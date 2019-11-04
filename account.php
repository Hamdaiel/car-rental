<?php
function _login(){
include('includes/db_connect.php');
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and pass = '" . md5($password). "'");
  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['user_id'] = $row['uid'];
    $_SESSION['user_name'] = $row['user'];    
    header("Location: index.php");
  } else {
    $error_message = "Incorrect Email or Password!!!";
  }
}
}

function _register(){

	
}

?>