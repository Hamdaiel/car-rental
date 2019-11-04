<?php
error_reporting(0);
class account{
	private $email;
	private $passwod;
	function _login($em,$pass){
	  $this->email=$em;
	  $this->passwod=$pass;

	  include("includes\db_connect.php");
	  $email = mysqli_real_escape_string($conn, $this->email);
	  $passwod = mysqli_real_escape_string($conn, $this->passwod);
	  $query= "SELECT * FROM tblusers WHERE EmailId = '" . $email. "' and Password = '" .md5($passwod). "'";
	  $result = mysqli_query($conn, $query);
	  if ($row = mysqli_fetch_array($result)) {
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['login'] = $_POST["email"];
	    return "True";   
	  } 
	  else {
	    return "False";
	  }
	}

	function _loginA($em,$pass){
		$this->email=$em;
	  	$this->passwod=$pass;
	  	include("includes\db_connect.php");
		  $email = mysqli_real_escape_string($conn, $email);
		  $passwod = mysqli_real_escape_string($conn, $passwod);
		  $query= "SELECT * FROM admin WHERE UserName = '" . $email. "' and Password = '" .md5($passwod). "'";
		  $result = mysqli_query($conn, $query);
		  if ($row = mysqli_fetch_array($result)) {
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['login'] = $_POST["email"];
		    return "True";   
		  } 
		  else {
		    return "False";
		  }
	}
}

?>