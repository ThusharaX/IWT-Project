<?php
  //Chamath Jayasekara IT20654962

 require 'configure.php';
?>
<?php
  // DB config
  //include_once './src/dbh.php';
  // Start Session
 // session_start();
?>

<!DOCTYPE html>
<html>
<head>
   <title><?php if (isset($title)) {echo "Ranhuya - "; echo $title;} else {echo "Ranhuya";} ?></title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="shortcut icon" type="ico" href="./assets/img/favicon.ico"/>
    <link  rel="stylesheet" href="./assets/css/adsInventory.css">
</head>
<body>	
 <!--main nav bar made by Thushara-->	
	<div class="nav">

      <!-- Logo -->
      <img class="nav__logo" src="./assets/img/logo.png" alt="">

    <!-- Middle area of Navbar -->
      <div class="nav__middle">
        <div class="nav__title">
          RANHUYA WEDDING PLANNERS
        </div>
        <ul class="nav__list">
            <li class="nav__item"><a href="./index.php">Home</a></li>
            <li class="nav__item"><a href="./about.php">About Us</a></li>
            <li class="nav__item"><a href="./categorydisplaypage.php">Categories</a></li>
            <li class="nav__item"><a href="./contactUs.php">Contact Us</a></li>
            <li class="nav__item"><a href="./gallery.php">Gallery</a></li>
            
            
        </ul>
      </div>

    <!-- Login Signup Profile -->
    <div class="nav__buttons">
      <div class="nav__btnAndProfile">
        <div class="nav__btn">
          <?php
            if (isset($_SESSION["id"])) {
              if ($_SESSION["role"] === 'admin') {
                echo '<a href="./admin.php"><button class="nav__register">Admin Dashboard</button></a>';
              }
              else if (($_SESSION["role"] === 'customer')) {
                echo '<a href="./customerDashboard.php"><button class="nav__register">Customer Dashboard</button></a>';
              }
              else if (($_SESSION["role"] === 'vendor')) {
                echo '<a href="./vendorDashboard.php"><button class="nav__register">Vendor Dashboard</button></a>';
              }
              echo '<a href="./src/logout.src.php"><button class="nav__login">Logout</button></a>';
            }
            else {
              echo '<a href="./signup.php"><button class="nav__register">Join Now</button></a>';
              echo '<a href="./login.php"><button class="nav__login">Login</button></a>';
            }
          ?>
          
        </div>
        <img class="nav__profile" src="./assets/img/profilePic.png" alt="">
      </div>
    
      <form class="nav__search" action="search.src.php" method="get">
        <input type="text" placeholder="Search.." name="search" id="">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
      
    </div>
  </div>
    
  <!--on this part made by chamath-->
<nav id="vnavBar">
 <ul class="vendorNavbar">
   <li><a href="accountDetails.php">Account details</a></li>

   <li><a href="adsInventory.php">Ads Inventory</a></li>
   <li><a href="addCommercialsPage.php">Add advertisement</a></li>
   <li><a href="paymentHistory.php">Payments</a></li>
 </ul>
  
 </nav>
 <hr>

 <br>
 <h1>Advertisement Inventory</h1>
 
<form method="POST" action="">
   <input  type="submit" name="result" id="View_advertisement" value="View advertisements">

</form>
<div class="ads">
<?php
 if(isset($_POST['result'])){
   global $con;
   $sqlstmt="SELECT *FROM  COMMERCIAL";

   $result=mysqli_query($con,$sqlstmt);
   if($result->num_rows>0){

       while($row=$result->fetch_array()){
		  echo "<div class='display'>";
          echo "<table border='1px solid'>";
		  echo "<tr><td>".'<img src="data:image;base64,'.base64_encode($row['img']).'"height="200" width="100%"/>'."</td></tr>";
		 
          echo "<tr><td>".$row['addTitle']."</td></tr>";			
          echo "<tr><td>".$row['category']."</td></tr>";
         
          echo "<tr><td>".$row['adddes']."</td></tr>";
          echo "<tr><td>".$row['number']."</td></tr>";
          echo "<tr><td>".$row['email']."</td></tr>";          
          echo "<tr><td><a href='www.youtube.com'>Edit</a></td></tr>";
         echo "<tr><td><a href='www.google.com' class='button'>Delete</a></td></tr>";
		  echo "</table>";
		  echo "</div>";
       }
   }
 }
  $con->close();

?>
</div>

</body>
</html>