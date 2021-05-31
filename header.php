<?php
  // DB config
  include_once './src/dbh.php';
  // Start Session
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php if (isset($title)) {echo "Ranhuya - "; echo $title;} else {echo "Ranhuya";} ?></title>
    <!-- import font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="shortcut icon" type="ico" href="./assets/img/favicon.ico"/>
  </head>

  <body>
    <nav>
      <div class="nav__container sticky">
        <div class="nav__logo">
          <a href="./index.php"><img src="./assets/img/logo.png" alt="Ranhuya"></a>
          <!-- <h2><a href="./index.php">Wedding Planning System</a></h2> -->
        </div>
        <div class="nav__links">
          <ul class="links">
            <li><a href="./categorydisplaypage.php">Category</a></li>
            <li><a href="./gallery.php">Gallery</a></li>
            <li><a href="./about.php">About</a></li>
            <li><a href="./contactUs.php">Contact Us</a></li>
          </ul>
        </div>

        <div>
        <form class="nav__search" action="searchResultsPage.php" method="get" onsubmit=" return validate()">
              <input type="text" placeholder="Search.." name="search" id="">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <div class="nav__btn">
        <?php
            if (isset($_SESSION["id"])) {
              if ($_SESSION["role"] === 'admin') {
                echo '<a href="./admin.php"><button class="button">Admin Dashboard</button></a>';
              }
              else if (($_SESSION["role"] === 'customer')) {
                echo '<a href="./customerDashboard.php"><button class="button">Dashboard</button></a>';
              }
              else if (($_SESSION["role"] === 'vendor')) {
                echo '<a href="./vendorDashboard.php"><button class="button">Dashboard</button></a>';
              }
              echo '<a href="./src/logout.src.php"><button class="button">Logout</button></a>';
            }
            else {
              echo '<a href="./signup.php"><button class="button">Join Now</button></a>';
              echo '<a href="./login.php"><button class="button">Login</button></a>';
            }
            ?>
        </div>

        
      </div>
    </nav>

  <div class="wrapper">


<!-- <header id="navbar">
  
</header> -->


<script src="./assets/js/header.js"></script>