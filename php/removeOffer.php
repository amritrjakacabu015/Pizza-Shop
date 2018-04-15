<?php
	session_start();
	require '../dbconfig/config.php';	
?>

<html>
	<head>
		<title>Edit and Remove Offers</title>
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
		<center><h2>Remove / Edit Offer</h2></center><br>><br>
		
		<form method = "post" action = "removeOffer.php">
			<input name = "searchOfferText" type = "text" class = "postOfferHead" placeholder = "Enter Offer ID" required /><br><br>
			<input type = "submit" name = "searchOfferBut" value = "Search Offer" class = "postOfferBut" /><br><br>
			<input type = "submit" name = "removeOffer" value = "Remove Offer" class = "reOffers" /><br><br>
			<input type = "submit" name = "editOffer" value = "Edit Offer" class = "editOffers" /><br><br>
			<a href = "adminPostOffers.php"><input type = "button" class = "removeOffers" value = "Back to Post Offers" /></a>
		</form>
		
		<?php

			if(isset($_POST['searchOfferBut']))	
			{	
				$offerID = $_POST['searchOfferText'];
				
				$qry1 = "SELECT * FROM offersTable WHERE offerNo = $offerID";
				$qry1_run = mysqli_query($connect,$qry1);
				$parameters = array('Offer ID No.','Offer Heading','Offer Description');
				
				if($qry1_run)
				{
					echo '<br><br><center><h2>Search Result</h2></center><br>';
					
					if(mysqli_num_rows($qry1_run) == 1)
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
					else
					{
						echo '<br><br><center>No Such offer Found</center>';
					}
				}
				else
				{
					echo '<script text="text/javascript">alert("Search Failure, Please contact the developers")</script>';
				}
			}
			else if(isset($_POST['removeOffer']))
			{
				$offerID = $_POST ['searchOfferText'];
				$qry2 = "DELETE FROM offersTable WHERE offerNo = $offerID";
				$qry2_run = mysqli_query($connect,$qry2);
				
				if($qry2_run)
				{
					echo '<script text="text/javascript">alert("Offer Removed Successfully")</script>';
				}
				else
				{
					echo '<script text="text/javascript">alert("Failed to remove Offer. Please contact the developers")</script>';
				}
			}
			else if(isset($_POST['editOffer']))
			{
				
				$offerID = $_POST ['searchOfferText'];
					
					$querry = "SELECT offerHead, offerDesc FROM offersTable WHERE offerNo = $offerID";
					$querry_run = mysqli_query($connect,$querry);
					$result = mysqli_fetch_row($querry_run);
		
				
				echo '<form action="removeOffer.php" method="post"><br>';
					
					echo '<Label><b>Offer Heading</b></Label><br>';
					echo '<textarea name="offerHead" class="postOfferHead" placeholder="Offer Heading" required>'.$result[0].'</textarea><br><br>';
					
					echo '<Label><b>Offer Description</b></Label><br>';
					echo '<textarea name="offerDesc" placeholder="Describe the Offer" class = "postOfferDesc" cols = "200" rows = "10" required>'.$result[1].'</textarea><br><br>';
				
					echo '<input name="postOffer" type="submit" class = "editOfferButton" value="Post Offer" /><br><br>';
					
				echo '</form>';	
			
			}	
			
			
			if(isset($_POST['postOffer']))
				{
					$offerH = $_POST['offerHead'];
					$offerD = $_POST['offerDesc'];
					$qry1 = "UPDATE offersTable SET offerHead = '$offerH', offerDesc = '$offerD'";
					$qry1_run = mysqli_query($connect,$qry1);
					if($qry1_run)
					{
						echo '<script text="text/javascript">alert("Offer Edited Successfully.")</script>';
					}
					else
					{
						echo '<script text="text/javascript">alert("Failed to edit Offer. Please contact the developers")</script>';
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










