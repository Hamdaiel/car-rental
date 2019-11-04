<?php

class payment{
	private $accountNumber;
	private $TransactionID;
	private $ammount;
	function __construct($anum,$trid,$amount){
		$this->accountNumber=$anum;
		$this->TransactionID=$trid;
		$this->ammount=$amount;
	} 
	function addPay(){
		include('includes\db_connect.php');
		$date='2018-06-06';
		$query= "INSERT into tblpayment(AccountNum,TransID,Amount,Dater) VALUES('".$this->accountNumber."','".$this->TransactionID."','".$this->ammount."','".$date."')";
 		if($conn->query($query) == true){
 			echo "<script>alert('Succesfully Added Payment');</script>";
 			return true;
 		}
 		else{
 			echo "<script>alert('Error');</script>";
 			echo "Error: " . $query . "<br>" . $conn->error;
 			return false;
		}
	}
	function checkpayment($std,$rtd,$vvid){
		include('includes\db_connect.php');
		$query= "SELECT * FROM tblpayment WHERE AccountNum = '" .$this->accountNumber. "' and TransID = '" .$this->TransactionID. "' and Type='notused'";
	 	$result = mysqli_query($conn, $query);
	 	if ($row = mysqli_fetch_array($result)) {
	    	$amnt = $row['Amount'];
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
	 		return false;
	 	}
	}
	function deletePayment(){
		include('includes\db_connect.php');
		$query= "UPDATE tblpayment SET Type='used' WHERE TransID='".$this->TransactionID."'"; 
 		$result = mysqli_query($conn, $query);
 		if ($conn->query($query) == true) {
		
		}
		else{
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	}
}
?>