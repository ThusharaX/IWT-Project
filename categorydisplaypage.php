<?php
    // Dynamic Header
    $title = 'Category'; include("header.php");
?>

<link rel="stylesheet" href="./assets/css/categorydisplay.css">

<!-- Gaween -->
<!-- Type your code here -->


<div class="categories">
  <h1>Categories</h1>
  <body>

  <?php
    $sql = "SELECT catID, cat_imgLoc, catName, catDescription, price
    FROM Category";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "
        <a class='category' href='./commercialsListPage.php?catID=". $row['catID'] ."&catName=". $row['catName'] ."'>
          <img src='./Uploads/categories/".$row['cat_imgLoc']."'>
        </a>
      ";
        
      }
    }
    else {
      echo "0 results";
    }
  ?>

</div>


</body>















		
			
<!-- <video width="1200" height="600" autoplay loop="loop" >
  <source src="./assets/video/heroVideo.mp4" type="video/mp4">
</video>

<table width="1230" height="500" border="0">
	
	
  <tbody>
    <tr>
      <td><img src="./assets/img/CATEGORIES/1.gif" width="200" height="200" ></td>
      <td><img src="./assets/img/CATEGORIES/2.gif" width="200" height="200" ></td>
      <td><img src="./assets/img/CATEGORIES/3.gif" width="200" height="200" ></td>
      <td><img src="./assets/img/CATEGORIES/4.gif" width="200" height="200" ></td>
      <td><img src="./assets/img/CATEGORIES/5.gif" width="200" height="200" ></td>
    </tr>
    <tr>
      <td><img src="./assets/img/CATEGORIES/6.gif" width="200" height="200" ></td>
      <td><img src="./assets/img/CATEGORIES/7.gif" width="200" height="200" ></td>
      <td><img src="./assets/img/CATEGORIES/8.gif" width="200" height="200" ></td>
      <td><img src="./assets/img/CATEGORIES/9.gif" width="200" height="200" ></td>
      <td><img src="./assets/img/CATEGORIES/10.gif" width="200" height="200" ></td>
    </tr>
  </tbody>
</table>

	  <img src="./assets/img/CATEGORIES/category background.jpg" width="1230" height="750" > -->


<script src="./assets/js/categorydisplay.js"></script>

<?php include("footer.php"); ?>
