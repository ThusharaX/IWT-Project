<?php
    // Dynamic Header
    $title = 'Commercials List'; include("header.php");
?>

<link rel="stylesheet" href="./assets/css/commercialsList.css">

<!-- Gaween -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">commercialsList Page</h1>


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
                    <a href='./adDetailsPage.php?adID=". $row['adID'] ."'>". $row['title'] ."</a>
                    <p>". $row['publishDateTime'] ."</p>
                    ";

                    if (isset($_SESSION["id"])) {
                        if($_SESSION["role"] === 'customer') {
                            echo "<a href=''><button>Add</button></a>";
                        }
                    }
                }
                else {
                    echo "No active Ads";
                }
            }
        }
        else {
            echo "0 results";
        }
    ?>
</section>


<script src="./assets/js/commercialsList.js"></script>

<?php include("footer.php"); ?>