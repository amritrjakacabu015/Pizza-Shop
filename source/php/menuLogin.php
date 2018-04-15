<?php
	session_start();
	require '../dbconfig/config.php';
?>

<html>
	<head>
		<title>Account Pizza Menu</title>
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
			<center><h1>MENU</h1></center>
			<br><br>
		</div><br><br><br><br>		
		
		<div id="menuHello">
		
			<center><h2>Welcome <?php echo $_SESSION['username']; ?>! What would you like to have Today?</h2></center>
			
		</div><br><br>

		<script text = "text/javascript">
		
			var pizzaN = ['Pepperoni Pizza - From $5.99','Pizza Margherita - From $6.99','New York-style pizza - From $6.99','Sicilian pizza - From $7.99','Greek pizza - From $8.99','Neapolitan pizza - From $6.99','Pizza marinara - From $8.99','Chicago-style pizza - From $5.99','Meatball pizza - From $8.99','Detroit-style pizza - From $7.99'];
			var pizzaImage = ['pepperonP.jpg','PizzaMargh.jpg','NYPizza.jpg','sicPizza.jpg','grPizza.jpg','npPizza.jpg','pMar.jpg','chiPizza.jpg','mBPizza.jpg','detStPizza.jpg'];
			for(var i = 1; i <= 10; i++)
			{	
				document.write('<div class = "menuItem">');
					document.write('<center><h2>'+pizzaN[i-1]+'</h2></center><br>');
					document.write('<img src = "../resources/menu/'+pizzaImage[i-1]+'"	 class = "pizzaImg" />');
			
					document.write('<div class = "pForm">');
						document.write('<form action = "#" method = "post">');
							document.write('<strong>Quantity :</strong><br>');
								document.write('<select name="pQuantity'+i+'" class = "menuSelect">');
									document.write('<option value="1">1</option>');
									document.write('<option value="2">2</option>');
									document.write('<option value="3">3</option>');
									document.write('<option value="4">4</option>');
									document.write('<option value="5">5</option>');
									document.write('<option value="6">6</option>');
									document.write('<option value="7">7</option>');
									document.write('<option value="8">8</option>');
									document.write('<option value="9">9</option>');
									document.write('<option value="10">10</option>');
								document.write('</select><br><br>');	
						
							document.write('<strong>Pizza Size :</strong><br>');
								document.write('<select name="pSelect'+i+'" class = "menuSelect">');
									document.write('<option value="Small">Small (10 " / 25 cm)</option>');
									document.write('<option value="Medium">Medium (12 " / 30 cm)  (+ USD 2.00/Pizza)</option>');
									document.write('<option value="Large">Large (14 " / 35 cm)  (+ USD 4.00/Pizza)</option>');
								document.write('</select><br><br>');
			
							document.write('<strong>Extra Cheese :</strong><br>');
								document.write('<select name="eCheeze'+i+'" class = "menuSelect">');
									document.write('<option value="No">No</option>');
									document.write('<option value="Yes">Yes (+ USD 0.50/Pizza)</option>');
								document.write('</select><br><br>');
			
							document.write('<strong>Select a Topping :</strong><br>');
								document.write('<select name="pTopping'+i+'" class = "menuSelect">');
									document.write('<option value="Mushrooms">Mushrooms</option>');
									document.write('<option value="Green peppers">Green peppers</option>');
									document.write('<option value="Bacon">Bacon</option>');
									document.write('<option value="Black Olives">Black Olives</option>');
									document.write('<option value="Sausage">Sausage</option>');
									document.write('<option value="Pineapple">Pineapple</option>');
									document.write('<option value="Pepperoni">Pepperoni</option>');
								document.write('</select><br><br>');
					
							document.write('<strong>Pizza Crust :</strong><br>');
								document.write('<select name="pCrust'+i+'" class = "menuSelect">');
									document.write('<option value="Thin Crust">Thin Crust</option>');
									document.write('<option value="Thick Crust">Thick Crust</option>');
								document.write('</select><br><br>');
			
							document.write('<input name = "addCart'+i+'" type = "submit" class = "addToCart" value = "Add To Cart" /><br><br>');
						document.write('</form>');
					document.write('</div>');
			
				document.write('</div><br><br>');
			}
		</script>
		
		<?php
			
			$pizzaN = array('','Pepperoni Pizza','Pizza Margherita','New York-style pizza','Sicilian pizza','Greek pizza','Neapolitan pizza','Pizza marinara','Chicago-style pizza','Meatball pizza','Detroit-style pizza');
			$amount = array(5.99, 6.99, 6.99, 7.99, 8.99, 6.99, 8.99, 5.99, 8.99, 7.99);
			for($j = 1; $j <= 10; $j++)
			{
				if(isset($_POST['addCart'.$j]))	
				{
					$pQuantity = $_POST['pQuantity'.$j];
					$pSelect = $_POST['pSelect'.$j];
					$eCheeze = $_POST['eCheeze'.$j];
					$pTopping = $_POST['pTopping'.$j];
					$pCrust = $_POST['pCrust'.$j];
					$usrename = $_SESSION['username'];
					
					if($pSelect === "Small")
					{
						if($eCheeze === "No")
						{
							$cost = $amount[$j-1] * $pQuantity;
						}
						else
						{
							$cost = ($amount[$j-1] + 0.50) * $pQuantity;
						}
					}
					else if($pSelect === "Medium")
					{
						if($eCheeze === "No")
						{
							$cost = (2.0 + $amount[$j-1]) * $pQuantity;
						}
						else
						{
							$cost = (2.5 + $amount[$j-1]) * $pQuantity;
						}
					}
					else if($pSelect === "Large")
					{
						if($eCheeze === "No")
						{
							$cost = (4.0 + $amount[$j-1]) * $pQuantity;
						}
						else
						{
							$cost = (4.5 + $amount[$j-1]) * $pQuantity;
						}
					}
					
					$querry = "INSERT INTO pizzaTable (username,pName,pQuantity,pSize,eCheeze,pTopping,pCrust,cost) VALUES ('$usrename','$pizzaN[$j]',$pQuantity,'$pSelect','$eCheeze','$pTopping','$pCrust',$cost)";
					$querry_run = mysqli_query($connect,$querry);
					
					if($querry_run)
					{
						echo'<script text="text/javascript">alert("Added to Cart")</script>';
					}
					else
					{
						echo'<script text="text/javascript">alert("Error while adding to cart. Please contact us.")</script>';
					}
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
