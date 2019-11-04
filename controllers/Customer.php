<?php
// error_reporting(0);
include('controllers\account.php');
class customer extends account{
      private $fullname;
      private $idnumber;
      private $mobilenumber;
      private $dob;
      private $password;
      private $email;

      function __construct($email,$password,$fname,$mobile,$dateob,$idnum){
          $this->fullname=$fname;
          $this->idnumber=$idnum;
          $this->mobilenumber=$mobile;
          $this->dob=$dateob;
          $this->password=$password;
          $this->email=$email;
      }


      function ViewVehicles(){
            error_reporting(0);
            include('includes\config.php');
            $sql = "SELECT * from tblvehicles WHERE Reserved='no'";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {  ?>   
                    <div class="product-listing-m gray-bg" style="height:10%; box-shadow:0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) ">
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
      function ReserveC($std,$rtd,$anum,$td,$vvid){
            include('includes\config.php');
            include('controllers\reservation.php');
            $reservation=new reservation();
            $reservation->callAll($std,$rtd,$anum,$td,$vvid);
            

      }
      function _register(){
          
          include('includes\config.php');
          $sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password,dob,IDnumber) VALUES(:fname,:email,:mobile,:password,:dateob,:idnum)";
          $query = $dbh->prepare($sql);
          $query->bindParam(':fname',$this->fullname,PDO::PARAM_STR);
          $query->bindParam(':email',$this->email,PDO::PARAM_STR);
          $query->bindParam(':mobile',$this->mobilenumber,PDO::PARAM_STR);
          $query->bindParam(':password',$this->password,PDO::PARAM_STR);
          $query->bindParam(':dateob',$this->dob,PDO::PARAM_STR);
          $query->bindParam(':idnum',$this->idnumber,PDO::PARAM_STR);
          $query->execute();
          $lastInsertId = $dbh ->lastInsertId();
    if($lastInsertId)
    {
    echo "<script>alert('Registration successfull. Now you can login');</script>";
    }
    else 
    {
       echo "<script>alert('Something Went Wrong');</script>";
    }

      
}




}

?>