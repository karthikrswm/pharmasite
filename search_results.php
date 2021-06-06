<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("db_connection.php"); ?>

<?php 
	/*if(!logged_in()) $_SESSION["message"] = "Please login to search.";
	confirm_logged_in(); */
?>

<?php
	if(isset($_GET["search"]))
	{
		$search_text = $_GET["search_text"];
		$category = $_GET["category"];

	    $query  = "SELECT * ";
		$query .= "FROM products ";
		if($category == "all")
		{
			$query .= "WHERE name LIKE '%{$search_text}%' ";
		}
		else if($category=="non_prescriptions")
		{	
			$query .= "WHERE category != 'prescriptions' ";
			$query .= "AND name LIKE '%{$search_text}%' ";
		}
		else
		{	
			$query .= "WHERE category = '{$category}' ";
			$query .= "AND name LIKE '%{$search_text}%' ";
		}

		$product_set = mysqli_query($connection, $query);
		confirm_query($product_set);
	}
	?>

<html>
<head>
    <title>PharmaSite | Search Results</title>
    <link rel="shortcut icon" href="images/ps-icon.png" type="image/type here" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/ex_ss.css" type="text/css" rel="stylesheet" />
	<script src="js/jsfile.js"></script>

    <style>
        .content 
		{
			box-shadow: 0 0 10px 5px rgba(0,0,0,0.6);
            margin:30px 100px 100px 100px;
            font-size:35px;
            font-family:Segoe UI Light;
        }

		input{  
    background: url("http://png.findicons.com/files/icons/1389/g5_system/32/toolbar_find.png") top right no-repeat;
    height:40px;
    padding-right:30px;
}
    </style>

</head>
<body>
    <div class="container">
        <div id="header">
            <a href="index.php">
                <img src="images/ps.png" id="logo" />
            </a>
            <br />
            <span style="color:black;font-family:Segoe UI Light;font-size:27px;"><b>One Stop Shop For All The Medicines</b></span>
			<div style="float:right;">
			<?php
			if(logged_in())
			{ ?>
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
			<?php } else { ?>
                <a href="signup.php" class="button1" style="margin-right:5px;-webkit-transition: 0.1s 0.1s;">Sign up</a>
				<a href="login.php" class="button2" style="margin-left:5px;-webkit-transition: 0.1s 0.1s;">Login &rsaquo;</a>
			<?php } ?>
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
			
		<center>
        <span style="color:#000;font-family:Segoe UI Light;font-size:3em;text-align:center;">
           Search Results
        </span>
		<!--form method="get" action="search_results.php" style="margin-right:20px;" align="right">
				 <input type="text" name="search_text" placeholder="Search for your product.." style="font-size:25px;font-family:Segoe UI Light;"/>
			</form-->
		</center>

        <div class="content">
			<?php echo message();echo "<br>"; ?>

			<table align="center">
			
			<?php 
				$i=0;
				$flag=0;
				while($product = mysqli_fetch_assoc($product_set))
				{	
					if($i%3==0) echo "<tr>";
					$flag=1;
			?>
			        <td>
                        <div class="product">
                         <a href="view_product.php?product_id=<?php echo $product["id"] ?>">
                            <img src="images/<?php echo $product["picture"] ?>" >
						</a>
                            <div class="caption">
                                <h2><a href="view_product.php?product_id=<?php echo $product["id"] ?>" target="_parent"><?php echo $product["name"] ?> </a></h2>
                                <p align="center">
                                    <a class="button4">&#x20B9; <?php echo $product["price"] ?></a> &nbsp;
                                    <a href="view_product.php?product_id=<?php echo $product["id"] ?>" class="button1">BUY NOW</a>
                                </p>
                            </div>
                        </div>
                    </td>
			<?php 
			if(($i+4)%3==0) echo "</tr>"; $i++;	}
			if ($flag==0) echo "<p align=\"center\"> 0 Results</p>";
			?>

                
         </table>

        </div>

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
