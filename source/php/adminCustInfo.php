
<?php
	session_start();
	require '../dbconfig/config.php';	
?>

<html>
	<head>
		<title>Customer Info / Orders</title>
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
			<center><h2>Customer Info / Orders</h2></center><br><br>	
			<center>
			<form action = "adminCustInfo.php" method = "post" >
				<b>Search Customer: </b><br>
				<input name = "searchUser" type = "text" placeholder = "Enter Customer Username" class = "searchUser" required /> <br> <br>
				<input name = "search" type = "submit" value = "Search Customer" class = "searchUserBut" /> <br> <br>
			</form>
			
			<a href = "adminCustInfo.php"><input name = "recentCust" type = "button" value = "Recent Customers" class = "recentCust" /></a> <br><br>
		
			<form action = "adminCustInfo.php" method = "post" >
				<input name = "viewOrders" type = "submit" value = "View Recent Orders" class = "viewOrders" /><br><br>
				<a href = "pendingOrders.php"><input type = "button" value = "Pending Orders" class = "pendingOrdersBut" /></a>
			</form>	</center>
			
			<br><b><hr></b><br>
		
				<?php
				
					
				
					if(isset($_POST['search']))
					{
						$username = $_POST['searchUser'];
						$parameters = array('Username','Phone Number:','First Name:','Last Name:','Address Line 1:','Address Line 2:','Preferred Payment Method:');
						$column = array('username','phoneNumber','firstName','lastName','address1','address2','paymentType');
						
						echo '<div class = "custSearchRes">';
						echo '<center><h2>Customer Information</h2></center><br><br>';
						for($i = 0 ; $i < 7 ; $i++)
						{
							$querry = "SELECT $column[$i] fROM usersTable WHERE username = '$username'";
							$querry_run = mysqli_query($connect,$querry);
							$result = mysqli_fetch_row($querry_run);
							
							if(mysqli_num_rows($querry_run) == 1)
							{
								echo '<html><h3>';
								echo $parameters[$i];
								echo '<br></h3></html>';
								echo $result[0];
								echo '<html><br><br></html>';
							}
							else
							{
								echo '<center>No Such User found the Database</center>';
								break ;
							}
						}
						echo'</div>';
					}
					else if(isset($_POST['viewOrders']))
					{
						
						$qry1 = "SELECT * FROM orderHistory LIMIT 0,100";
						$qry1_run = mysqli_query($connect,$qry1);
						
						if(mysqli_num_rows($qry1_run) > 0)
						{
							echo '<center><h3>Recent Orders</h3></center><br>';
							echo '<center><table border = 1>';
							echo '<tr><th> Date/Time </th><th> Username </th><th> Pizza Name </th><th> Size </th><th> Quantity </th><th> Extra Cheese </th><th> Topping </th><th> Crust </th><th> Payment Method </th><th> Amount (USD) </th><th> Order Type </th><th> Order Status </th></tr>';
							
							while($row = mysqli_fetch_array($qry1_run,MYSQLI_ASSOC))
							{
								echo "<tr><td>{$row['date']}</td><td>{$row['username']}</td><td>{$row['pName']}</td><td>{$row['pSize']}</td><td>{$row['pQuantity']}</td><td>{$row['eCheeze']}</td><td>{$row['pTopping']}</td><td>{$row['pCrust']}</td><td>{$row['paymentType']}</td><td>{$row['totalPayment']}</td><td>{$row['orderType']}</td><td>{$row['orderStatus']}</td></tr>";
							}	
							echo '</table></center>';
						}
						else
						{
							echo '<br><br><center>No Orders available to display at this time.</center>';
						}
						
					}
					else 
					{
						$query = "SELECT username,phoneNumber,firstName,lastName,address1,address2,paymentType FROM usersTable LIMIT 0,50";
						$query_run = mysqli_query($connect,$query);
						
						if($query_run)
						{
							echo '<center><h3>Recent Customers</h3></center><br>';
							echo '<center><table border = 1>';
							echo '<tr><th> Username </th><th> Phone Number </th><th> First Name </th><th> Last Name </th><th> Address Line 1 </th><th> Address Line 2 </th><th> Preferred Payment Method </th></tr>';
							
							while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC))
							{
								echo "<tr><td>{$row['username']}</td><td>{$row['phoneNumber']}</td><td>{$row['firstName']}</td><td>{$row['lastName']}</td><td>{$row['address1']}</td><td>{$row['address2']}</td><td>{$row['paymentType']}</td></tr>";
							}	
							echo '</table></center>';
						}
						else
						{
							echo '<script text = "text/javascript"> alert("Error loading data from the database. Please contact the Developers")</script> ';
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