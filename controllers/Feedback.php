<?php
error_reporting(0);
class feedback{
	private $UserID;
	private $comment;
	function __construct($msg,$cid){
		$this->UserID=$cid;
		$this->comment=$msg;
	}
	function GiveFeedback(){
		include('includes\db_connect.php');
		$query1= "SELECT * from tblusers where id=$this->UserID";
		$result = mysqli_query($conn, $query1);
		if($row=mysqli_fetch_array($result)){
			$email=$row['EmailId'];
		}
		else{
			$email="null";
		}
		$query2= "INSERT into tbltestimonial (UserEmail,Testimonial) VALUES ('".$email."','".$this->comment."')";
		$result2 = mysqli_query($conn, $query2);
		echo "<script>alert('Your FeedBack Has Been Sent Thank you!')</script>";
	}

}


?>