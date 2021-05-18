<?php
    // Dynamic Header
    $title = 'Update'; include("header.php");
    // Check if user is an admin
    include("./src/admin/adminConfig.php");
?>

<link rel="stylesheet" href="./assets/css/addAnnouncement.css">

<!-- Gaween -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">Add Announcement</h1>

    <?php
        echo '<form action="./src/admin/addAnnouncement.src.php" method="get">
                <input required placeholder="Title..." type="text" name="title"><br>
                <input required placeholder="Description..." type="text" name="annDescription"><br>
                <input value="' . date("Y-m-d") .'" type="hidden" name="publish_date"><br>
                <input value="' . $_SESSION["id"] .'" type="hidden" name="adminID"><br>
                <select class = "login" name="role" id="users">
                    <option value="customer">Customer</option>
                    <option value="vendor">Vendor</option>
                </select><br>
                <button type="submit" name="addAnnouncement">Add Announcement</button>
            </form>'
    ?>
</section>

<script src="./assets/js/addAnnouncement.js"></script>

<?php include("footer.php"); ?>