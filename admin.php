<?php
    // Dynamic Header
    $title = 'Admin Panel'; include("header.php");
    // Check if user is an admin
    include("./src/admin/adminConfig.php");
?>

<link rel="stylesheet" href="./assets/css/admin.css">

<!-- Thushara -->
<!-- Type your code here -->
<h1 class="main_title">Admin Panel</h1>

<section class="users">
    <div class="user__table">
        <h3>Users</h3>
        <table id="customers">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Type</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php
                $sql = "SELECT * from users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>".$row['usersID']."</td>
                        <td>".$row['usersName']."</td>
                        <td>".$row['usersEmail']."</td>
                        <td>".$row['usersUid']."</td>
                        <td>".$row['usersType']."</td>
                        <td>
                            <a href='./updateUserDetails.php?username=$row[usersUid]'>
                            <input type='submit' value='Update'></a>
                        </td>
                        <td>
                            <a href='./src/admin/deleteUser.src.php?id=$row[usersID]'>
                            <input type='submit' value='Delete'></a>
                        </td>
                        
                    </tr>
                    ";
                    }
                }
                else {
                    echo "0 results";
                }
                $conn->close();
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
                <th>Type</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <tr>
                <td>Ad ID</td>
                <td>Title</td>
                <td>Vendor Name</td>
                <td>Vendor Username</td>
                <td>Type</td>
                <td><a href='updateUser.src.php?
                            id=$row[usersID]&
                            name=$row[usersName]
                            email=$row[usersEmail]
                            username=$row[usersUid]
                            user_type=$row[usersType]'><input type='submit' value='Update'></a></td>
                        <td><a href='deleteUser.src.php?
                            id=$row[usersID]'><input type='submit' value='Delete'></a></td>
            </tr>
            <tr>
                <td>Ad ID</td>
                <td>Title</td>
                <td>Vendor Name</td>
                <td>Vendor Username</td>
                <td>Type</td>
                <td><a href='updateUser.src.php?
                            id=$row[usersID]&
                            name=$row[usersName]
                            email=$row[usersEmail]
                            username=$row[usersUid]
                            user_type=$row[usersType]'><input type='submit' value='Update'></a></td>
                        <td><a href='deleteUser.src.php?
                            id=$row[usersID]'><input type='submit' value='Delete'></a></td>
            </tr>
            <tr>
                <td>Ad ID</td>
                <td>Title</td>
                <td>Vendor Name</td>
                <td>Vendor Username</td>
                <td>Type</td>
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