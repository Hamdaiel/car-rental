<?php
session_start();
include('includes\head.php');
include('includes\header.php');



$servername = "localhost";
$username = "root";
$password = "ttchewake1";
$dbname = "carrental";
$conn = mysqli_connect($servername, $username, $password, $dbname) ;
$query= "SELECT * FROM tblbooking WHERE id=(SELECT MAX(id) from tblbooking)";
$result = mysqli_query($conn, $query);
if ($row = mysqli_fetch_array($result)) {
    	$cnum = $row['id'];
    	echo "<div style='text-align:center;'><h2>Thank You For Using This Service Your Order Number is ".$cnum."</h2></div>";
    }
?>







<?php
include('includes\footer.php');
?>
