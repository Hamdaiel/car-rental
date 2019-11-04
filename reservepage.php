<?php
session_start();
include('includes/head.php');
if (isset($_SESSION['user_id'])){
  
}
else{
	header("Location:login.php");
}
if(isset($_POST['reserver'])){
	$stdate=$_POST['FromDate'];
	$rtdate=$_POST['ReturnDate'];
	$accnumber=$_POST['accnumber'];
	$tid=$_POST['TransactionID'];
	$vid=$_GET['vhhid'];
	include('controllers\Customer.php');
	$cust=new customer(" "," "," "," "," "," ");	
if($cust->reserveC($stdate,$rtdate,$accnumber,$tid,$vid)){
  $errmsg="";
}
else{
  $errmsg="Invalid Payment Details"; 
}
} 
  



include('includes\header.php');
?>
<div>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Reserve</h3>
      </div>
      <?php if (isset($errmsg))
              {
                echo "<p style='color:red;'> $errmsg </p>";
              }             ?>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post">

                <div class="form-group">
                  <label>Start Date</label>
                  <input type="date" class="form-control" name="FromDate" placeholder="">
                </div>

                <div class="form-group">
                  <label>Return Date</label>
                  <input type="date" class="form-control" name="ReturnDate" placeholder="">
                </div>

                 <div class="form-group">
                  <label>Account Number</label>
                  <input type="text" class="form-control" name="accnumber" placeholder="Account Number/Mobile Number">
                </div>

                 <div class="form-group">
                  <label>Transaction Number</label>
                  <input type="text" class="form-control" name="TransactionID" placeholder="Transaction ID">
                </div>

                <div class="form-group">
                  <input type="submit" name="reserver" value="Pay" class="btn btn-block">
                  
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>














<?php
include('includes\footer.php');
?>