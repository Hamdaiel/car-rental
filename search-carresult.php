<?php 
session_start();
include('includes/config.php');

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<?php
include('includes\head.php');
?>
<style type="text/css">
   img{ max-width: 200px;
    max-height: 200px;
  }
</style>
</head>
<body>

<!--Header--> 
<?php include('includes/header.php');?>
<!-- /Header --> 
<div style="width:fill_parent;">
          <div style="">
                    <div class="widget_heading">
                    </div>
                    <div style="text-align: center; width:400px; margin-left: 35%;">
                    <div class="sidebar_filtr">
                      <form action="search-carresult.php" method="post">
                       <div> <div class="form-group select" >
                          <select class="form-control" name="brand" style="height:30px;">
                            <option>Select Brand</option>
                            
                            <option value="Toyota">Toyota</option>
                            <option value="BMW">BMW</option>
                            <option value="Mauriti">Mauriti</option>
                            <option value="Nissan">Nissan</option>
                          </select>
                        </div>
                      </div>
                        <div>
              <div class="form-group select">
          <select class="form-control" name="fueltype" style="height:30px;">
                  <option>Select Fuel Type</option>
          <option value="Petrol">Petrol</option>
          <option value="Diesel">Diesel</option>
          <option value="CNG">CNG</option>
                          </select>
                        </div></div>
                       
                        <div class="form-group">
                          <button type="submit" style="border-radius: 0px;" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
       <div class="result-sorting-wrapper">
          <div class="sorting-count">
<?php 
//Query for Listing count
$brand=$_POST['brand'];
$fueltype=$_POST['fueltype'];
$sql = "SELECT id from tblvehicles where tblvehicles.VehiclesBrand=:brand and tblvehicles.FuelType=:fueltype";
$query = $dbh -> prepare($sql);
$query -> bindParam(':brand',$brand, PDO::PARAM_STR);
$query -> bindParam(':fueltype',$fueltype, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<p><span><?php echo htmlentities($cnt);?> Matches Found</span></p>
</div>
</div>
</div>
  </div>
</section>
<hr>
<hr>
<?php 
       $sql1 = "SELECT * from tblvehicles where tblvehicles.VehiclesBrand=:brand and tblvehicles.FuelType=:fueltype" ;
       $query1 = $dbh -> prepare($sql1);
       $query1 -> bindParam(':brand',$brand, PDO::PARAM_STR);
       $query1 -> bindParam(':fueltype',$fueltype, PDO::PARAM_STR);
       $query1->execute();
       $results1=$query1->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query1->rowCount() > 0)
        {
        foreach($results1 as $result1)
        {  ?>
                <div class="product-listing-m gray-bg">
                  <div class="product-listing-img"><img src="newadmin/img/vehicleimages/<?php echo htmlentities($result1->Vimage1);?>" class="img-responsive" alt="Image"/></a>
                  </div>
                  <div class="product-listing-content">
                    <h5><?php echo htmlentities($result1->VehiclesBrand);?> , <?php echo htmlentities($result1->VehiclesTitle);?></a></h5>
                    <p class="list-price">ETB<?php echo htmlentities($result1->PricePerDay);?> Per Day</p>
                    <ul>
                      <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result1->SeatingCapacity);?> seats</li>
                      <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result1->ModelYear);?> model</li>
                      <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result1->FuelType);?></li>
                    </ul>
                    <a href="vehical-details.php?vhid=<?php echo htmlentities($result1->id);?>" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                  </div>
                </div>
<?php
}
}
?>

<?php 

?>
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 


<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
