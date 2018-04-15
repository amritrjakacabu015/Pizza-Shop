<?php
	session_start();
	require '../dbconfig/config.php';	
?>

<html>
	<head>
		<title>Customer Pending Orders</title>
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
		
		<div class = "custInfoDiv">
		
		<br><br>
			<center><h2>Search Pending Orders</h2></center><br><br>	
			<center>
			<form action = "pendingOrders.php" method = "post" >
				<b>Search Customer Order: </b><br>
				<input name = "searchUser" type = "text" placeholder = "Enter Customer Username for pending orders" class = "searchUser" required /> <br> <br>
				<input name = "search" type = "submit" value = "Search Orders" class = "searchUserBut" /> <br> <br>
				<a href = "pendingOrders.php"><input type = "button" class = "allPendingOrdersBut" value = "All Pending Orders" /></a><br><br>
				<a href = "adminCustInfo.php"><input type = "button" class = "pendingOrdersBut" value = "Go Back" /></a>
			</form>
			
			<br><br>
			
			
			<?php
				if(isset($_POST['search']))
				{
					$username = $_POST['searchUser'];
					
					$qry1 = "SELECT * FROM orderHistory WHERE username = '$username' AND (orderStatus = 'Pending' OR orderStatus = 'Cooking' OR orderStatus = 'Ready for Pick-Up' OR orderStatus = 'Out for Delivery')";
					$qry1_run = mysqli_query($connect,$qry1);
			
					if(mysqli_num_rows($qry1_run) > 0)
					{	
							echo '<hr><br><center><h3>Recent Orders</h3></center><br>';
							$i = 1;
							$ordID = array();
							while($row = mysqli_fetch_array($qry1_run,MYSQLI_ASSOC))
							{
								$ordID[$i] = $row['orderID'];
								echo '<br><br>';
								echo '<center><table border = 1>';
								echo '<tr><th> Date/Time </th><th> Username </th><th> Pizza Name </th><th> Size </th><th> Quantity </th><th> Extra Cheese </th><th> Topping </th><th> Crust </th><th> Payment Method </th><th> Amount (USD) </th><th> Order Type </th><th> Order Status </th></tr>';
								
								echo "<tr><td>{$row['date']}</td><td>{$row['username']}</td><td>{$row['pName']}</td><td>{$row['pSize']}</td><td>{$row['pQuantity']}</td><td>{$row['eCheeze']}</td><td>{$row['pTopping']}</td><td>{$row['pCrust']}</td><td>{$row['paymentType']}</td><td>{$row['totalPayment']}</td><td>{$row['orderType']}</td><td>{$row['orderStatus']}</td></tr>";
							
								echo '</table></center>';
								
								echo '<br>';
								echo '<script text = "text/javascript">';
									echo 'document.write(\'<form action = "#" method = "post">\');';
										echo 'document.write("<strong>New Order Statuts :</strong><br>");';
										echo 'document.write(\'<select name="eCheeze'.$i.'\" class = \"orderStatusSelect\">\');';
											echo 'document.write(\'<option value=" Pending "> Pending </option>\');';
											echo 'document.write(\'<option value=" Cooking "> Cooking </option>\');';
											echo 'document.write(\'<option value=" Ready for Pick-Up "> Ready for Pick-Up </option>\');';
											echo 'document.write(\'<option value=" Out for Delivery "> Out for Delivery </option>\');';
											echo 'document.write(\'<option value="Complete"> Complete </option>\');';
										echo 'document.write(\'</select><br><br>\');';
										echo 'document.write(\'<input name = "newOrderStatuts'.$i.'\" type = \"submit\" class = \"newOrderStatuts\" value = \"Change Order Status\" /><br><br>\');';
									echo 'document.write(\'</form>\')';
								echo '</script>';
								echo '<br><hr>';
								$i++;
							}		
					}
					else
					{
						echo '<hr><br><br><center>No Orders exist with that username.</center>';
					}
				}
				else
				{					
					$qry1 = "SELECT * FROM orderHistory WHERE orderStatus = 'Pending' OR orderStatus = 'Cooking' OR orderStatus = 'Ready for Pick-Up' OR orderStatus = 'Out for Delivery'";
					$qry1_run = mysqli_query($connect,$qry1);
			
					if(mysqli_num_rows($qry1_run) > 0)
					{
							echo '<hr><br><center><h3>All Pending Orders</h3></center><br>';
							$i = 1;
							$ordID = array();
							while($row = mysqli_fetch_array($qry1_run,MYSQLI_ASSOC))
							{
								$ordID[$i] = $row['orderID'];
								echo '<br><br>';
								echo '<center><table border = 1>';
								echo '<tr><th> Date/Time </th><th> Username </th><th> Pizza Name </th><th> Size </th><th> Quantity </th><th> Extra Cheese </th><th> Topping </th><th> Crust </th><th> Payment Method </th><th> Amount (USD) </th><th> Order Type </th><th> Order Status </th></tr>';
								
								echo "<tr><td>{$row['date']}</td><td>{$row['username']}</td><td>{$row['pName']}</td><td>{$row['pSize']}</td><td>{$row['pQuantity']}</td><td>{$row['eCheeze']}</td><td>{$row['pTopping']}</td><td>{$row['pCrust']}</td><td>{$row['paymentType']}</td><td>{$row['totalPayment']}</td><td>{$row['orderType']}</td><td>{$row['orderStatus']}</td></tr>";
							
								echo '</table></center>';
								
								echo '<br>';
								echo '<script text = "text/javascript">';
									echo 'document.write(\'<form action = "#" method = "post">\');';
										echo 'document.write("<strong>New Order Statuts :</strong><br>");';
										echo 'document.write(\'<select name="newOrderStatus'.$i.'\" class = \"orderStatusSelect\">\');';
											echo 'document.write(\'<option value="Pending"> Pending </option>\');';
											echo 'document.write(\'<option value="Cooking"> Cooking </option>\');';
											echo 'document.write(\'<option value="Ready for Pick-Up"> Ready for Pick-Up </option>\');';
											echo 'document.write(\'<option value="Out for Delivery"> Out for Delivery </option>\');';
											echo 'document.write(\'<option value="Complete"> Complete </option>\');';
										echo 'document.write(\'</select><br><br>\');';
										echo 'document.write(\'<input name = "newOrderStatutsBut'.$i.'\" type = \"submit\" class = \"newOrderStatuts\" value = \"Change Order Status\" /><br><br>\');';
									echo 'document.write(\'</form>\')';
								echo '</script>';
								echo '<br><hr>';
								$i++;
							}
					}
					else
					{
						echo '<hr><br><br><center>No Pending Orders at this time.</center>';
					}
				}
				
				if(mysqli_num_rows($qry1_run) > 0)
				{
					for($j = 1; $j < $i; $j++)
					{
						if(isset($_POST['newOrderStatutsBut'.$j]))
						{
							$newStatus = $_POST['newOrderStatus'.$j];
							
							$qry4 = "UPDATE orderhistory SET orderStatus = '$newStatus' WHERE orderID = $ordID[$j]";
							$qry4_run = mysqli_query($connect,$qry4);
							
							if($qry4_run)
							{
								echo '<script text = "text/javascript"> alert("Order Status Changed Successfully.");</script>';
							}
							else
							{
								echo '<script text = "text/javascript"> alert("Failed to Change Order Status, Please contatct the developers.");</script>';
							}
						}
					}
				}
				?>
			
			<br><br><br>

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