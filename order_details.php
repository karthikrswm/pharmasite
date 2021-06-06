<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("db_connection.php"); ?>
<?php 
if(!logged_in()) $_SESSION["message"] = "Please login to place the order";
confirm_logged_in(); ?>

<?php
		if(isset($_POST["product_id"]) && isset($_POST["qty"]))
		{
			$selected_product = $_POST["product_id"];
			$quantity=$_POST["qty"];
		}
		
		else if (isset($_POST["product_id"])) 
        {
		$selected_product = $_POST["product_id"];
		$quantity=1;
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
			font-size:25px;
			font-variant:small-caps;
			font-weight:bold;
			font-family:Segoe UI Light;
        }

		.content form a,input
		{
			font-size:25px;
			margin:10px;
		}
		
		.pricing
		{

			float:right;
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
            Order Details
        </p>
		
        <div class="content" >
		<?php echo message(); ?>
		<div style="box-shadow: 0 0 5px 2px rgba(0,0,0,0.6);height:210px;padding:25px;background:#cccccc;">
				<?php
					$product=find_product_by_id($selected_product);
					$picture=$product["picture"];
				?>
				<img src="images/<?php echo $picture ?>" style="float:left;margin-right:50px;border:1px solid;border-radius:6px;width:180px;height:200px;">
				<?php 
					echo $product["name"]."<br>";
					echo "Quantity : ".$quantity." no.s <br>";
				?>
				<div class="pricing">
				<?php
					echo "<br>Price : &#x20B9;".$product["price"]."<br>";
					
					echo "Total Price : &#x20B9;".$product["price"]*$quantity."<br>";
				?>
				</div>
				
		</div>
		<form align="right" method="post" action="buy_now.php">
			<input type="hidden" name="qty" value="<?php echo $quantity ?>" >
			<input type="hidden" name="product_id" value="<?php echo $selected_product ?>" >
			<a href="index.php" class="button5" onclick="return confirm('Are you sure you want to cancel the order?');"> Cancel </a>
			<input type="submit" name="confirm" class="button1" value="Confirm Order">
		</form>
		<p>*Note : The only delivery option avilable currently is <b><i>"Cash On Delivery"</i></b></p>
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
