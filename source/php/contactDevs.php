
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
			<a href="#">CONTACT DEVELOPERS</a>
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
		
		<div id="contactUs">
		<center><h2>Developer Contact Information</h2></center><br><br><br>
			Please contact the developers with the information provided below to open a support ticket:
			<br><br><hr><br>
			<h3>Amritraj</h3><br>
			<h4>Email</h4>
			amritra@students.kennesaw.edu<br><br><hr><br>
			
			<h3>Paul Hilier</h3><br>
			<h4>Email</h4>
			philier@students.kennesaw.edu<br><br><hr>
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		