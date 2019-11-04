
<?php
class vehicle{
	function addVehicle($vehicletitle,$brand,$vehicleoverview,$priceperday,$fueltype,$modelyear,$seatingcapacity,$vimage1){		
		try
		{
		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		}
		catch (PDOException $e)
		{
		exit("Error: " . $e->getMessage());
		} 
		$vehicletitle=$_POST['vehicletitle'];
		$brand=$_POST['brandname'];
		$vehicleoverview=$_POST['vehicalorcview'];
		$priceperday=$_POST['priceperday'];
		$fueltype=$_POST['fueltype'];
		$modelyear=$_POST['modelyear'];
		$seatingcapacity=$_POST['seatingcapacity'];
		$vimage1=$_FILES["img1"]["name"];
	
		$sql="INSERT INTO tblvehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1) VALUES(:vehicletitle,:brand,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vimage1)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
		$query->bindParam(':brand',$brand,PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
		$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
		$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
		$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);
		$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
		{
		echo "<script>alert('Vehicle posted successfully')</script>";
		}
		else 
		{
		echo "<script>alert('Erorr in Adding')</script>";
		}
	}
	function updateVehicle($vvid){
		$servername = "localhost";
		$username = "root";
		$password = "ttchewake1";
		$dbname = "carrental";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$query= "UPDATE tblvehicles SET Reserved='no' WHERE id=$vvid"; 
 		$result = mysqli_query($conn, $query);
 
	}
	function reserveVehicle($vvid){
		$servername = "localhost";
		$username = "root";
		$password = "ttchewake1";
		$dbname = "carrental";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$query= "UPDATE tblvehicles SET Reserved='yes' WHERE id=$vvid"; 
 		$result = mysqli_query($conn, $query);




	}

	}

?>