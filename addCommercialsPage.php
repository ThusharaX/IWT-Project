<?php
    // Dynamic Header
    $title = 'Add Commercial'; include("header.php");
    // Check if user is an vendor (commented for now)
    // include("./src/vendor/vendorConfig.php");


    // $password=GET["password"];
    //this works
    ini_set('mysql.connection_timeout',300);
    ini_set('default_socket_timeout',300);  
?>


<link rel="stylesheet" href="./assets/css/addCommercials.css">


    <!-- Chamath -->
    <!-- Type your code here -->

    <div class="container">

        <div class="title">Add new advertisement</div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" onsubmit="return checking();" method="POST" enctype="multipart/form-data" id="formi">

            <div class="ads-details">
			
			
			<div class="left">
                <h3>
                    Advertisement Details
                </h3>
                <div class="inputs">
                    <small id="insertSuccess" class="bk"></small>
                    <span class="bk">Advertisement Title</span>
                    <input type="text" class="bk" placeholder="" id="title" name="title" required="" />
					<small id="title_chk" class="bk"></small>
                </div>
                <div class="iinputs">

                    <span class="bk">Image</span>
                    <input type="file" name="images" accept="image/png, image/jpeg" />
                </div>
                <div class="inputs">

                    <span class="bk">Category</span>
                    <input type="text" class="bk" name="category" id="category" placeholder="" required="" />
					<small id="category_chk" class="bk"></small>
                </div>

                <div class="inputs">

                    <span class="bk">Ads description</span>
                    <textarea name="description" id="description" cols="42.5" rows="8" required=""></textarea>
                    <small id="description_chk" class="bk"></small>               
			   </div>
			   
			  </div> 
                
				<div class="right"> 
                    <h3>
                        Contact details
                    </h3>
                    <div class="cinputs">

                        <span class="bk">Mobile number</span>
                        <input type="mobile number" name="mobile_number" placeholder="" pattern="[0-9]{10}" required="" />
                    </div>
                    <div class="cinputs">

                        <span class="bk">Email</span>
                        <input type="email" class="bk" id="email" name="email" placeholder="abc@mail.com" pattern="[a-z0-9._%+-]+@[a-z0-9._]+\.[a-z]{2,3}" required="" />
                     <small id="email_chk" class="bk"></small>    
					</div>
                
			     </div>
			
			</div>
            <div class="sdbutton">
                    <div class="button">
                        <input type="submit" name="save" id="saved" value="Save">
                    </div>
                    <div class="button">
                        <input type="button" id="cancel" value="Cancel">
                    </div>
                </div>
                
			

        </form>
    </div>
<?php 
// if you want remove this line and rename variable to $conn
$con = $conn;

 if(isset($_POST['save'])){
    //  
    // require 'configure.php';
  
  $mobile_number = $_POST['mobile_number'];
  $email = $_POST['email']; 
  $description = $_POST['description']; 
  $title = $_POST['title'];
  $category = $_POST['category'];
  /* 
     
     $stmt="select VID from vendor where password='$password'"
     $con->query($stmt)
      
  */
  $image = addslashes(file_get_contents($_FILES["images"]["tmp_name"]));
  $sqlstm="INSERT INTO commercial VALUES('','$title', '$category','$image','$description','$mobile_number','$email')";
  if($con->query($sqlstm)){
	  	     			   
			   header('Location:vendorDashboard.php?sucess');
	  
  }else{
	 echo "Error : ".$con->error;  
  }
    $con->close();
 }



?>
    
   
<script type="text/javascript" src="./assets/js/addCommercial.js"></script>

<?php include("footer.php"); ?>