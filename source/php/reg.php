<?php
	require '../dbconfig/config.php';	
?>

<html>
	<head>
		<title>Registration Page</title>
		<link href="../css/style.css" rel="stylesheet" text="text/css" />
	</head>

	<body>
		
		<nav>
			<a href="index.php">HOME</a>
			<a href="menu.php">MENU</a>
			<a href="howItWorks.php">HOW IT WORKS</a>
			<a href="contactUs.php">CONTACT US</a>
		</nav>
		
		<div class = "adminHello">
			<br><br><br><br><br><br><br>
			<center><h2>Mom and Pop's Pizza Restaurant</h2></center>
			<br><br>
		</div>
		
		<br><br><br><br><br>		
		
		<div id="mainLogin">
		
			<center><h2>Register Now!</h2></center>
			
			<center><img src="../resources/login/Lpizza.jpg" class="LoginImg" /></center>
			
			<form class="lForm" action="reg.php" method="post"><br>
				<Label><b>Username</b></Label><br>
				<input name="nUsername" type="text" class="userPass" placeholder="Enter your Username" required/><br><br>
				
				<Label><b>Password</b></Label><br>
				<input name="nPassword" type="password" class="userPass" placeholder="Enter your Password" required/><br><br>
				
				<Label><b>Confirm Password</b></Label><br>
				<input name="cPassword" type="password" class="userPass" placeholder="Re-Enter your Password" required/><br><br>
				
				<Label><b>First Name</b></Label><br>
				<input name="fName" type="text" class="userPass" placeholder="Enter your First Name" required/><br><br>
				
				<Label><b>Last Name</b></Label><br>
				<input name="lName" type="text" class="userPass" placeholder="Enter your Last Name" required/><br><br>
			
				<Label><b>Address Line 1</b></Label><br>
				<input name="address1" type="text" class="userPass" placeholder="Enter your Address Line 1" required/><br><br>
				
				<Label><b>Address Line 2</b></Label><br>
				<input name="address2" type="text" class="userPass" placeholder="Enter your Address Line 2" required/><br><br>
				
				<Label><b>Phone Number</b></Label><br>
				<input  name="phNumber" type="text" class="userPass" placeholder="Enter your Phone Number" required/><br><br>
				
				<Label><b>Payment Method</b></Label><br>
				<select name="pMethod" class = "pMethodSelect">
					<option value="Credit/Debit Card">Credit/Debit Card</option>
					<option value="E-Check">E-Check</option>
					<option value="Cash">Cash</option>
				</select><br><br>
				
				<input name="signUp" type="submit" id="lButton" value="Sign-Up" /><br><br>
			
				<a href="index.php"><input type="button" id="backToLogin" value="Back to Login" /></a></form><br><br>
			
		</div>
				
		<?php
			if(isset($_POST['signUp']))
			{
				$nUsername = $_POST['nUsername'];
				$nPassword = md5($_POST['nPassword']);
				$cPassword = md5($_POST['cPassword']);
				$fName = $_POST['fName'];
				$lName = $_POST['lName'];
				$address1 = $_POST['address1'];
				$address2 = $_POST['address2'];
				$phNumber = $_POST['phNumber'];
				$pMethod = $_POST['pMethod'];
				
				if($nPassword==$cPassword)
				{
					$querry = "SELECT username FROM usersTable WHERE username = '$nUsername'";
					$querry_run = mysqli_query($connect,$querry);
					if(mysqli_num_rows($querry_run) > 0)
					{
						echo '<script type="text/javascript">alert("Username already exists, Please Enter another username")</script>';
					}
					else if(is_numeric($fName))
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
						$querry = "INSERT INTO usersTable VALUES($phNumber , '$fName' , '$lName' , '$nUsername' , '$nPassword' , '$address1' , '$address2','$pMethod',0)" ;
						$querry_run = mysqli_query($connect,$querry);
					
						if($querry_run)
						{
							echo'<script text="text/javascript">alert("Registered Successfully, You can now Login!")</script>';
						}
						else
						{
							echo'<script text="text/javascript">alert("Error while registering, Please contact us!")</script>';
						}	
					}
				}
				else
				{
					echo'<script type="text/javascript"> alert("Please make sure that the passwords match")</script>';
				}
			}
		?>
		
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


