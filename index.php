<?php
    // Dynamic Header
    $title = 'Home'; include("header.php");
    $content;
	$location;
	       if (isset($_SESSION["id"])) {
              if ($_SESSION["role"] === 'admin') {
                  $content="Make Annoucements";
	              $location="addAnnouncement.php";
              }
              else if (($_SESSION["role"] === 'customer')) {
                     $content="Plan A Wedding";
	                 $location="customerDashboard.php";
              }
              else if (($_SESSION["role"] === 'vendor')) {
                     $content="Add An Advertisement";
	                $location="addCommercialsPage.php";
              }
             
            }
            else {
                    $content="Register Here";
	                $location="signup.php";
            }
	
?>
<div class="position-abs">
	<link rel="stylesheet" href="./assets/css/index.css"/>
	<div class="outter">
		<div class="banner">
             

    </div>
		<div class="planWeddingBtn" id="planWeddingBtn">
			<a href="<?php echo $location;?>"><?php echo  $content; ?>
			</a>
		</div>
	</div>
	<script type="text/javascript">
   //Changing position of a button corespond to role
       var role="<?php echo $_SESSION['role']?>";
		
		var btnDiv=document.getElementById("planWeddingBtn");
		if(role==='admin'){
			btnDiv.style.width = '54.5%';
		}
		else if(role==='vendor'){
			btnDiv.style.width = '55.5%';
		}
		else if(role==='customer'){
			btnDiv.style.width = '53.5%';
		}
		//if it is a visitor
		else{
			btnDiv.style.width = "53%";
		}
</script>
	<hr>
		<div class="middle-one">
			<h2>Ideas & Tips</h2>
			<div class="one para">
				<p>You may not be a fan of where you currently live,
			or want to wed where you grew up, but make sure you don’t 
			stray too far from the majority of your guest list.
			</p>
			</div>
			<div class="two para">
				<p>Your bridesmaids should be your biggest support throughout the planning process,
				so choose wisely. Friends you’ve recently made or cousins you rarely see are not the best choice.
				</p>
			</div>
			<div class="three para">
				<p>One of the biggest talking points at any wedding is the food. 
				From hog roasts and buffets to bake offs and mini fish ‘n’ chips. 
			</p>
			</div>
		</div>
		<hr>
			<div class="end">
				<h2>Our weddings</h2>
				<div class="gal gal1">
					<div class="galone">
						<a href="gallery.php">
							<img src="./assets/img/gallery/optimized/16.jpg"/>
						</a>
					</div>
					<div class="galtwo">
						<a href="gallery.php">
							<img src="./assets/img/gallery/optimized/17.jpg"/>
						</a>
					</div>
					<div class="galthree">
						<a href="gallery.php">
							<img src="./assets/img/gallery/optimized/18.jpg"/>
						</a>
					</div>
					<div class="galfour">
						<a href="gallery.php">
							<img src="./assets/img/gallery/optimized/20.jpg"/>
						</a>
					</div>
					<p>Sandamali & Saman</p>
				</div>
				<div class="gal gal2">
					<div class="galone">
						<a href="gallery.php">
							<img src="./assets/img/gallery/optimized/15.jpg"/>
						</a>
					</div>
					<div class="galtwo">
						<a href="gallery.php">
							<img src="./assets/img/gallery/optimized/6.jpg"/>
						</a>
					</div>
					<div class="galthree">
						<a href="gallery.php">
							<img src="./assets/img/gallery/optimized/7.jpg"/>
						</a>
					</div>
					<div class="galfour">
						<img src="./assets/img/gallery/optimized/9.jpg"/>
					</div>
					<p>Kaushi & Chanuka</p>
				</div>
				<div class="gal gal3">
					<div class="galone">
						<a href="gallery.php">
							<img src="./assets/img/gallery/optimized/11.jpg"/>
						</a>
					</div>
					<div class="galtwo">
						<a href="gallery.php">
							<img src="./assets/img/gallery/optimized/3.jpg"/>
						</a>
					</div>
					<div class="galthree">
						<a href="gallery.php">
							<img src="./assets/img/gallery/optimized/8.jpg"/>
						</a>
					</div>
					<div class="galfour">
					<a href="gallery.php">
						<img src="./assets/img/gallery/optimized/22.jpg"/>
					</a>
					</div>
					<p>Hashini & Chamath</p>
				</div>
			</div>
			  <hr>
			<div class="top-vendors">
			<div class="top-title">
			  <h1>Our Top Vendors</h1>
			</div>  
			
			  <div class="vendor-content">
			<?php

             $sqlvendor=" SELECT v.vendorID,v.v_username,v.v_company,v.v_mobile,v.v_email,v.v_imgLoc,sum(amount)as 'sum_amount'
			              FROM Vendor v,payment p WHERE v.vendorID=p.vendorID  
						  GROUP BY v.vendorID,v.v_username,v.v_company,v.v_mobile,v.v_imgLoc  
						  HAVING sum(amount)>2000 
						  ORDER BY sum_amount DESC;						 
						 ";		
			
				if($topvendors=mysqli_query($conn,$sqlvendor)){
					  if($topvendors->num_rows>0){
						    while($row=$topvendors->fetch_assoc()){
								  echo"<div class='top'>";
								  echo "<table >";
							    $sqladcount="SELECT vendorID,count(adID) as 'ad_count'
						                     FROM  Advertisement
						                     WHERE vendorID=".$row['vendorID']."";
            					  if(!$adcount=mysqli_query($conn,$sqladcount)){
									  echo "error occured bacause".$conn->error;
								  }
								  $adcounter=$adcount->fetch_assoc();
                                  echo  "<tr><td rowspan=2><img src='{$row["v_imgLoc"]}' height='100%' width='100%'></td>
                                          <td>User Name:<small>".$row["v_username"]."</small></td></tr>";
                                  echo  "<tr><td>Company Name:<small> ".$row["v_company"] ."</small></td></tr>";
                                  echo  "<tr><td>Contact No:<small>0".$row["v_mobile"]."</small></td>
								         <td>Total Payments:<small>".$row["sum_amount"]."</small></td></tr>";
								  echo "<tr><td>Total Ads:<small> ".$adcounter["ad_count"]."</small></td>
								         <td>Email : <small>".$row["v_email"]."</small></td></tr>";

								  echo "</table>";	   
								  echo "</div>";
							}
					  }else{
						  echo "No Top vendor";
					  }
				}else{
					echo "Error vendor query: ".$conn->error;
				}		 
									
			  ?>
			  </div>
		</div>
<?php include("footer.php"); ?>