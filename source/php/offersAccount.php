<?php
	session_start();
	require '../dbconfig/config.php';
?>

<html>
	
	<head>
		<title>Offers</title>
		<link href="../css/style.css" rel="stylesheet" text="text/css" />
	</head>

	<body>
		<nav>
			<a href = "myAccount.php">MY ACCOUNT</a>
			<a href="menuLogin.php">MENU</a>
			<a href="#">OFFERS</a>
			<a href="howItWorksA.php">HOW IT WORKS</a>
			<a href="contactUsA.php">CONTACT US</a>
			<a href = "#"><form class = "myCartForm" method = "post" action = "orderConfirmation.php" >			
				<input name = "myCart" type = "submit" class = "myCart" value = "My Cart" />
				<input name = "logout" type = "submit" class = "logoutButton" value="Logout" method="post" /></form></a>
		</nav>
		
		<?php
			if($_SESSION['username']==NULL)
			{
				header("location:index.php");
			}
			if(isset($_POST['myCart']))
			{
				header('location:myCart.php');
			}
			if(isset($_POST['logout']))
			{
				session_destroy();
				header("location:index.php");
			}		
		?>
		
		<div class = "adminHello">
			<br><br><br><br><br><br><br>
			<center><h1>CURRENT OFFERS</h1></center>
			<br><br>
		</div><br><br><br><br>
		
		<div class = "customerOffer">
		
			<?php
				$qry = "SELECT offerHead, offerDesc FROM offersTable";
				$qry_run = mysqli_query($connect,$qry);
				if($qry_run)
				{
					while($row = mysqli_fetch_row($qry_run))
					{
						echo '';
						echo '<div class = "displayOfferWhile">';

						echo '<h3>';
						echo $row[0];
						echo '</h3><br>';
						
						echo $row[1];
						echo '<br>';
	
					
						echo '</div>';
						echo '<br><br>';
					}
				}
				if (mysqli_num_rows($qry_run) == 0)
				{
					echo '<center><br><br>No Offers available at this time, Check in later for exciting offers.</center>';
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














