<html>
	<head>
		<title>Pizza Menu</title>
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
		
		<div id="menuHello">
			<center><h2>Welcome! What would you like to have Today?</h2></center>
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
						document.write('<form>');
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
			
							document.write('<a href = "index.php"><input name = "addCart'+i+'" type = "button" class = "addToCart" value = "Login to Order" /></a><br><br>');
						document.write('</form>');
					document.write('</div>');
			
				document.write('</div><br><br>');
			}
		</script>
		
		
		
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



