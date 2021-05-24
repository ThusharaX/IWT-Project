<?php
    // Dynamic Header
    $title = 'Edit Customer Profile'; include("header.php");
    // Check if user is an admin
    include("./src/customer/customerConfig.php");
?>

<link rel="stylesheet" href="./assets/css/addUser.css">


<!-- Thushara -->
<!-- Type your code here -->
<?php
    $sql = mysqli_query($conn, "SELECT *
                                FROM Customer
                                WHERE customerID='" . $_SESSION["id"] . "' 
                                     ");
    $row  = mysqli_fetch_array($sql);

    echo "<section>
                <div class='login-form'>
                    <h1 class='main-title'>Hello ". $_SESSION["fname"] ." Edit your Profile</h1>
                    <br>
                    <form action='./src/customer/editCustomerDetails.src.php' method='post' enctype='multipart/form-data'>
                        <input value=" . $row['c_fname'] ." required placeholder='' type='text' name='c_fname'><br>
                        <input value=" . $row['c_lname'] ." required placeholder='' type='text' name='c_lname'><br>
                        <input value=" . $row['c_dob'] ." required placeholder='' type='text' name='c_dob'><br>
                        <input value=" . $row['c_username'] ." required placeholder='' type='text' name='c_username'><br>
                        <p>Profile Picture : " . $row['c_imgLoc'] ."</p>
                        <input type='file' name='c_imgLoc'><br>
                        
                        
                        <input value=" . $row['c_email'] ." required placeholder='' type='email' name='c_email'><br>
                        <input value=" . $row['c_partner'] ." required placeholder='' type='text' name='c_partner'><br>
                        <input hidden value=" . $row['customerID'] ." required placeholder='' type='text' name='customerID'>
                        
                        <button class='submit-btn' type='submit' name='save'>Save</button>
                    </form>
                </div>
            </section>";
    
?>




<script src="./assets/js/adduser.js"></script>
<?php include("footer.php"); ?>