
<?php
include("includes/db_connect.php");
include("includes/head.php");

?>
<nav class="navbar navbar-expand-lg navbar-dark primary-color" style="background-color: #efefef!important;  " >
    <a class="navbar-brand" style="border: 1px solid white;font-size:25px; color: black!important;" href="#">CRMS Ethiopia</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="basicExampleNav">

        
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" style="color: black!important; border-right:1px; margin-top:4px; font-size:15px; solid black ; " href="index.php">Home
                    <span class="sr-only"></span>
                </a>
            </li>
            <li style="margin-top:10px; font-size:17px; solid black"> | </li>
            <li class="nav-item">
                <a class="nav-link"  style="color: black!important;margin-top:4px; font-size:15px; solid black" href="car-listing.php">Browse Cars</a>
            </li>
        
            <?php
          if (isset($_SESSION['user_id']))
            { 
            echo ' <li style="margin-left:600px;" "color:#ffffff!important;" class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="color:black!important; margin-top:7px;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account Options
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item"  href="contact-us.php">Give FeedBack</a>

          
          <a class="dropdown-item" href="profile.php"">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" style="color:red!important" href="logout.php">LogOut</a>
        </div>
      </li>';
            }
            else{
            echo '<li style="margin-left:600px;"><a class="btn " href="login.php" >Login </a></li>'; 
            }
          ?>
            
          
        </ul>
       
    </div>
   

</nav>

