<?php 
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<?php
include('includes\head.php');?>
</head>
<body>  

<?php include('includes/header.php');?>
<?php 
  $vhid=intval($_GET['vhid']);    
  $sql = "SELECT * from tblvehicles WHERE id=".$vhid;
  $query = $dbh -> prepare($sql); 
  $query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
if($query->rowCount() > 0)
{
  foreach($results as $result)
{  
     $_SESSION['brndid']=$result->VehiclesBrand;  
?>  


<section class="listing-detail" style="margin-top: -10px;" >
  <div class="container" style="padding-left: 13%; border-right: 1px solid #d9d9d9; border-left: 1px solid #eeeeee; ">
    <div class="listing_detail_head row">
      <div class="col-md-4">
        <h2><?php echo htmlentities($result->VehiclesBrand);?> , <?php echo htmlentities($result->VehiclesTitle);?></h2>
      </div>
      <div class="col-md-3">
        <div class="price_info" >
          <p style="color: #337ab7!important;">Birr <?php echo htmlentities($result->PricePerDay);?> </p>Per Day
         
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
          
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->ModelYear);?></h5>
              <p>Reg.Year</p>
            </li>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->FuelType);?></h5>
              <p>Fuel Type</p>
            </li>
       
            <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->SeatingCapacity);?></h5>
              <p>Seats</p>
            </li>
            <li>
              <div class="col-md-4" style="float: left;">
            <img class="d-block w-100" src="newadmin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" alt="First slide">
        </div>   
        <div class="col-md-4" style="float: left;">
            <img class="d-block w-100" src="newadmin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" alt="First slide">
        </div>
        <div class="col-md-4" style="float: left;">
            <img class="d-block w-100" src="newadmin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" alt="First slide">
        </div>                  
            </li>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" ><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>
            </ul>
            <div class="tab-content"> 
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                <p><?php echo htmlentities($result->VehiclesOverview);?></p>
              </div>
            </div>
          </div>
          
        </div>
<?php }} ?>
   
      
      
          <form method="post">
          <?php if($_SESSION['user_id'])
              {?>
              <div class="form-group" style="">
                <a href="reservepage.php?vhhid=<?php echo htmlentities($_GET["vhid"]);?>"><input class="btn" style="width: 200px;" name="submit" value="Proceed to Pay"></a>
              </div>
              <?php } else { ?>
                <a href="reservepage.php?vhhid=<?php echo htmlentities($_GET["vhid"]);?>" style="background-color: #555555 !important;" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login To Reserve</a>

              <?php } ?>
          </form>
      </div>
    </div>
     
    
  </div>
</section>

<?php include('includes/footer.php');?>
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
 


</body>
</html>