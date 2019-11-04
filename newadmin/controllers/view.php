<?php
function ViewAllCars(){
error_reporting(0);
  include('includes\config.php');
  $sql = "SELECT * from tblvehicles WHERE Reserved='no'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>   
        <div class="product-listing-m gray-bg" style="height:10%; ">
          <div class="product-listing-img"><img src="newadmin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" st /> </a>
          </div>
          <div class="product-listing-content">
            <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->VehiclesBrand);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h5>
            <p class="list-price">ETB-<?php echo htmlentities($result->PricePerDay);?> Per Day</p>
            <ul>
              <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> model</li>
              <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
            </ul>
          </div>
        </div>

      <?php }}
}

function viewAvailableCars(){
          error_reporting(0);
          include('includes/config.php'); 

          ?>
          <style type="text/css">
           img{ 
            max-width: 200px;
            max-height:200px;
            }
          </style>
            <section  class="section-padding gray-bg">
            <div class="container">
              <div class="row"> 
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="resentnewcar">

          <?php 
          $sql = "SELECT * from tblvehicles";
          $query = $dbh -> prepare($sql);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
          if($query->rowCount() > 0)
          {
          foreach($results as $result)
          {  

          ?>  

          <div class="col-list-3" style="float: none; height:200px ; width: 35%;">
          <div class="recent-car-list" style="border-radius: 10px; " >
          <div class="car-info-box" style="float: left;"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="newadmin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image"></a>
          <ul>
          <li><i class="fa fa-car" aria-hidden="true" style="float: left;"></i><?php  echo htmlentities($result->FuelType);?></li>
          <li><i class="fa fa-calendar" aria-hidden="true" style="float: left;"></i><?php echo htmlentities($result->ModelYear);?> Model</li>
          <li><i class="fa fa-user" aria-hidden="true" style="float: left;"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
          </ul>
          </div>
          <div class="car-title-m">
          <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->VehiclesTitle);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
          <span class="price">Birr <?php echo htmlentities($result->PricePerDay);?> /Day</span> 
          </div>
          <div class="inventory_info_m" style="height: 100px;">
          <p><?php echo substr($result->VehiclesOverview,0,70);?></p>
          </div>
          </div>
          </div>
          <?php }}?>
            <?php 
              if($query->rowCount() ==0)
              {
                echo "<p style='text-align:center; height:10px;'>Sorry! No Cars Available Now</p>";
              }
            ?>
                </div>
              </div>
            </div>
          </section>
          <?php
}
  ?>


<?php
function search(){
  error_reporting(0);
  include('includes/config.php'); 
            ?>
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
                <?php
              }
              ?>
<?php
function searchcar($vbrd,$feul){

     }
?>
<?php  
function viewVehiclesMadeAvailable(){
  error_reporting(0);
  include('includes\config.php');
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
                        <input type="submit" value="<?php  echo htmlentities($cnt);?>" name="Returned"></td>
                    </tr>
                    <?php $cnt=$cnt+1; 
                  }
                }
              }

                ?>
                    </form>
                  </tbody>
                  <?php
function viewAllReservation(){
          error_reporting(0);
          include('includes/config.php');
          $sql = "SELECT * from tblbooking ";
          $query = $dbh -> prepare($sql);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
          if($query->rowCount() > 0)
          {
                    foreach($results as $result)
                    { 

                    $servername = "localhost";
                    $username = "root";
                    $password = "ttchewake1";
                    $dbname = "carrental";    
                    $conn = mysqli_connect($servername, $username, $password, $dbname) ;
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
                    </tr>
                    <?php $cnt=$cnt+1; 
                  }
                }
              }
                 ?>