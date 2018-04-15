<?php
	session_start();
	require '../dbconfig/config.php';
?>

<html>
	
	<head>
		<title>Order Now!</title>
		<link href="../css/style.css" rel="stylesheet" text="text/css" />
	</head>

	<body>
		<nav>
			<a href = "myAccount.php">MY ACCOUNT</a>
			<a href="menuLogin.php">MENU</a>
			<a href="offersAccount.php">OFFERS</a>
			<a href="howItWorksA.php">HOW IT WORKS</a>
			<a href="contactUsA.php">CONTACT US</a>
			<a href = "#"><form class = "myCartForm" method = "post" action = "orderNow.php" >			
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
			<center><h1>ORDER NOW!</h1></center>
			<br><br>
		</div><br><br><br><br>
		
		
		<div class = "orderNowDiv">
			<center><h2>Finalize Order</h2></center><br><br>
			
			<?php
				$username = $_SESSION['username'];
				
				$querry = "SELECT pName, pQuantity, pSize, eCheeze, pTopping, pCrust, cost FROM pizzaTable WHERE username = '$username'";
				$querry_run = mysqli_query($connect,$querry);
				
				if(mysqli_num_rows($querry_run) >= 1)
				{	
					$total = 0;
					while($i = mysqli_fetch_row($querry_run))
					{	
						echo '<hr><br>';				
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
						
						echo '<h3>Cost (in USD)</h3>';
						echo $i[6];
						echo '<br><br>';
						
						$total = $total + $i[6];
						
					}
					
					echo '<hr><br>';
					echo "<center><h3>Total Cost: USD"." $total";
					echo '<br><br></center>';
					
					echo '<hr><br><center><form action = "orderNow.php" method = "post">';
					echo '<h3>How would you like your Order?</h3><br>';
					echo '<select name = "orderType" class = "orderType">';
						echo '<option  value = "Pick-Up" > Pick-Up </option>';
						echo '<option  value = "Delivery" > Delivery </option>';
					echo '</select><br><br>';
					echo '<input name = "finishOrder" type = "submit" value = "Finish Order" class = "finishOrderBut" /><br><br>';
					echo '<a href = "myCart.php"><input type = "button" class = "goBackCart" value = "Back to My Cart" /></a>';
					echo '</form></center>';
					
					if(isset($_POST['finishOrder']))
					{				
						$orderType = $_POST['orderType'];
						
						$qry1 = "SELECT paymentType FROM usersTable WHERE username = '$username'";
						$qry1_run = mysqli_query($connect,$qry1);
						$qry1_result = mysqli_fetch_row($qry1_run);
						
						
						$qry2 = "SELECT pName, pSize, pQuantity, eCheeze, pTopping, pCrust, cost FROM pizzaTable WHERE username = '$username'";
						$qry2_run = mysqli_query($connect,$qry2);
						while($row = mysqli_fetch_row($qry2_run))
						{
							$qry3 = "INSERT INTO orderHistory VALUES (NULL,NOW(),'$username', '$row[0]', '$row[1]',$row[2],'$row[3]','$row[4]','$row[5]','$qry1_result[0]',$row[6],'$orderType','Pending')";
							$qry3_run = mysqli_query($connect,$qry3);
						}
						
						if(!$qry3_run)
						{
							echo '<script text = "text/javascript"> alert("Failed to take Order. Please contact Us.");</script>';
						}
						else
						{
							$qry4 = "DELETE FROM pizzaTable WHERE username = '$username'";
							$qry4_run = mysqli_query($connect,$qry4);
							if($qry4_run)
							{
								sleep(2);
								echo '<script text = text/javascript>window.location.assign("orderConfirmation.php");</script>';
							}
						}
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

















