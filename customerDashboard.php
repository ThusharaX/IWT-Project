<?php
    // Dynamic Header
    $title = 'Customer Dashboard'; include("header.php");
    // Check if user is a customer
    include("./src/customer/customerConfig.php");
?>

<link rel="stylesheet" href="./assets/css/customerDashboard.css">
<link rel="stylesheet" href="./assets/css/admin.css">

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




<section>
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'profile')" id="defaultOpen">profile</button>
        <button class="tablinks" onclick="openTab(event, 'manageVendors')">manageVendors</button>
        <button class="tablinks" onclick="openTab(event, 'guestList')">guestList</button>
    </div>

    <div id="profile" class="tabcontent">
        <!-- <h3>profile</h3> -->
        <section class="custDash">
            <!-- <h1 class="main-title">customerDashboard Page</h1>

            <div class="cust__tabs">
                <button>Dashboard</button>
                <button>Manage Vendors</button>
                <button>Guest List</button>
                <button>Budget</button>
            </div> -->

            <fieldset style="margin: 5px;">
                <legend>Profile Info</legend>
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

        </section>
    </div>

    <div id="manageVendors" class="tabcontent">
        <!-- <h3>manageVendors</h3> -->
        <fieldset style="margin: 5px;">
                <legend>Vendor Team</legend>
                <?php
                    // $sql = "SELECT * from Customer";
                    // $result = $conn->query($sql);

                    // if ($result->num_rows > 0) {
                    //     while ($row = $result->fetch_assoc()) {
                    //     echo "";
                    //     }
                    // }
                    // else {
                    //     echo "0 results";
                    // }
                    // $conn->close();
                ?>
                <div class="cust__vendorteam">
                    <img class="cust__profilePic" src="./assets/img/profilePic.png" alt="">
                    <img class="cust__profilePic" src="./assets/img/profilePic.png" alt="">
                    <img class="cust__profilePic" src="./assets/img/profilePic.png" alt="">
                    <img class="cust__profilePic" src="./assets/img/profilePic.png" alt="">
                </div>
            </fieldset>
    </div>

    <div id="guestList" class="tabcontent">
        <h3>guestList</h3>
        <p>guestList is the capital of Japan.</p>
    </div>
</section>






<script src="./assets/js/customerDashboard.js"></script>

<?php include("footer.php"); ?>