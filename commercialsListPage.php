<?php
    // Dynamic Header
    $title = 'Commercials List'; include("header.php");
?>

<link rel="stylesheet" href="./assets/css/commercialsList.css">

<!-- Gaween -->
<!-- Type your code here -->
<body>


<section>
   <center><h1 class="main-title">Commercials List Page</h1></center> 

<center>
    <?php
        $sql = "SELECT adID, title, addImageLoc, publishDateTime, status
        FROM Advertisement AS A
        WHERE A.catID ='" . $_GET['catID'] . "'
        ;";

        $result = $conn->query($sql);
        
        echo "<h3>". $_GET['catName'] ."</h3>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            
                if($row['status']) {
                    echo "
                    ".(isset($_SESSION['id'])?"<a href='./adDetailsPage.php?adID=". $row['adID'] ."'>". $row['title'] ."</a>":"<p>". $row['title'] ."</p>")."
                    
                    <p>". $row['publishDateTime'] ."</p>
                    ";

                    if (isset($_SESSION["id"])) {
                        if($_SESSION["role"] === 'customer') {
                            echo "<a href='./src/customer/choice.src.php?adID=". $row['adID'] ."&cID=". $_SESSION['id'] ."'><button>Add</button></a>";
                            
                        }
                    }
                }
                // else {
                //     echo "No active Ads";
                // }
            }
        }
        else {
            echo "0 results";
        }
    ?>
</section>
    </center>
</body>
<script src="./assets/js/commercialsList.js"></script>

<?php include("footer.php"); ?>