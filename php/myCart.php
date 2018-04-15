<?php
	session_start();
	require '../dbconfig/config.php';
?>

<html>
	
	<head>
		<title>My Cart</title>
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
			<center><h1>MY CART</h1></center>
			<br><br>
		</div><br><br><br><br>
		
		<div class = "myCartPage">
			
			<?php
				$username = $_SESSION['username'];
				$querry = "SELECT pName, pQuantity, pSize, eCheeze, pTopping, pCrust, cost FROM pizzaTable WHERE username = '$username'";
				$querry_run = mysqli_query($connect,$querry);
				
				if(mysqli_num_rows($querry_run) >= 1)
				{	
					$total = 0;
					while($i = mysqli_fetch_row($querry_run))
					{
						echo '<div class = "orderPizza">';
					
					
						echo '<h3>Pizza Name:</h3>';
						echo $i[0];
						echo '<br><br>';					
					
						echo '<h3>Quantity:</h3>';
						echo $i[1];
						echo '<br><br>';
					
						echo '<h3>Size:</h3>';
						echo $i[2];
						echo '<br><br>';
					
						echo '<h3>Extra Cheese:</h3>';
						echo $i[3];
						echo '<br><br>';
					
						echo '<h3>Pizza Topping:</h3>';
						echo $i[4];
						echo '<br><br>';
					
						echo '<h3>Pizza Crust:</h3>';
						echo $i[5];
						echo '<br><br>';
						
						echo '<h3>Cost (in USD):</h3>';
						echo $i[6];
						echo '<br><br>';
						
						$total = $total + $i[6];
						
						echo '</div>';
						echo '<br><br><br>';
					}
					
					echo '<hr><br>';
					echo "<center><h3>Total Cost: USD"." $total";
					echo '<br><br><hr><br>';
					
					echo '<form method = "post" action = "" >';
					echo '<input name = "remAllCart" type = "submit" value = "Remove All" class = "remAllCart" >';
					echo '</form></center>';
				
					if(isset($_POST['remAllCart']))
					{
						$username = $_SESSION['username'];
						$qr1 = "DELETE FROM pizzaTable WHERE username = '$username'"; 
						$qr1_run = mysqli_query($connect,$qr1);
						if($qr1_run)
						{
							echo '<script text = "text/javascript"> alert("All Items Removed")</script>';
							header("Refresh:0");
						}
						else
						{
							echo '<script text = "text/javascript"> alert("Failed to Remove Item from Cart. Please contact us.")</script>';
						}
						
					}

					echo '<br><br>';
					echo '<center><a href = "orderNow.php"><input type = "button" value = "Order Now!" class = "orderNow" /></a></center>';
					
				}
				else
				{
					echo '<center>Your Cart is Empty</center>';
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