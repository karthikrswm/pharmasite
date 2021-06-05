<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("db_connection.php"); ?>
<?php 
if(!logged_in()) $_SESSION["message"] = "Please login to place the order";
confirm_logged_in(); ?>

<?php		
		if(isset($_POST["confirm"]))
		{
			$selected_product = $_POST["product_id"];
			$quantity=$_POST["qty"];
		}
		
		else
		{
			redirect_to("index.php");
		}


?>

<html>
<head>
    <title>PharmaSite | Place order</title>
    <link rel="shortcut icon" href="images/ps-icon.png" type="image/type here" />
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/ex_ss.css" type="text/css" rel="stylesheet" />
    <script src="js/jsfile.js"></script>

    <style>

        .content
        {

            box-shadow: 0 0 10px 5px rgba(0,0,0,0.6); 
			padding:50px;
            height:900px;
            width:900px;
            margin:0px auto;

        }

        .content form
        {
            font-size:33px;
            font-variant:small-caps;
            font-weight:bold;
            font-family:Segoe UI Light;
        }

       .content form input,textarea
        {
            font-size:25px;
            font-family:Segoe UI Light;
			margin:10px;
        }

       .content form input:focus    
        {    
            border: solid 2px black;  
            color:green;                   
        }
		
		.short_product
		{
			font-size:20px;
			font-variant:small-caps;
			font-weight:bold;
			font-family:Segoe UI Light;
			float:left;
			margin-left:75px;
			padding-left:25px;
			border-left:solid 1px #000;
		}
    </style>

</head>
<body>
    <div class="container">
        <div id="header">
                <a href="index.php">
                    <img src="images/ps.png" id="logo"/>
                </a>
                <br />
                <span style="color:black;font-family:Segoe UI Light;font-size:27px;"><b>One Stop Shop For All The Medicines</b></span>
            <div style="float:right;">
                <div id="account">
				    <ul id="drop-nav">
                    <li>
                        <a href="view_profile.php" style="margin-right:5px;-webkit-transition: 0.1s 0.1s;">My Account &#9759;</a>
                        <ul>
                            <li> <a href="view_profile.php">View Profile</a> </li>
                            <li> <a href="settings.php">Settings</a> </li>
                            <li> <a href="help.php">Help Center</a> </li>
                            <li> <a href="logout.php">Log Out</a> </li>
                        </ul>
                    </li>
					</ul>
				</div>
            </div>
        </div>


            <div id="menutop">
                <ul id="drop-nav">
                    <li>
                        <a href="categories/prescriptions.php">PRESCRIPTIONS</a>
                        <ul>
                            <li> <a href="categories/prescriptions.php#medi">Medications</a> </li>
                            <li> <a href="categories/prescriptions.php#all">Allergies</a> </li>
                            <li> <a href="categories/prescriptions.php#pain">Pain Relievers</a> </li>
                            <li> <a href="categories/prescriptions.php#adep">Anti-Depressants</a> </li>
                            <li> <a href="categories/prescriptions.php#aim">Anti-Itch Medications</a> </li>
                            <li> <a href="categories/prescriptions.php#atb">Anti-Tuberculosis (Tb) Medications</a> </li>
                            <li> <a href="categories/prescriptions.php#ab">Antibiotics</a> </li>
                            <li> <a href="categories/prescriptions.php#am">Asthma Medications</a> </li>
                            <li> <a href="categories/prescriptions.php#cfm">Cold & Flu Medications</a> </li>
                            <li> <a href="categories/prescriptions.php#sd">Skin Diseases</a> </li>
                            <li> <a href="categories/prescriptions.php#wl">Weight Loss/Obesity Medications</a> </li>
                            <li> <a href="categories/prescriptions.php#wn">Womens Need</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="categories/otc.php">OTC</a>
                        <ul>
                            <li> <a href="categories/otc.php#fa">First Aid</a> </li>
                            <li> <a href="categories/otc.php#hc">Health Care</a> </li>
                            <li> <a href="categories/otc.php#mc">Mens Care</a> </li>
                            <li> <a href="categories/otc.php#wc">Womens Care</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="categories/diabetes.php">DIABETES</a>
                        <ul>
                            <li> <a href="categories/diabetes.php#fb">Food & Beverages</a> </li>
                            <li> <a href="categories/diabetes.php#ns">Nutrition & Supplements</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="categories/baby.php">BABY</a>
                        <ul>
                            <li> <a href="categories/baby.php#bi">Baby & Infant</a> </li>
                            <li> <a href="categories/baby.php#mmc">Maternity & Mother Care</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="categories/personal.php">PERSONAL</a>
                        <ul>
                            <li> <a href="categories/personal.php#bc">Body Care</a> </li>
                            <li> <a href="categories/personal.php#cs">Cosmetics</a> </li>
                            <li> <a href="categories/personal.php#ec">Eye Care</a> </li>
                            <li> <a href="categories/personal.php#fk">Facial Kit</a> </li>
                            <li> <a href="categories/personal.php#hc">Hair Care</a> </li>
                            <li> <a href="categories/personal.php#lc">Lip Care</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="categories/wellness.php">WELLNESS</a>
                        <ul>
                            <li> <a href="categories/wellness.php#bha">Brace & Health Aids</a> </li>
                            <li> <a href="categories/wellness.php#ft">Fitness</a> </li>
                            <li> <a href="categories/wellness.php#hme">Health Monitor & Equipments</a> </li>
                            <li> <a href="categories/wellness.php#sca">Senior Care & Aids</a> </li>
                            <li> <a href="categories/wellness.php#ss">Supplements</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="categories/household.php">HOUSEHOLD</a>
                        <ul>
                            <li> <a href="categories/household.php#bfc">Break Fast Cereals</a> </li>
                            <li> <a href="categories/household.php#hc">Home Care</a> </li>
                            <li> <a href="categories/household.php#sl">Speciality</a> </li>
                        </ul>
                    </li>

                    <li> <a href="all_products.php">ALL PRODUCTS</a> </li>
                </ul>
            </div>

        <p style="color:#000;font-family:Segoe UI Light;font-size:3em;text-align:center;">
            Place the Order
        </p>
		
        <div class="content" >
		<?php echo message(); ?>
		<?php 
		if(logged_in()) 
		{  	
			$user=find_user_by_username($_SESSION["username"]);
			$fname=$user["fname"];
			$lname=$user["lname"];
			$email=$user["email"];
			$mobile=$user["mobile"];
			$address=$user["address"];
		}
		?>
		<div style="float:left;">
            <form action="checkout.php" method="post">
					Enter the Shipping Details :<br><br />
                    <input type="text" name="fname" placeholder="First Name" required value="<?php echo $fname ?>" autofocus><br />
                    <input type="text" name="lname" placeholder="Last Name" required value="<?php echo $lname ?>"><br>
					<input type="text" name="email" placeholder="Email" required value="<?php echo $email ?>"><br />
                    <input type="text" name="mobile" placeholder="Mobile" required maxlength="10" autocomplete="off" value="<?php echo $mobile ?>"><br>
					<textarea rows="5" cols="25" name="address" placeholder="Address" required autocomplete="off"><?php echo $address ?></textarea><br>
					<input type="number" name="pincode" placeholder="Pincode" required autocomplete="off"><br>
					<input type="text" name="city" placeholder="City" required autocomplete="off"><br>
					<input type="text" name="state" placeholder="State" required autocomplete="off"><br>
					<input type="checkbox" style="width: 15px;height: 15px;" required>I accept all the <a href="#" style="font-size:25px;">Terms and Conditions</a><br>
					<input type="hidden" value="<?php echo $selected_product ?>" name="product_id">
					<input type="hidden" value="<?php echo $quantity ?>" name="qty">
                <br>
                 <center>
                    <input type="submit" name="submit" value="Proceed to Checkout &rsaquo;" style="color:white;background: linear-gradient(#666666, #000000);border: 1px solid white;border-radius: 6px;padding:8px;">
                </center>
            </form>
			</div>
			<div class="short_product" style="float:left;">
			
			<p style="">Selected Product : </p><br>
				<?php
					//echo $selected_product."<br>";
					$product=find_product_by_id($selected_product);
					$picture=$product["picture"];
				?>
				<img src="images/<?php echo $picture ?>" style="border:1px solid;border-radius:6px;width:180px;height:200px;">
				<?php
					echo "<br>".$product["name"]."<br>";
					echo "<br>Price : &#x20B9;".$product["price"]."<br>";
					echo "Quantity : ".$quantity."<br>";
					echo "Total Price : &#x20B9;".$product["price"]*$quantity."<br>";
				?>
				
				<br>
			</div>
        </div>
		<br>
            <div id="footer">
                <ul class="">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="sitemap.php">SiteMap</a></li>
                    <li><a href="aboutus.php">AboutUs</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                    <li><a href="contactus.php">ContactUs</a></li>
                    <li><a href="privacy_policy.php">PrivacyPolicy</a></li>
                </ul>
                <p style="text-align:center;color:white;">Copyright &copy; 2016 PharmaSite</p>
            </div>
            

    </div> 
</body>
</html>
