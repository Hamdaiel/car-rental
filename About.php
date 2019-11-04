<?php
include('includes/config.php'); 
error_reporting(0);
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
  <style type="text/css">
    #list{
font-size:23px;


    }

  </style>
<?php
include('includes\head.php');
?>
</head>
<body>

  
<?php include('includes/header.php');?>

<p >
<div style="font-size: 23px; text-align: center; padding-left: 20%; padding-right: 20%;"  > 
This website is intended for making the process of renting cars easy.It uses the latest technology of commercial bank of ethiopia which is CBE for the payment process.</br>The steps of how to rent



<ul style="list-style: none; " id="list">
<li>Search a car</li>
<li>Click on description</li>
<li>Click on the Reserve button</li> 
<li>Log in if you didn't</li>
<li>Send the money using CBE</li>
<li>Enter the Transaction Id sent by CBE on the appropriate field</li>
<li>Fill the form</li>
</div>

</ul>
</div>


</p>
<?php include('includes/footer.php');?>
 