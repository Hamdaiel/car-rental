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
	
	<title>Car Rental Portal |Admin Manage Vehicles   </title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">	
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
<form action="manage-vehicles.php" method="GET">
						<h2 class="page-title">Manage Vehicles</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Vehicle Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Vehicle Title</th>
											<th>Brand </th>
											<th>Price Per day</th>
											<th>Fuel Type</th>
											<th>Model Year</th>
											<th>Reserved</th>
											<th>Action</th>
										</tr>
									</thead>
						<?php
						error_reporting(0);
					   include('includes/config.php');
					?>
					<tbody>
					<?php $sql = "SELECT * from tblvehicles";
					$query = $dbh -> prepare($sql);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1;
					if($query->rowCount() > 0)
					{
					foreach($results as $result)
					{       ?>  
                    <tr>
                      <td><?php echo htmlentities($cnt);?></td>
                      <td><?php echo htmlentities($result->VehiclesTitle);?></td>
                      <td><?php echo htmlentities($result->VehiclesBrand);?></td>
                      <td><?php echo htmlentities($result->PricePerDay);?></td>
                      <td><?php echo htmlentities($result->FuelType);?></td>
                      <td><?php echo htmlentities($result->ModelYear);?></td>
                      <td><?php echo htmlentities($result->Reserved);?></td>
                      <td>
                        <input type="hidden" name="VehiclesTitle" value="<?php echo htmlentities($result->VehiclesTitle); ?>">
                        <input type="hidden" name="BrandName" value="<?php echo htmlentities($result->BrandName);?>">
                        <a href="update.php?vhhid=<?php echo htmlentities("$result->id");?>" style="background-color: #555555 !important;" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Remove</a>
                    </tr>
                    <?php $cnt=$cnt+1; }} ?>
                    </form>
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
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

