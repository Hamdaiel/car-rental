<?php
error_reporting(0);
class payment{
	function addPay($anum,$trid,$amount){
		$servername = "localhost";
		$username = "root";
		$password = "ttchewake1";
		$dbname = "carrental";
		echo "inpayment";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		echo "ynn";
		echo getdate(); 
		$date='2018-06-06';
		$query= "INSERT into tblpayment(AccountNum,TransID,Amount,Dater) VALUES('".$anum."','".$trid."','".$amount."','".$date."')";
		echo "query ".$query;
 		if($conn->query($query) == true){
 			return true;
 		}
 		else{
 			 echo "Error: " . $query . "<br>" . $conn->error;
 			return false;
		}

	}
	function checkpayment($std,$rtd,$anum,$td,$vvid){
	$servername = "localhost";
	$username = "root";
	$password = "ttchewake1";
	$dbname = "carrental";
	$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

	$query= "SELECT * FROM tblpayment WHERE AccountNum = '" . $anum. "' and TransID = '" .$td. "' and Type='notused'";
	echo $query;
 	$result = mysqli_query($conn, $query);
 	if ($row = mysqli_fetch_array($result)) {
    	$amnt = $row['Amount'];

    	$servername = "localhost";
		$username = "root";
		$password = "ttchewake1";
		$dbname = "carrental";
		$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

    	$query1= "SELECT * FROM tblvehicles WHERE id='" . $_GET['vhhid']. "'";
 		$result1 = mysqli_query($conn, $query1);
 		if ($row1 = mysqli_fetch_array($result1)) {
 			$ppday=$row1['PricePerDay'];
 			$d1=date_create($std);
 			$d2=date_create($rtd);
 			$day=$d2->diff($d1);
 			$tdays =$day->format('%d')+1;
 			$TotalPrice=$ppday*$tdays;
		}
		if ($amnt!=$TotalPrice){
 			return false;
 		}
 		else{
 			return true;
 		}
	}
	else{
 		echo "<script>alert('Sorry No Transaction found!')</script>";
 	}

	}
	function deletePayment($td){
		$servername = "localhost";
		$username = "root";
		$password = "ttchewake1";
		$dbname = "carrental";
		$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
		echo "passing payment";
		$query= "UPDATE tblpayment SET Type='used' WHERE TransID='".$td."'"; 
 		$result = mysqli_query($conn, $query);
 		if ($conn->query($query) == true) {
			echo $query;}
		else{
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	}



}


?>