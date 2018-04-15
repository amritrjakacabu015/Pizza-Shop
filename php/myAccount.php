<?php
	session_start();
	require '../dbconfig/config.php';
?>

<html>
	
	<head>
		<title>My Account</title>
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
			<center><h1>MY ACCOUNT - <?php echo $_SESSION['username']; ?></h1></center>
			<br><br>
		</div><br><br><br><br>
		
		
		<div class = "myAccount">
			
			<?php
			
				$username = $_SESSION['username'];
				$parameters = array('Phone Number:','First Name:','Last Name:','Address Line 1:','Address Line 2:','Preferred Payment Method:');
				$column = array('phoneNumber','firstName','lastName','address1','address2','paymentType');
				
				for($i = 0 ; $i < 6 ; $i++)
				{
					$querry = "SELECT $column[$i] from usersTable WHERE username = '$username'";
					$querry_run = mysqli_query($connect,$querry);
					$result = mysqli_fetch_row($querry_run);
					echo '<html><h3>';
					echo $parameters[$i];
					echo '<br></h3></html>';
					echo $result[0];
					echo '<html><br><br></html>';
				}
			?>
			
			<a href = "editInfo.php"><input type = "button" value = "Edit Profile" class = "editProfBut" /></a><br><br><hr><br><br>
			
			
			<center><h2>My Orders</h2></center><br><br>
			<?php
				$username = $_SESSION['username'];
				$qry1 = "SELECT date,pName, pSize, pQuantity, eCheeze, pTopping, pCrust, paymentType, totalPayment, orderType, orderStatus FROM orderHistory WHERE username = '$username'";
				$qry1_run = mysqli_query($connect,$qry1);
				
				if(mysqli_num_rows($qry1_run) > 0)
				{
					echo '<center><table border = 1>';
					echo '<tr><th> Date/Time </th><th> Pizza Name </th><th> Size </th><th> Quantity </th><th> Extra Cheese </th><th> Topping </th><th> Crust </th><th> Payment Method </th><th> Amount (USD) </th><th> Order Type </th><th> Order Status </th></tr>';
					
					while($row = mysqli_fetch_array($qry1_run,MYSQLI_ASSOC))
					{
						echo "<tr><td>{$row['date']}</td><td>{$row['pName']}</td><td>{$row['pSize']}</td><td>{$row['pQuantity']}</td><td>{$row['eCheeze']}</td><td>{$row['pTopping']}</td><td>{$row['pCrust']}</td><td>{$row['paymentType']}</td><td>{$row['totalPayment']}</td><td>{$row['orderType']}</td><td>{$row['orderStatus']}</td></tr>";
					}	
					echo '</table></center>';
				}
				else
				{
					echo '<center>There is no Order History for your Account.</center>'; 
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













