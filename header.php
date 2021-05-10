<?php
  // DB config
  include_once 'src/dbh.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php if (isset($title)) {echo "Ranhuya - "; echo $title;} else {echo "Ranhuya";} ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="shortcut icon" type="ico" href="./assets/img/favicon.ico"/>
  </head>

  <body>
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
            if (isset($_SESSION["useruid"])) {
              echo '<a href="./profile.php"><button class="nav__register">Profile</button></a>';
              echo '<a href="./src/logout.inc.php"><button class="nav__login">Logout</button></a>';
            }
            else {
              echo '<a href="./customerSignup.php"><button class="nav__register">Join Now</button></a>';
              echo '<a href="./login.php"><button class="nav__login">Login</button></a>';
            }
          ?>
          
        </div>
        <img class="nav__profile" src="./assets/img/profilePic.png" alt="">
      </div>
    
      <form class="nav__search" action="searchResultsPage.html" method="get">
        <input type="text" placeholder="Search.." name="search" id="">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
      
    </div>
  </div>

  <div class="wrapper">


<!-- <header id="navbar">
  
</header> -->