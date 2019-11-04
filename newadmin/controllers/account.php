<?php
class account{

  private $email;
  private $passwod;
  function _login($em,$pass){
    $this->email=$em;
    $this->passwod=$pass;
    include("includes\db_connect.php");
    $email = mysqli_real_escape_string($conn, $email);
    $passwod = mysqli_real_escape_string($conn, $passwod);
    $query= "SELECT * FROM tblusers WHERE EmailId = '" . $email. "' and Password = '" .md5($passwod). "'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_array($result)) {
      $_SESSION['user_id'] = $row['id'];
      return "True";   
    } 
    else {
      return "False";
    }
  }

  function _loginA($em,$pass){
      $this->email=$em;
      $this->passwod=$pass;
      error_reporting(0);
      include("includes\db_connect.php");
      include('includes\config.php');
        $sql ="SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $this->email, PDO::PARAM_STR);
        $query-> bindParam(':password', $this->passwod, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
        $_SESSION['alogin']=$_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
        } else{
          
          echo "<script>alert('Invalid Details');</script>";

        }
  }
}

?>