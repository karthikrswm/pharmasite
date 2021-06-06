<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("db_connection.php"); ?>
<?php 
if(!logged_in()) $_SESSION["message"] = "Please login to place the order";
confirm_logged_in(); ?>

<?php
		if(isset($_POST["submit"]))
		{
			$product=find_product_by_id($_POST["product_id"]);
			$quantity=$_POST["qty"];
			$price=$product["price"];
			$total_price=$price*$_POST['qty'];
			$fname=$_POST["fname"];
			$lname=$_POST["lname"];
			$email=$_POST["email"];
			$mobile=$_POST["mobile"];
			$address=$_POST["address"];	
			$pincode=$_POST["pincode"];
			$city=$_POST["city"];
			$state=$_POST["state"];
			
			$query  = "UPDATE users SET ";
			$query .= "mobile = '{$mobile}' ";
			$query .= "WHERE username = '{$_SESSION["username"]}' ";
			$query .= "LIMIT 1";
			$result1 = mysqli_query($connection, $query);
			$query  = "UPDATE users SET ";
			$query .= "address = '{$address}' ";
			$query .= "WHERE username = '{$_SESSION["username"]}' ";
			$query .= "LIMIT 1";
			$result2 = mysqli_query($connection, $query);
			
			//echo "hello";
			
			$query  = "INSERT INTO orders (";
		    $query .= " product_id,price,quantity,total_price,user_id,username,fname,lname,mobile,email,address,pincode,city,state ";
		    $query .= ") VALUES (";
			$query .= " {$_POST['product_id']},{$price},{$_POST['qty']},{$total_price},{$_SESSION["user_id"]},'{$_SESSION["username"]}','{$fname}','{$lname}','{$mobile}','{$email}','{$address}',{$_POST['pincode']},'{$_POST['city']}','{$_POST['state']}' ";
		    $query .= ")";
		    $result3 = mysqli_query($connection, $query);
			
			//redirect_to("confirm_order.php");
			
			if(!($result1 && $result2 && $result3)) $_SESSION["message"] = "Order Unsuccessful!!! Please try again.";
		}
		
		else
		{
			redirect_to("index.php");
		}
		

?>

<html>
<head>
    <title>PharmaSite | Checkout</title>
    <link rel="shortcut icon" href="images/ps-icon.png" type="image/type here" />
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/ex_ss.css" type="text/css" rel="stylesheet" />

    <style>

        .content
        {

            box-shadow: 0 0 10px 5px rgba(0,0,0,0.6); 
			padding:50px;
            height:900px;
            width:900px;
            margin:0px auto;
			font-size:25px;
            font-family:Segoe UI Light;
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
            Checkout
        </p>
		
        <div class="content" >
		<?php echo message(); ?>
		<p>Congargulations !! Your order for <?php echo $quantity; ?> no.s of <b><i><?php echo $product["name"]; ?></i></b> has been successfully placed.You can track your product at <b>"My Orders"</b> page.</p>
		 <img src="images/<?php echo $product["picture"]; ?>" style="border:1px solid;border-radius:6px;width:180px;height:200px;">
		 <br><br>
		 <table style="font-size:25px;" cellspacing="10px">
			<tr>
				 <td><b>Item Price </b></td>
				 <td>: &#x20B9; <?php echo $product["price"]; ?></td>
			</tr>
			<tr>
				 <td><b>Quantity </b></td>
				 <td>: <?php echo $quantity; ?> no.s</td>
			</tr>
			<tr>
				 <td><b>Total Price </b></td>
				 <td>: &#x20B9; <?php echo $total_price; ?></td>
			</tr>
			<tr>
				 <td><b>Delivery Address </b></td>
				 <td>: <?php echo $address;?></td>
			</tr>
			<tr>
				<td> </td>
				 <td> <?php echo "&nbsp;&nbsp;".$pincode."<br>&nbsp;&nbsp;".$city."<br>&nbsp;&nbsp;".$state; ?></td>
			</tr>
			<tr>
				 <td><b>Contact Number </b></td>
				 <td>: <?php echo $mobile;?></td>
			</tr>
			<tr>
				 <td><b>Payment Method </b></td>
				 <td>: Cash On Delivery</td>
			</tr>
		 </table>
		 <br>
		 <p align="center">
			 <a href="view_profile.php#my_orders" class="button2">My Orders</a>
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <a href="index.php" class="button1">Continue Shopping</a>
		 </p>
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
