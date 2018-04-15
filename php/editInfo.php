<?php
	session_start();
	require '../dbconfig/config.php';
?>

<html>
	
	<head>
		<title>Edit Info</title>
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
			<center><h1>EDIT INFORMATION - <?php echo $_SESSION['username']; ?></h1></center>
			<br><br>
		</div><br><br><br><br>
		
		<div class = "editInfoDiv">
		
			<center><h2>Edit Infromation</h2></center>
			
			<?php
				$username = $_SESSION['username'];
				
				$querry = "SELECT firstName, lastName, address1, address2, phoneNumber, paymentType FROM usersTable WHERE username = '$username'";
				$querry_run = mysqli_query($connect,$querry);
				$result = mysqli_fetch_row($querry_run);
			
			?>
			
			<form action="editInfo.php" method="post"><br>
				<Label><b>First Name</b></Label><br>
				<input name="fName" value = <?php echo "$result[0]"; ?> type="text" class="editInfoText" placeholder="Enter your First Name" required /><br><br>
				
				<Label><b>Last Name</b></Label><br>
				<input name="lName" value = <?php echo "$result[1]"; ?> type="text" class="editInfoText" placeholder="Enter your Last Name" required /><br><br>
			
				<Label><b>Address Line 1</b></Label><br>
				<textarea name="address1" class="adres" placeholder="Address Line 1" required><?php echo '  '; echo "$result[2]" ; ?></textarea><br><br>
				
				<Label><b>Address Line 2</b></Label><br>
				<textarea name="address2" class="adres" placeholder="Address Line 2" required><?php echo '  '; echo "$result[3]" ; ?></textarea><br><br>
				
				
				<Label><b>Phone Number</b></Label><br>
				<input  name="phNumber" value = <?php echo "$result[4]"; ?> type="text" class="editInfoText" placeholder="Enter your Phone Number" required /><br><br>
				
				<Label><b>Payment Method</b></Label><br>
				<select name="pMethod" class = "pMethodSelect" >
					<option value="Credit/Debit Card">Credit/Debit Card</option>
					<option value="E-Check">E-Check</option>
					<option value="Cash">Cash</option>
				</select><br><br>
				
				<input name="save" type="submit" id="lButton" value="Save Changes" /><br><br>
				
				<a href = "myAccount.php"><input type="button" id="rButton" value="Back To Profile" /></a></form><br>
		
			
			<?php
				if(isset($_POST['save']))
				{
					$username = $_SESSION['username'];
					$fName = $_POST['fName'];
					$lName = $_POST['lName'];
					$address1 = $_POST['address1'];
					$address2 = $_POST['address2'];
					$phNumber = $_POST['phNumber'];
					$pMethod = $_POST['pMethod'];
				
					
					$querry = "SELECT username FROM usersTable WHERE username = '$username'";
					$querry_run = mysqli_query($connect,$querry);
					if(is_numeric($fName))
					{
						echo '<script type="text/javascript">alert("Please enter a valid First Name")</script>';
					}
					else if(is_numeric($lName))
					{
						echo '<script type="text/javascript">alert("Please enter a valid Last Name")</script>';
					}
					else if(!is_numeric($phNumber))
					{
						echo '<script type="text/javascript">alert("Please enter a valid Phone Number")</script>';
					}
					else
					{
						$querry = "UPDATE usersTable SET phoneNumber = $phNumber , firstName = '$fName' , lastName = '$lName' , address1 = '$address1' , address2 = '$address2', paymentType = '$pMethod' WHERE username = '$username'";
						$querry_run = mysqli_query($connect,$querry);
					
						if($querry_run)
						{
							echo'<script text="text/javascript">alert("Changes Saved")</script>';
						}
						else
						{
							echo'<script text="text/javascript">alert("Error while saving changes, Please contact us!")</script>';
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















