<?php

function _login($email,$passwod){
  include("includes\db_connect.php");
  $email = mysqli_real_escape_string($conn, $email);
  $passwod = mysqli_real_escape_string($conn, $passwod);
  $query= "SELECT * FROM tblusers WHERE EmailId = '" . $email. "' and Password = '" .md5($passwod). "'";
  echo $query;
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['user_id'] = $row['id'];
    return "True";   
  } 
  else {
    return "False";
  }
}



function _register(){

	
}

?>