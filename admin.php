<?php
    // Site Name
    $siteName = "--- RANHUYA Admin Panel";
    // Dynamic Header
    $title = 'Admin Panel'; include_once("header.php");
    // Check if user is an admin
    include("./src/admin/adminConfig.php");
?>

<link rel="stylesheet" href="./assets/css/admin.css">

<!-- Thushara -->
<!-- Type your code here -->
<!-- <h1 class="main_title">Admin Panel</h1> --><br>

<div class="ann__btn">
    <a class="nav__login" href="./addAnnouncement.php">Add Announcement</a>
</div>

<section class="users">
    <div class="user__table">
        <h3>Customers</h3>
        <button><a href="./addUser.php">Add new Customer</a></button>
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


<section class="users">
    <div class="user__table">
        <h3>Vendors</h3>
        <button><a href="./addUser.php">Add new Vendor</a></button>
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


<section class="users">
    <div class="user__table">
        <h3>Admins</h3>
        <button><a href="./addUser.php">Add new Admin</a></button>
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


<section class="advertisement">
    <div class="ad__table">
    <h3>Advertisements</h3>
        <table id="customers">
            <tr>
                <th>Ad ID</th>
                <th>Title</th>
                <th>Vendor Name</th>
                <th>Vendor Username</th>
                <th>Category</th>
                <th>Status</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <tr>
                <td>Ad ID</td>
                <td>Title</td>
                <td>Vendor Name</td>
                <td>Vendor Username</td>
                <td>Category</td>
                <td>Approved</td>
                <td><a href='updateUser.src.php?
                            id=$row[usersID]&
                            name=$row[usersName]
                            email=$row[usersEmail]
                            username=$row[usersUid]
                            user_type=$row[usersType]'><input type='submit' value='Update'></a></td>
                        <td><a href='deleteUser.src.php?
                            id=$row[usersID]'><input type='submit' value='Delete'></a></td>
            </tr>
            
            </table>
    </div>
</section>

<script src="./assets/js/admin.js"></script>

<?php include("footer.php"); ?>