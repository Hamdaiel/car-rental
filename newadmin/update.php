<?php
$vvid=$_GET["vhhid"];
include ('controllers\Manager.php');

$themanager=new manager();
$themanager->updateReservationandVehicle($vvid);
header("Location:manage-bookings.php");

  ?>