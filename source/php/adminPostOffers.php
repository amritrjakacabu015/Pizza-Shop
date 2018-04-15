
<?php
	session_start();
	require '../dbconfig/config.php';	
?>

<html>
	<head>
		<title>Post Offers</title>
		<link href="../css/style.css" rel="stylesheet" text="text/css" />
	</head>

	<body>
		
		<nav>
			<a href="adminAcc.php">ACCOUNT DETAILS</a> 
			<a href="adminCustInfo.php">CUSTOMER INFO / ORDERS</a>
			<a href="adminPostOffers.php">POST OFFERS</a>
			<a href="contactDevs.php">CONTACT DEVELOPERS</a>
			<a href = "#"><form class = "myCartForm" method = "post" action = "menuLogin.php" >			
				<input name = "logout" type = "submit" class = "logoutButton" value="Logout" method="post" /></form></a>
		</nav>
		
		<?php
			if($_SESSION['aUsername']==NULL)
			{
				header("location:index.php");
			}
			if(isset($_POST['logout']))
			{
				session_destroy();
				header("location:index.php");
			}		
		?>
		
		
		<div class = "adminHello">
			<br><br><br><br><br><br><br>
			<center><h2>Administrator Account - <?php echo $_SESSION['aUsername']; ?></h2></center>
			<br><br>
		</div><br><br><br><br>
		
		
		<div class = "postOfferDiv">
			
			<h2><center>Post Offers</center></h2><br><br>
			
			<form method = "post" action = "adminPostOffers.php">
				<b>Offer ID Number</b><br>
				<input type = "text" name = "offerID" class = "postOfferHead"	placeholder = "Provide a Unique ID for the new Offer [0 , 99999]" required/><br><br>
				
				<b>Offer heading</b><br>
				<textarea name = "postOfferHead" class = "postOfferHead" placeholder = "Offer Heading" cols = "200" rows = "5" required/></textarea><br><br>
				
				<b>Offer Description</b><br>
				<textarea name = "postOfferDesc" placeholder = "Describe the Offer" class = "postOfferDesc" cols = "200" rows = "10" required></textarea><br><br>
				
				<input name = "postOffer" type = "submit" class = "postOfferBut" value = "Post Offer" /><br><br>
			</form>
			
			<form method = "post" action = "adminPostOffers.php">
				<input name = "viewOffers" type = "submit" class = "viewOffers" value = "View All Offers" /><br><br>
			
				<a href = "removeOffer.php"><input type = "button" class = "removeOffers" value = "Remove/Edit Offer" /></a><br><br>
				
				<input name = "removeAllOffers" type = "submit" class = "removeAllOffers" value = "Remove All Offers" />
			</form><br><br>
		
			<?php
				
				if(isset($_POST['postOffer']))
				{	
					$offerID = $_POST['offerID'];
					$offerHead = $_POST['postOfferHead'];
					$offerDesc = $_POST['postOfferDesc'];
					
					if($offerID > 99999 || $offerID < 0)
					{
						echo '<script text="text/javascript">alert("Please enter a valid ID number ( between [0 , 99999] )")</script>';
					}
					else if(is_numeric($offerID))
					{
						
						$qry1 = "INSERT INTO offersTable VALUES ($offerID,'$offerHead','$offerDesc')";
						$qry1_run = mysqli_query($connect,$qry1);
						if($qry1_run)
						{
							echo '<script text="text/javascript">alert("Offer Posted Successfully")</script>';
						}
						else
						{
							echo '<script text="text/javascript">alert("Failed to post offer, Please contact the developers")</script>';
						}
					}
					else
					{
						echo '<script text="text/javascript">alert("Please Enter a numeric OfferID")</script>';
					}
				}
				else if(isset($_POST['viewOffers']))
				{
					$qry1 = "SELECT * FROM offersTable";
					$qry1_run = mysqli_query($connect,$qry1);
					$parameters = array('Offer ID No.','Offer Heading','Offer Description');
					if($qry1_run)
					{
						echo '<center><h2>All Offers</h2></center><br>';
						if(mysqli_num_rows($qry1_run) >= 1)
						{	
							while($row = mysqli_fetch_row($qry1_run))
							{
								echo '<br><hr><br>';
								echo '<div class = "displayOfferWhile">';

								echo '<h3>';
								echo $parameters[0];
								echo '</h3>';
								echo '<br>';
								echo $row[0];
								echo '<br><br>';
								
								echo '<h3>';
								echo $parameters[1];
								echo '</h3>';
								echo '<br>';
								echo $row[1];
								echo '<br><br>';
								
								echo '<h3>';
								echo $parameters[2];
								echo '</h3>';
								echo '<br>';
								echo $row[2];
								echo '<br><br>';
								
								echo '</div>';
							}
						}
						else if(mysqli_num_rows($qry1_run) < 1)
						{					
							echo '<br><br><center>No current offers posted</center>';
						}
					}
					else
					{
						echo '<script text="text/javascript">alert("Failed to display all offers, Please contact the developers")</script>';
					}
				}
				else if(isset($_POST['removeAllOffers']))
				{
					$qry1 = "DELETE FROM offersTable";
					$qry1_run = mysqli_query($connect,$qry1);
					
					if($qry1_run)
					{
						echo '<script text="text/javascript">alert("All Offers removed Successfully")</script>';
					}
					else
					{
						echo '<script text="text/javascript">alert("Failed to remove all offers, Please contact the developers")</script>';
					}
				}
				
			?>
		</div>
		
		
		<br><br><br><br><br><br><br><br><br>
		<div class = "bottomPage">
			<br><br><center>
			<p class = "imageHead">Connect with us on social media:</p><br>
			<a href = "#"><img src = "../resources/social/facebook.jpg" class = "social" /></a> &nbsp;
			<a href = "#"><img src = "../resources/social/twitter.png" class = "social" /></a> &nbsp;
			<a href = "#"><img src = "../resources/social/linkedin.png" class = "social" /></a> &nbsp;
			<a href = "#"><img src = "../resources/social/googleplus.png" class = "social" /></a> &nbsp;
			<a href = "#"><img src = "../resources/social/instagram.jpg" class = "social" /></a> &nbsp;
			<a href = "#"><img src = "../resources/social/youtube.jpg" class = "social" /></a> &nbsp;
			<br><br><br><br>
			<p class = "imageHead"><a class = "terms" href = "#">Terms of Use</a><br><br><a class = "terms" href = "#">Privacy Statement</a><br><br><a class = "terms" href = "#">Leave Feedback</a><br><br><a class = "terms" href = "#">About Us</a></p>
			</center>
			<div class = "devs">
			<p class = "devsPara"> Website Developers - <BR>Amritraj<br>Paul Hilier</p>
			</div>
			
		</div>
	</body>
</html>












