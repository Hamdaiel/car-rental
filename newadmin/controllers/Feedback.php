<?php
class feedback{
	function GiveFeedback($msg,$cid){
		$servername = "localhost";
		$username = "root";
		$password = "ttchewake1";
		$dbname = "carrental";
		$conn = new mysqli($servername, $username, $password, $dbname);

		$query1= "SELECT * from tblusers where id=$cid";
		$result = mysqli_query($conn, $query1);
		if($row=mysqli_fetch_array($result)){
			$email=$row['EmailId'];
		}
		$query2= "INSERT into tbltestmonial(UserEmail,Testimonial) VALUES ($email,$msg)";

	}

}


?>