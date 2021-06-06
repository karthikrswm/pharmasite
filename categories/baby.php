<?php require_once("../session.php"); ?>
<?php require_once("../db_connection.php"); ?>
<?php require_once("../functions.php"); ?>
<html>
<head>
    <title>BABY & MOTHER</title>
    <link rel="shortcut icon" href="../images/ps-icon.png" type="image/type here" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/ex_ss.css" type="text/css" rel="stylesheet" />


    <style>
        .content {
            padding: 0px 5px 50px 50px;
        }

        .content p
        {
			font-family:Segoe UI Light;
            font-size:22px;
			font-weight:bold;
        }
    </style>

</head>
<body>
    <div class="container">
        <div id="header">
            <a href="../index.php">
                <img src="../images/ps.png" id="logo" />
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
                        <a href="../view_profile.php" style="margin-right:5px;-webkit-transition: 0.1s 0.1s;">My Account &#9759;</a>
                        <ul>
                            <li> <a href="../view_profile.php">View Profile</a> </li>
                            <li> <a href="../settings.php">Settings</a> </li>
                            <li> <a href="../help.php">Help Center</a> </li>
                            <li> <a href="../logout.php">Log Out</a> </li>
                        </ul>
                    </li>
					</ul>
				</div>
			<?php } else { ?>
                <a href="../signup.php" class="button1" style="margin-right:5px;-webkit-transition: 0.1s 0.1s;">Sign up</a>
				<a href="../login.php" class="button2" style="margin-left:5px;-webkit-transition: 0.1s 0.1s;">Login &rsaquo;</a>
			<?php } ?>
            </div>
        </div>


        <div id="menutop">
            <ul id="drop-nav">
                

                <li>
                    <a href="otc.php">OTC</a>
                    <ul>
                        <li> <a href="otc.php#fa">First Aid</a> </li>
                        <li> <a href="otc.php#hc">Health Care</a> </li>
                        <li> <a href="otc.php#mc">Mens Care</a> </li>
                        <li> <a href="otc.php#wc">Womens Care</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="diabetes.php">DIABETES</a>
                    <ul>
                        <li> <a href="diabetes.php#fb">Food & Beverages</a> </li>
                        <li> <a href="diabetes.php#ns">Nutrition & Supplements</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="baby.php">BABY</a>
                    <ul>
                        <li> <a href="baby.php#bi">Baby & Infant</a> </li>
                        <li> <a href="baby.php#mmc">Maternity & Mother Care</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="personal.php">PERSONAL</a>
                    <ul>
                        <li> <a href="personal.php#bc">Body Care</a> </li>
                        <li> <a href="personal.php#cs">Cosmetics</a> </li>
                        <li> <a href="personal.php#ec">Eye Care</a> </li>
                        <li> <a href="personal.php#fk">Facial Kit</a> </li>
                        <li> <a href="personal.php#hc">Hair Care</a> </li>
                        <li> <a href="personal.php#lc">Lip Care</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="wellness.php">WELLNESS</a>
                    <ul>
                        <li> <a href="wellness.php#ft">Fitness</a> </li>
                        <li> <a href="wellness.php#hme">Health Monitor & Equipments</a> </li>
                        <li> <a href="wellness.php#sca">Senior Care & Aids</a> </li>
                        <li> <a href="wellness.php#ss">Supplements</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="household.php">HOUSEHOLD</a>
                    <ul>
                        <li> <a href="household.php#bfc">Break Fast Cereals</a> </li>
                        <li> <a href="household.php#hc">Home Care</a> </li>
                        <li> <a href="household.php#sl">Speciality</a> </li>
                    </ul>
                </li>
						<li> <a href="../all_products.php">ALL PRODUCTS</a> </li>				
            </ul>
        </div>


        <div class="content">
            <p style="color:#000;font-family:Segoe UI Light;font-size:3em;text-align:center;">
                Baby and Mother
            </p>

			<p>
            <br /><a name="bi">Baby & Infant</a><br />
  		<table align="center">
			
			<?php 
				$i=1;
				$product_set = find_products_by_category_subcategory("baby","bi");
				while($product = mysqli_fetch_assoc($product_set))
				{	if($i%4==0) echo "<tr>";
			?>
			        <td>
                        <div class="product">
                        <a href="../view_product.php?product_id=<?php echo $product["id"] ?>" target="_parent">
                            <img src="../images/<?php echo $product["picture"] ?>" >
						</a>
                            <div class="caption">
                                <h2><a href="../view_product.php?product_id=<?php echo $product["id"] ?>" target="_parent"><?php echo $product["name"] ?> </a></h2>
                                <p align="center">
                                    <a class="button4">&#x20B9; <?php echo $product["price"] ?></a> &nbsp;
                                    <a href="../view_product.php?product_id=<?php echo $product["id"] ?>" class="button1" target="_parent">BUY NOW</a>
                                </p>
                            </div>
                        </div>
                    </td>
			<?php 
			if($i%3==0) echo "</tr>"; $i++;	}
			?>

                
         </table>
            <br /><a name="mmc">Maternity & Mother Care</a><br />
   		<table align="center">
			
			<?php 
				$i=1;
				$product_set = find_products_by_category_subcategory("baby","mmc");
				while($product = mysqli_fetch_assoc($product_set))
				{	if($i%4==0) echo "<tr>";
			?>
			        <td>
                        <div class="product">
                        <a href="../view_product.php?product_id=<?php echo $product["id"] ?>" target="_parent">
                            <img src="../images/<?php echo $product["picture"] ?>" >
						</a>
                            <div class="caption">
                                <h2><a href="../view_product.php?product_id=<?php echo $product["id"] ?>" target="_parent"><?php echo $product["name"] ?> </a></h2>
                                <p align="center">
                                    <a class="button4">&#x20B9; <?php echo $product["price"] ?></a> &nbsp;
                                    <a href="../view_product.php?product_id=<?php echo $product["id"] ?>" class="button1" target="_parent">BUY NOW</a>
                                </p>
                            </div>
                        </div>
                    </td>
			<?php 
			if($i%3==0) echo "</tr>"; $i++;	}
			?>

                
         </table>
			</p>
  </div>

        <div id="footer">
            <ul class="">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../sitemap.php">SiteMap</a></li>
                <li><a href="../aboutus.php">AboutUs</a></li>
                <li><a href="../feedback.php">Feedback</a></li>
                <li><a href="../contactus.php">ContactUs</a></li>
                <li><a href="../privacy_policy.php">PrivacyPolicy</a></li>
            </ul>
            <p style="text-align:center;color:white;">Copyright &copy; 2016 PharmaSite</p>
        </div>


    </div>

</body>
</html>