<?php
    // Dynamic Header
    $title = 'Customer Dashboard'; include("header.php");
    // Check if user is a customer
    include("./src/customer/customerConfig.php");
?>

<link rel="stylesheet" href="./assets/css/customerDashboard.css">

<!-- Thushara -->
<!-- Type your code here -->

<!-- Code segment for display Announcements related to customer ------------------>
<section class="adminAnnouncement">
    <?php
        $today = date("Y-m-d");
        $sql = "SELECT * from Announcement 
                WHERE
                    user_type = 'customer' AND
                    publish_date = '" . $today . "'
        ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            echo "
                <div class='announcements'>
                    <h3>Title = ". $row["title"] ."</h3>
                    <h5>Description = ". $row["annDescription"] ."</h5>
                </div>
                ";
            }
        } else {
            echo "
                <div class='announcements'>
                    <h3>No Announcements Today!</h3>
                </div>
                ";
        }
    ?>
</section>
<!-- --------------------------------------------------------------------------------- -->

<section class="custDash">
    <h1 class="main-title">customerDashboard Page</h1>

    <div class="cust__tabs">
        <button>Dashboard</button>
        <button>Manage Vendors</button>
        <button>Guest List</button>
        <button>Budget</button>
    </div>

    <fieldset style="margin: 5px;">
        <legend>Profile</legend>
        <div class="cust__profileinfo">
                <img class="cust__profilePic" src="./assets/img/profilePic.png" alt="">
                <div class="cust__info">
                    <h1>Wedding info</h1>
                    <h3>Louie & Luna</h3>
                    <h3>August 4 2021</h3>
                    <button>Edit</button>
                </div>
        </div>
    </fieldset>

    <fieldset style="margin: 5px;">
        <legend>Vendor Team</legend>
        <div class="cust__vendorteam">
            <img class="cust__profilePic" src="./assets/img/profilePic.png" alt="">
            <img class="cust__profilePic" src="./assets/img/profilePic.png" alt="">
            <img class="cust__profilePic" src="./assets/img/profilePic.png" alt="">
            <img class="cust__profilePic" src="./assets/img/profilePic.png" alt="">
        </div>
    </fieldset>
    
</section>


<script src="./assets/js/customerDashboard.js"></script>

<?php include("footer.php"); ?>