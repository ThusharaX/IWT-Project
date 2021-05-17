<?php
    // Site Name
    // $siteName = "--- RANHUYA Admin Panel";
    // Dynamic Header
    $title = 'Admin Panel'; include_once("header.php");
    // Check if user is an admin
    include("./src/admin/adminConfig.php");
?>

<link rel="stylesheet" href="./assets/css/admin.css">

<!-- Thushara -->
<!-- Type your code here -->
<!-- <h1 class="main_title">Admin Panel</h1> --><br>

<!-- <div class="ann__btn">
    <a class="nav__login" href="./addAnnouncement.php">Add Announcement</a>
</div> -->

<!-- Statistics -->
<section class='statics'>
    <?php
        $result = mysqli_query($conn, "SELECT COUNT(*) FROM Vendor");
        $vendorCount = mysqli_fetch_array($result);

        $result = mysqli_query($conn, "SELECT COUNT(*) FROM Advertisement");
        $advertisementCount = mysqli_fetch_array($result);

        $result = mysqli_query($conn, "SELECT COUNT(*) FROM Customer");
        $customerCount = mysqli_fetch_array($result);

        $result = mysqli_query($conn, "SELECT SUM(amount) FROM Payment");
        $totalIncome = mysqli_fetch_array($result);
        
        $result = mysqli_query($conn, "SELECT COUNT(*) FROM Category");
        $totalCat = mysqli_fetch_array($result);
        
        
        echo "<div class='stat__container'>
                <div class='stat__box'>
                    <h1>". $vendorCount[0] ."</h1>
                    <h3>Vendors</h3>
                </div>
                <div class='stat__box'>
                    <h1>". $advertisementCount[0] ."</h1>
                    <h3>Advertisements</h3>
                </div>
                <div class='stat__box'>
                    <h1>". $customerCount[0] ."</h1>
                    <h3>Customers</h3>
                </div>
                <div class='stat__box'>
                    <h1>". $totalIncome[0] ."</h1>
                    <h3>Total Income</h3>
                </div>
                <div class='stat__box'>
                    <h1>". $totalCat[0] ."</h1>
                    <h3>Categories</h3>
                </div>
            </div>
            ";
    ?>
</section>


<!-- Tab System -->
<section class="tabSystem">
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Users')" id="defaultOpen">Users</button>
        <button class="tablinks" onclick="openTab(event, 'Advertisements')">Advertisements</button>
        <button class="tablinks" onclick="openTab(event, 'Categories')">Categories</button>
        <button class="tablinks" onclick="openTab(event, 'Announcement')">Announcement</button>
    </div>

    <div id="Users" class="tabcontent">
        <h2 class="tabTitle">Users</h2>
        <!-- Customers -->
        <section class="users">
            <div class="user__table">
                <h3>Customers</h3>
                <div class="ann__btn">
                    <a class="nav__login" href="./addUser.php">Add new Customer</a>
                </div>
                <table id="customers">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                        $sql = "SELECT * from Customer";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>".$row['customerID']."</td>
                                <td>".$row['c_fname']."</td>
                                <td>".$row['c_lname']."</td>
                                <td>".$row['c_email']."</td>
                                <td>".$row['c_username']."</td>
                                <td>".$row['role']."</td>
                                <td>
                                    <a href='./updateUserDetails.php?id=$row[customerID]&role=$row[role]'>
                                    <input type='submit' value='Update'></a>
                                </td>
                                <td>
                                    <a href='./deleteUser.php?id=$row[customerID]&role=$row[role]'>
                                    <input type='submit' value='Delete'></a>
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


        <!-- Vendors -->
        <section class="users">
            <div class="user__table">
                <h3>Vendors</h3>
                <div class="ann__btn">
                    <a class="nav__login" href="./addUser.php">Add new Vendor</a>
                </div>
                <table id="customers">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                        $sql = "SELECT * from Vendor";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>".$row['vendorID']."</td>
                                <td>".$row['v_fname']."</td>
                                <td>".$row['v_lname']."</td>
                                <td>".$row['v_email']."</td>
                                <td>".$row['v_username']."</td>
                                <td>".$row['role']."</td>
                                <td>
                                    <a href='./updateUserDetails.php?id=$row[vendorID]&role=$row[role]'>
                                    <input type='submit' value='Update'></a>
                                </td>
                                <td>
                                    <a href='./deleteUser.php?id=$row[vendorID]&role=$row[role]'>
                                    <input type='submit' value='Delete'></a>
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


        <!-- Admins -->
        <section class="users">
            <div class="user__table">
                <h3>Admins</h3>
                <div class="ann__btn">
                    <a class="nav__login" href="./addUser.php">Add new Admin</a>
                </div>
                <table id="customers">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                        $sql = "SELECT * from Admin";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>".$row['adminID']."</td>
                                <td>".$row['a_fname']."</td>
                                <td>".$row['a_lname']."</td>
                                <td>".$row['a_email']."</td>
                                <td>".$row['a_username']."</td>
                                <td>".$row['role']."</td>
                                <td>
                                    <a href='./updateUserDetails.php?id=$row[adminID]&role=$row[role]'>
                                    <input type='submit' value='Update'></a>
                                </td>
                                <td>
                                    <a href='./deleteUser.php?id=$row[adminID]&role=$row[role]'>
                                    <input type='submit' value='Delete'></a>
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

    <div id="Advertisements" class="tabcontent">
        <h2 class="tabTitle">Advertisements</h2>
        <!-- Advertisements -->
        <section class="advertisement">
            <div class="ad__table">
            <!-- <h3>Advertisements</h3> -->
                <table id="customers">
                    <tr>
                        <th>adID</th>
                        <th>catID</th>
                        <th>title</th>
                        <th>addDescription</th>
                        <th>mobile</th>
                        <th>addImageLoc</th>
                        <th>publishDateTime</th>
                        <th>status</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        $sql = "SELECT * from Advertisement";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>".$row['adID']."</td>
                                <td>".$row['catID']."</td>
                                <td>".$row['title']."</td>
                                <td>".$row['addDescription']."</td>
                                <td>".$row['mobile']."</td>
                                <td><img height='50px' width='50px' src='./Uploads/advertisements/".$row['addImageLoc']."'></td>
                                <td>".$row['publishDateTime']."</td>
                                <td>".$row['status']."</td>
                                <td>
                                    <a href='./deleteAdvertisement.php?catID=$row[adID]'>
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

    <div id="Categories" class="tabcontent">
        <h2 class="tabTitle">Categories</h2>
        <!-- Categories -->
        <section class="categories">
            <div class="ad__table">
            <!-- <h3>Categories</h3> -->
            <button><a href="./addCategory.php">Add new Category</a></button>
                <table id="customers">
                    <tr>
                        <th>catID ID</th>
                        <th>Image</th>
                        <th>catName Name</th>
                        <th>catDescription</th>
                        <th>price</th>
                        <th>Delete</th>
                    </tr>
                    
                    <?php
                        $sql = "SELECT * from Category";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>".$row['catID']."</td>
                                <td><img height='50px' width='50px' src='./Uploads/categories/".$row['cat_imgLoc']."'></td>
                                <td>".$row['catName']."</td>
                                <td>".$row['catDescription']."</td>
                                <td>".$row['price']."</td>
                                <td>
                                    <a href='./deleteCat.php?catID=$row[catID]'>
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

    <div id="Announcement" class="tabcontent">
        <h2 class="tabTitle">Announcements</h2>
        <!-- Announcement -->
        <section class="categories">
            <div class="ad__table">
            <!-- <h3>Announcement</h3> -->
            <button><a href="./addAnnouncement.php">Add new Announcement</a></button>
                <table id="customers">
                    <tr>
                        <th>annID</th>
                        <th>adminID</th>
                        <th>title</th>
                        <th>user_type</th>
                        <th>publish_date</th>
                        <th>annDescription</th>
                        <th>Delete</th>
                    </tr>
                    
                    <?php
                        $sql = "SELECT * from Announcement";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>".$row['annID']."</td>
                                <td>".$row['adminID']."</td>
                                <td>".$row['title']."</td>
                                <td>".$row['user_type']."</td>
                                <td>".$row['publish_date']."</td>
                                <td>".$row['annDescription']."</td>
                                <td>
                                    <a href='./deleteAnnouncement.php?annID=$row[annID]'>
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

<!-- End of Tab System -->
















<script src="./assets/js/admin.js"></script>

<?php include("footer.php"); ?>