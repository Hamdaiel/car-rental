
<?php
class reservation
{

function CheckPay($std,$rtd,$anum,$td,$vvid){
	include('controllers\payment_controller.php');
	$thepayment=new payment();
	if ($thepayment->checkpayment($std,$rtd,$anum,$td,$vvid)==false){
 		return false;
 	}
 	else{
 		return true;
 	}	
}
function reserveVehicle($std,$rtd,$vvid,$td){
	include('controllers\vehicle_controller.php');
	$servername = "localhost";
	$username = "root";
	$password = "ttchewake1";
	$dbname = "carrental";
	$conn = new mysqli($servername, $username, $password, $dbname);

    $query1= "SELECT * FROM tblusers WHERE id='" .$_SESSION['user_id']. "'";
    echo $query1;
 	$result1 = mysqli_query($conn, $query1);
 	if ($row1 = mysqli_fetch_array($result1)) {
 		$email=$row1['EmailId'];
	}
	else{
		$email='testtestcom';
	}
	$query= "INSERT into tblbooking (userEmail,VehicleId,FromDate,ToDate) VALUES ('".$email."','".$vvid."','".$rtd."','".$vvid."')";
 	if ($conn->query($query) == true) {
 		$theVehicle=new vehicle();
		$thepayment1=new payment();
		$theVehicle->reserveVehicle($vvid);
		$thepayment1->deletePayment($td);
 	}	
 	 else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
}
function getConfirmationNumber(){





}
function callAll($std,$rtd,$anum,$td,$vvid){
 	if ($this->CheckPay($std,$rtd,$anum,$td,$vvid)==false){
 		echo "<script>alert('Sorry Ammount Paid Does Not Match Car Requierment')</script>";

	echo" userid= ".$_SESSION['user_id'];
 	}
 	else{
 		$this->reserveVehicle($std,$rtd,$vvid,$td);
 		$this->getConfirmationNumber();
 		
 	}

}
}


?>