
<?php
class reservation
{
	private $UserEmail;
	private $vehicleId;
	private $stDate;
	private $retDate;

	function CheckPay($anum,$td){
		include('controllers\payment.php');
		$thepayment=new payment($anum,$td," ");
		if ($thepayment->checkpayment($this->stDate,$this->retDate,$this->vehicleId)==false){
	 		return false;
	 	}
	 	else{
	 		return true;
	 	}	
	}
	function reserveVehicle($td){
		include('controllers\vehicle.php');
		include('includes\db_connect.php');
	    $query1= "SELECT * FROM tblusers WHERE id='" .$_SESSION['user_id']. "'";
	 	$result1 = mysqli_query($conn, $query1);
	 	if ($row1 = mysqli_fetch_array($result1)) {
	 		$this->UserEmail=$row1['EmailId'];
		}
		else{
			$this->UserEmail='testtestcom';
		}

		$query= "INSERT into tblbooking (userEmail,VehicleId,ToDate) VALUES ('".$this->UserEmail."','".$this->vehicleId."','".$this->stDate."')";
	 	if ($conn->query($query) == true) {
	 		echo "is true";
	 		$theVehicle=new vehicle();
			$thepayment1=new payment(" ",$td," ");
			$theVehicle->reserveVehicle($this->vehicleId);
			$thepayment1->deletePayment();

	 	}	
	 	 else {
	 	 echo " vid is".$this->vehicleId;
	    echo "Error: " . $query . "<br>" . $conn->error;
	}
	}
	function callAll($std,$rtd,$anum,$td,$vvid){
		$this->vehicleId=$vvid;
		$this->stDate=$std;
		$this->retDate=$rtd;
		
	 	if ($this->CheckPay($anum,$td)==false){
	 		echo "";
	 		return false;
	 	}
	 	else{
	 		$this->reserveVehicle($td);
	 		header('Location:success.php'); 	
		
	 	}

	}
}


?>