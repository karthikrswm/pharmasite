<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("db_connection.php"); ?>
<?php confirm_logged_in(); ?>


<html>
<head>
    <title>PharmaSite | My Account</title>
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
            //height:900px;
            width:900px;
            margin:0px auto;
			font-size:25px;
            font-family:Segoe UI Light;
        }

		hr
		{
			background-color:black;
			height:1px;
		}
		
		.ordered_products
		{
			box-shadow: 0 0 5px 2px rgba(0,0,0,0.6);
			height:210px;
			padding:25px;
			background:#cccccc;
			font-weight:bold;
			margin-bottom:40px;
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
            My Account
        </p>
		
        <div class="content" >
		<?php 
			echo "<center>"; 
			echo message(); 
			echo "</center><br>";
		?>
			<span style="color:black;font-family:Segoe UI Light;font-size:27px;"><b>My Profile</b></span>
			<br><hr><br>
			<?php
				$user=find_user_by_username($_SESSION["username"]);
			?>
		<table style="font-size:25px;" cellspacing="10px">
			<tr>
				 <td><b>Name </b></td>
				 <td>: <?php echo $user["fname"]." ".$user["lname"]; ?></td>
			</tr>
			<tr>
				 <td><b>Username </b></td>
				 <td>: <?php echo $_SESSION["username"]; ?> </td>
			</tr>
			<tr>
				 <td><b>Email </b></td>
				 <td>: <?php echo $user["email"]; ?></td>
			</tr>
			<tr>
				 <td><b>Delivery Address </b></td>
				 <td>: <?php echo $user["address"];?></td>
			</tr>
			<tr>
				 <td><b>Contact Number </b></td>
				 <td>: <?php echo $user["mobile"];?></td>
			</tr>
		 </table>
			
			<br><br>
			<span style="color:black;font-family:Segoe UI Light;font-size:27px;" id="my_orders"><b>My Orders</b></span>
			<br><hr><br>
			<?php
				$order_set = find_orders_by_user_id($_SESSION["user_id"]);
				$flag=0;
				while($order = mysqli_fetch_assoc($order_set))
				{	
					$flag=1;
					$product_id=$order["product_id"];
					$product=find_product_by_id($product_id);
					$picture=$product["picture"];
					$quantity=$order["quantity"];
			?>
			
		<div class="ordered_products">
				<a href="view_product.php?product_id=<?php echo $product_id ?>">
				<img src="images/<?php echo $picture ?>" style="float:left;margin-right:50px;border:1px solid;border-radius:6px;width:180px;height:200px;">
				</a>
				<?php 
					echo $product["name"]."<br>";
					echo "Quantity : ".$quantity." no.s <br>";
					//echo "Ordered on : ".$order["tim_stp"]."";
					$datetime = explode(" ",$order["tim_stp"]);
					 $date= $datetime[0];
					 $date1=date('jS F, Y', strtotime($date));
					 $time = $datetime[1];
					 $time1=date("g:i a", strtotime("$time"));
					 echo "Ordered on : ".$time1." ".$date1;
				?>
				<div style="float:right">
				<?php
					echo "<br>Price : &#x20B9;".$order["price"]."<br>";
					echo "Total Price : &#x20B9;".$order["total_price"]."<br>";
					if($order["delivery_status"]==0) echo "<br><span style=\"color:red;\">Not yet Delivered</span>";
					if($order["delivery_status"]==1) echo "<br><span style=\"color:green;\">Delivered Successfully</span>"; 
				?>
				</div>
			
		</div>
		<?php 
				}
				if ($flag==0) echo "<p align=\"center\"> No orders yet</p>";
			?>
			
					
		<span style="color:black;font-family:Segoe UI Light;font-size:27px;" id="my_prescriptions"><b>My Prescriptions</b></span>
		<br><hr><br>
		<?php
			$query  = "SELECT * ";
			$query .= "FROM prescriptions ";
			$query .= "WHERE user_id = {$_SESSION["user_id"]} ";
			$pre_set = mysqli_query($connection, $query);
			confirm_query($pre_set);
			$i=1;
			$flag1=0;
			while($pre= mysqli_fetch_assoc($pre_set))
			{
				$flag1=1;
				echo "PRESCRIPTION ".$i."<br>";
				$datetime = explode(" ",$pre["tim_stp"]);
					 $date= $datetime[0];
					 $date1=date('jS F, Y', strtotime($date));
					 $time = $datetime[1];
					 $time1=date("g:i a", strtotime("$time"));
					 echo "Ordered on : ".$time1." ".$date1;
				echo "<br><br>";
		?>	
			<img src="images/uploaded_prescriptions/<?php echo $pre["prescription_name"] ?>" style="border:1px solid;border-radius:6px;width:180px;height:200px;">
			<br><br><br>
		
		<?php 
			$i++;	}
				if ($flag1==0) echo "<p align=\"center\"> No prescriptions yet</p>";
		?>
		
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
