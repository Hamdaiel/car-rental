<?php 
error_reporting(0);
session_start();
include('includes/config.php');

?>

<!DOCTYPE HTML>
<html lang="en">
<?php
include('includes/head.php');
?>
<style>
  img{ max-width: 200px;
    max-height: 200px;
  }
</style>
<body>

  

<!--Header--> 
<?php include('includes/header.php');?>

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

<section class="listing-page">
  <div class="container">
    <div class="row" style="box-shadow: none;">
        <div class="result-sorting-wrapper" style="border-radius: 5px; background-color: #ffffff; border-top:1px solid #e5e5e5; ">
          <div class="sorting-count">
<?php 
//Query for Listing count
$sql = "SELECT id from tblvehicles WHERE Reserved='no'";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<p style="font-size: 14px;"><span><?php echo htmlentities($cnt);?> Cars</span></p>
</div>
</div>

<?php 
include('controllers\Customer.php');
$cust=new customer(" "," "," "," "," "," ");
$cust->ViewVehicles();
 ?>
         </div> 
    </div>
</section>
<?php include('includes/footer.php');?>

<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>

</body>
</html>
