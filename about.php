<?php
    // Dynamic Header
    $title = 'About'; include("header.php");
?>

<link rel="stylesheet" href="./assets/css/about.css" />

<!-- Niki -->
<!-- it20916626 -->
<div class="image-slider">
  <div id="slider"></div>
  <div id="slider-nav">
		<div id="slider-prev" onclick="prevSlide();"><img src="assets/img/prev-btn.png"></div>
		<div id="slider-next" onclick="nextSlide();"><img src="assets/img/next-btn.png"></div>
</div>
</div>

<section class="about-container">
  <div class="column1">
    <h1>Who we are</h1>
    <h2>We Are Many Things In One...</h2>
    <div class="sub-column1">
      <div class="row1">
        <img src="assets/img/next-icon.png" alt=">>" />
        <p>
          We at My Wedding as the pimeers in SriLanka wedding planning work
          together with you at any stage of the planning process to ensure that
          your wedding is planned to a perfect, totally enjoyble, stress free
          and memorable one. Affter all, it is your wedding. we are there to
          help you and make your day perfect
        </p>
      </div>
      <div class="row1">
        <img src="assets/img/next-icon.png" alt=">>" />
        <p>
          An online wedding directory that provides all contact information and
          image galleries of wedding service provider in Sri Lanka
        </p>
      </div>
    </div>
    <div class="sub-column2">
      <div>
        <h3>Engaged Couples</h3>
        <p>
          Our comprehensive directory of wedding professionals, from venues to
          photographers, features millions of consumer reviews, detailed pricing
          and availability information, payments and more.
        </p>
      </div>
      <div>
        <img src="assets/img/aboutus_heart_arrows.png" alt="heart" />
      </div>
      <div>
        <h3>Vendors</h3>
        <p>
          Get exposure to millions of couples through a premium WeddingWire
          listing. Our features and benefits will drive leads and bookings to
          businesses, highlight consumer reviews and more.
        </p>
      </div>
    </div>
  </div>
  <div class="column2">
    <div class="item1">
      <img src="assets/img/aboutus_3.gif" alt="" />
      <div>
        <p>10,000</p>
        <p>Monthly Users</p>
      </div>
    </div>
    <div class="item1">
      <img src="assets/img/aboutus_2.gif" alt="" />
      <div>
        <p>30,000</p>
        <p>Reviews</p>
      </div>
    </div>
    <div class="item1">
      <img src="assets/img/aboutus_4.gif" alt="" />
      <div>
        <p>1000</p>
        <p>Vendors</p>
      </div>
    </div>
    <div class="item1">
      <img src="assets/img/aboutus_5.gif" alt="" />
      <div>
        <p>500</p>
        <p>Employees</p>
      </div>
    </div>
    <div class="item1">
      <img src="assets/img/aboutus_6.gif" alt="" />
      <div>
        <p>15</p>
        <p>Countries</p>
      </div>
    </div>
    <div class="item1">
      <img src="assets/img/aboutus_7.png" alt="" />
      <div>
        <p>5</p>
        <p>Branches</p>
      </div>
    </div>
  </div>
  <div class="column3">
    <div class="item2">
      <img
        src="assets/img/wedding-photographer.jpeg"
        alt="Wedding Professional"
      />
      <div class="p1">
        <h3>Where wedding businesses grow</h3>
        <p>
          We help wedding professionals reach more engaged local couples, book
          more weddings and drive success to their businesses.
        </p>
      </div>
    </div>
    <div class="item2">
      <div class="p2">
        <h3>Wedding planning starts here</h3>
        <p>
          We help couples discover vendors and ideas and provide them with
          online tools to help them create their ideal wedding day.
        </p>
      </div>
      <img src="assets/img/6.jpg" alt="Wedding Planning" />
    </div>
  </div>
  <div class="column4">
    <h1>Reach Our Team</h1>
    <a href="contactUs.php"><button class="a-btn">Contact Us Now》</button></a>
  </div>
</section>

<script src="./assets/js/about.js"></script>

<?php include("footer.php"); ?>
