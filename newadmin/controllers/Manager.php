<?php
include('controllers\account.php');
class Manager extends account
{
	private $username;
	private $password;
	
	function addPayment($accnum,$txnid,$amnt)
	{
		include('controllers\payment.php');
		$newpayment=new payment($accnum,$txnid,$amnt);
		$newpayment->addpay();
	}
	function addvehicle($vehicletitle,$brand,$vehicleoverview,$priceperday,$fueltype,$modelyear,$seatingcapacity,$vimage1)
	{
		include('controllers\vehicle.php');
		$newvehicle=new vehicle($vehicletitle,$brand,$vehicleoverview,$priceperday,$fueltype,$modelyear,$seatingcapacity,$vimage1);
		$newvehicle->addVehicle();
	}
	function updateReservationandVehicle($vvid)
	{
		include ('controllers\vehicle.php');
		$theVehicle=new vehicle();
		$theVehicle->updateVehicle($vvid);
		header("Location:manage-bookings.php");
	}

}

?>