
<?php
error_reporting(0);
class vehicle{
	private $vlid;
	private $vehicletitle;
	private $brand;
	private $modelyear;
	private $seat;
	private $fueltype;
	private $price;
	private $vehicleOV;
	private $imgg;
	function __construct($vehicletitle1,$brand1,$modelyear1,$seatingcapacity1,$fueltype1,$priceperday1,$vehicleoverview1,$vimage11){
		$this->vehicletitle=$vehicletitle1;
		$this->brand=$brand1;
		$this->modelyear=$modelyear1;
		$this->seat=$seatingcapacity1;
		$this->fueltype=$fueltype1;
		$this->price=$priceperday1;
		$this->vehicleOV=$vehicleoverview1;
		$this->imgg=$vimage11;
	}
	function addVehicle(){
		try
		{
			$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		}
		catch (PDOException $e)
		{
			exit("Error: " . $e->getMessage());
		} 
		$ff="xx";
		$sql="INSERT INTO tblvehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1) VALUES(:vehicletitle,:brand,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vimage1)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':vehicletitle',$this->vehicletitle,PDO::PARAM_STR);
		$query->bindParam(':brand',$this->brand,PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview',$this->modelyear,PDO::PARAM_STR);
		$query->bindParam(':priceperday',$this->seat,PDO::PARAM_STR);
		$query->bindParam(':fueltype',$this->fueltype,PDO::PARAM_STR);
		$query->bindParam(':modelyear',$this->price,PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity',$this->vehicleOV,PDO::PARAM_STR);
		$query->bindParam(':vimage1',$this->imgg,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
		{
		echo "<script>alert('Vehicle posted successfully')</script>";
		}
		else 
		{
		echo "Error: " . $query . "<br>" . $conn->error;
		}
	}
	function updateVehicle($vvid){
		include('includes\db_connect.php');
		$query= "UPDATE tblvehicles SET Reserved='no' WHERE id=$vvid"; 
 		$result = mysqli_query($conn, $query);
 
	}
	function reserveVehicle($vvid){
		include('includes\db_connect.php');
		$query= "UPDATE tblvehicles SET Reserved='yes' WHERE id=$vvid"; 
 		$result = mysqli_query($conn, $query);
	}

	}

?>