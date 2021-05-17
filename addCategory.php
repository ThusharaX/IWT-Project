<?php
    // Dynamic Header
    $title = 'Add Category'; include("header.php");
    // Check if user is an admin
    include("./src/admin/adminConfig.php");
?>

<link rel="stylesheet" href="./assets/css/addCategory.css">

<!-- Thushara -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">Add Category</h1>
    <br>
    <form action="./src/admin/addCat.src.php" method="post" enctype="multipart/form-data">
        <input type='file' name='cat_imgLoc'><br>
        <input placeholder='catName' type='filetext' name='catName'><br>
        <input placeholder='catDescription' type='filetext' name='catDescription'><br>
        <input placeholder='price' type='filetext' name='price'><br>
        <br>
        <button type="submit" name="addCat">Add Category</button>
    </form>
</section>



<script src="./assets/js/addCategory.js"></script>
<?php include("footer.php"); ?>