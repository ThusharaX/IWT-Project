<?php
    // Dynamic Header
    $title = 'Customer Dashboard'; include("header.php");
    // Check if user is a customer
    include("./src/customer/customerConfig.php");
?>

<link rel="stylesheet" href="./assets/css/admin.css">
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
                    <h4>Announcement : </h4>
                    <h3>". $row["title"] ."</h3>
                    <h5>". $row["annDescription"] ."</h5>
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


    <?php
        $sql = mysqli_query($conn, "SELECT *
                FROM Wedding AS W, Customer AS C
                WHERE W.customerID ='" . $_SESSION["id"] . "'
                AND C.customerID ='" . $_SESSION["id"] . "'
        ");

        $row = mysqli_fetch_array($sql);

        echo "<div id='profile' class='tabcontent'>
                <section class='custDash'>
                    <fieldset style='margin: 5px;'>
                        <legend>Profile Info</legend>
                        <div class='cust__profileinfo'>
                                <img class='cust__profilePic' src='./Uploads/customers/". $row['c_imgLoc'] ."' alt=''>
                                <div class='cust__info'>
                                    <h1>". $row["weddingDate"] ."</h1>
                                    <h4>". $row["weddingDescription"] ."</h4>
                                    <h3>". $row["c_fname"] ." & ". $row["c_partner"] ."</h3>
                                    <a href='./editCustomerDetails.php?customerID=$row[customerID]'>
                                    <input name='edit' type='submit' value='Edit'></a>
                                </div>
                        </div>
                    </fieldset>

                </section>
            </div>";
    ?>
    



    <div id="manageVendors" class="tabcontent">
        <!-- <h3>manageVendors</h3> -->

        <section class="advertisement">
            <div class="ad__table">
                <div class="">
                    <a class="nav__login" href="./categorydisplaypage.php">Add new Vendor</a>
                </div>
                <br>
            <!-- <h3>Advertisements</h3> -->
                <table id="customers">
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Vendor Name</th>
                        <th>Delete</th>
                    </tr>
                    
                    
                    <?php
                        // $sql = "SELECT * from Advertisement_payment";
                        $sql = "SELECT *
                            FROM Advertisement AS A, Choice AS C, Vendor AS V, Category AS CAT
                            WHERE A.adID = C.adID
                            AND C.cID ='" . $_SESSION["id"] . "'
                            AND V.vendorID = A.vendorID 
                            AND CAT.catID = A.catID";
                        
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                            echo "
                            <tr>
                                <td><img height='50px' width='50px' src='./Uploads/advertisements/".$row['addImageLoc']."'></td>
                                
                                <td>".$row['title']."</td>
                                <td>".$row['catName']."</td>
                                <td>".$row['v_fname']."</td>
                                
                                <td>
                                    <a href='./src/customer/deleteChoice.src.php?choiceID=$row[choiceID]'>
                                    <input name='delete' type='submit' value='Delete'></a>
                                </td>
                                
                            </tr>
                            ";
                            }
                        }
                        else {
                            echo "0 results";
                        }
                        // $conn->close();
                    ?>
                    
                    </table>
            </div>
        </section>

        
    </div>

    <div id="guestList" class="tabcontent">
        <h2 class="tabTitle" style="color: black;">Guest List</h2>
        <section class="advertisement">
            <div class="ad__table">
                <div class="">
                    <a class="nav__login" href="./addGuest.php">Add new Guest</a>
                </div>
                <br>
            <!-- <h3>Advertisements</h3> -->
                <table id="customers">
                    <tr>
                        <th>Guest ID</th>
                        <th>Name</th>
                        <th>Delete</th>
                    </tr>
                    
                    
                    <?php
                        // $sql = "SELECT * from Advertisement_payment";
                        $sql = "SELECT *
                            FROM GuestList AS G
                            WHERE G.customerID ='" . $_SESSION["id"] . "'
                            ";
                        
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                            echo "
                            <tr>
                                <td>".$row['guestID']."</td>
                                <td>".$row['g_name']."</td>
                                
                                <td>
                                    <a href='./src/customer/deleteGuest.src.php?guestID=$row[guestID]'>
                                    <input name='delete' type='submit' value='Delete'></a>
                                </td>
                                
                            </tr>
                            ";
                            }
                        }
                        else {
                            echo "0 results";
                        }
                        // $conn->close();
                    ?>
                    
                    </table>
            </div>
        </section>
    </div>
</section>






<script src="./assets/js/customerDashboard.js"></script>

<?php include("footer.php"); ?>