<?php
    // Dynamic Header
    $title = 'Add Guest'; include("header.php");
    // Check if user is an admin
    include("./src/customer/customerConfig.php");
?>

<link rel="stylesheet" href="./assets/css/addUser.css">


<?php
    if (isset($_POST["addGuest"])) {

        $g_name = $_POST["g_name"];
        $customerID = $_SESSION["id"];
    
        $sql = mysqli_query($conn, "INSERT INTO GuestList (guestID, g_name, customerID)
                                    VALUES ('', '$g_name', '$customerID')
                                 ");

        header("location: ./customerDashboard.php");    
    }
?>



<!-- Thushara -->
<!-- Type your code here -->
<?php
    echo "<section>
                <div class='login-form'>
                    <h1 class='main-title'>Hello ". $_SESSION["fname"] ." please add your Guest</h1>
                    <br>
                    <form action='' method='post'>
                        <input required placeholder='Guest Name...' type='text' name='g_name'><br>
                        <button class='submit-btn' type='submit' name='addGuest'>Add Guest</button>
                    </form>
                </div>
            </section>";
    
?>





<script src="./assets/js/adduser.js"></script>
<?php include("footer.php"); ?>