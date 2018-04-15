<?php
	session_start();
	require '../dbconfig/config.php';
?>

<html>
	
	<head>
		<title>Account How It Works</title>
		<link href="../css/style.css" rel="stylesheet" text="text/css" />
	</head>

	<body>
		<nav>
			<a href = "myAccount.php">MY ACCOUNT</a>
			<a href="menuLogin.php">MENU</a>
			<a href="offersAccount.php">OFFERS</a>
			<a href="howItWorksA.php">HOW IT WORKS</a>
			<a href="contactUsA.php">CONTACT US</a>
			<a href = "#"><form class = "myCartForm" method = "post" action = "menuLogin.php" >			
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
			<center><h1>HOW IT WORKS</h1></center>
			<br><br>
		</div><br><br><br><br>
		
		
		<div id="howItWorks">
			<ol>	1)		Register on the Home Page of this website.</ol><br>
			<ol>	2)		If you are already registered on the website, Login with your Username and Password. </ol><br>
			<center><img src = "../resources/howItWorks/1.png" /></center><br>
			<ol>	3)		You will be directed to the menu page on your account.</ol><br>
			<center><img src = "../resources/howItWorks/2.png" /></center><br>
			<ol>	4)		Customize any Pizza as you like.</ol><br>
			<center><img src = "../resources/howItWorks/3.png" /></center><br>
			<ol>	5)		After customizing, Click on "Add to Cart".</ol><br>
			<ol>	6) 		Click on "My Cart" button to review your order.</ol><br>
			<center><img src = "../resources/howItWorks/5.png" /></center><br>
			<ol>	7)		Click on "Order now" button.</ol><br>
			<center><img src = "../resources/howItWorks/6.png" /></center><br>
			<ol>	8)		Select Delivery or Pick-up.</ol><br>
			<center><img src = "../resources/howItWorks/7.png" /></center><br>
			<ol>	9)		Click on "Finish Order".</ol><br>			
			<ol>	10)		You are done.</ol><br>
			<ol>	11)		You can check your Order status and history on "My account" page.</ol><br>
			<center><img src = "../resources/howItWorks/8.png" /></center><br>
			<ol>	12)		If you ordered for home delivery, It will take us about 45 mins to prepare and deliver your order.</ol><br>
			<ol>	13)		If you ordered for Pickup. We will send you a notification on your phone number when your order is ready for Pick-up.</ol><br>
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

