<?php
session_start();

include('includes/config.php');
if(isset($_POST['send']))
  {
    include('controllers\Feedback.php');
    $newfeed=new feedback($_POST['message'],$_SESSION['user_id']);
    $newfeed->GiveFeedback();
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<?php
include('includes\head.php');
?>
</head>
<body>

  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header contactus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Contact Us</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Feedback</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Contact-us-->
<section class="contact_us section-padding">
  <div class="container">
    <div  class="row">
      <div class="col-md-6">
        <form method="post">
        <h3>Give Feedback </h3>
            <div class="form-group">
              <label class="control-label">Message <span>*</span></label>
              <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
            </div>
            <div class="form-group">
              <button class="btn" type="submit" name="send" type="submit">Send Feedback <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
          <?php 
          if (isset($sux)){
            echo "<p style='color:green;'>Your FeedBack Has Been Sent Thank you</p>";
          }
          ?>
        </div>
      </div>
      <div class="col-md-6">
        <!-- <h3>Contact Info</h3> -->
      </div>
    </div>
  </div>
</section>
<!-- /Contact-us--> 


<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!-- Scripts --> 

</body>

</html>
