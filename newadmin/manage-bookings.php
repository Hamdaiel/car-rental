<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Managment System</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
 </head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage Reservations</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Informations</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Email</th>
											<th>Vehicle</th>
											<th>From Date</th>
											<th>Due Date</th>
											
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

								<?php
								error_reporting(0);
          include('includes/config.php');
          $sql = "SELECT * from tblbooking WHERE stat='notret' ";
          $query = $dbh -> prepare($sql);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
          if($query->rowCount() > 0)
          {
                    foreach($results as $result)
                    { 

                    include('includes\db_connect');
                    $query= "SELECT * FROM tblvehicles WHERE id='".$result->VehicleId."'";
                    $result6 = mysqli_query($conn, $query);
                    if ($row = mysqli_fetch_array($result6)) {
                        $title= $row['VehiclesTitle'];
                      }
                    ?>  
                    <tr>


                      <td><?php echo htmlentities($cnt);?></td>
                      <td><?php echo htmlentities($result->userEmail);?></td>
                      <td><?php echo htmlentities($title);?></td>
                      <td><?php echo htmlentities($result->FromDate);?></td>
                      <td><?php echo htmlentities($result->ToDate);?></td>
                      <td> <a href="update.php?vhhid=<?php echo htmlentities("$result->VehicleId");?>" style="background-color: #555555 !important;" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Return</a></td>
                    </tr>
                    <?php $cnt=$cnt+1; 
                  }
                }
              
								?>
										
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--<script src="js/jquery.dataTables.min.js"></script> -->
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

