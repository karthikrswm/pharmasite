<?php require_once("session.php"); ?>
<?php require_once("db_connection.php"); ?>
<?php require_once("functions.php"); ?>
<html>
<head>
    <title>PharmaSite | Online Pharmacy</title>
    <link rel="shortcut icon" href="images/ps-icon.png" type="image/type here" />
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/ex_ss.css" type="text/css" rel="stylesheet" />


    <style>

        .content1
        {
            background:url("images/logo - Copy.jpg");
            padding:30px;
            margin:15px;
            border-radius:6px;
            height:250px;
        }

        .content2
        {
            width:100%;
            //height:500px;
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
            <?php
			if(logged_in())
			{ echo "<span style=\"font-family:Segoe UI Light;font-weight:bold;padding:0px 0px 0px 20px;font-size:20px;\">Hi, ".$_SESSION["username"]."</span><br>"; ?>
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


        <div class="content1">
                <div style="border-right:solid;border-color:white;border-width:1px;float:left;width:65%;">
                    <p style="color:#E6E6E6;font-family:Segoe UI Light;font-size:2.5em;"> Search in the ocean of products available on PharmaSite</p>
                    <form>
                            <div class="search">
                                <input type="text" placeholder="Search for your product.." style="font-size:25px;"/> |
                                <select style="font-size:25px;">
                                    <option value="all">In All Categories</option>
                                    <option value="p">Prescription</option>
                                    <option value="nonp">Non-Prescription</option>
                                </select>
                            </div>
                            
                                <div style="float:right;">
                                    <input type="submit" class="button3" name="search" value="Search" />
                                </div>
                    </form>
                </div>
                <div style="text-align:center;float:right;width:30%">
                    <br /><p style="color:#E6E6E6;font-family:Segoe UI Light;font-size:2.5em;"> Upload Prescription</p>
                    <br /><a href="#" class="button3">Upload</a>
                </div>
        </div>

        <h1 align="center" style="font-variant:small-caps;font-family:Georgia;">Top Viewed Products</h1><br />

        <div class="content2">
            <table>
                <tr>
                    <td>
                        <div class="product">
                            <img src="images/boost.jpg" alt="...">
                            <div class="caption">
                                <h2><a href="view_product.php?product_id=1">BOOST 500G </a></h2>
                                <p align="center">
                                    <a class="button4">&#x20B9; 204.25</a> &nbsp;
                                    <a href="buy_now.php?product_id=1" class="button1">Buy Now</a>
                                </p>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="product">
                            <img src="images/nestle_lactogen_2_400g_box.jpg" alt="...">
                            <div class="caption">
                                <h2> <a href="#"> NESTLE LACTOGEN </a> </h2>
                                <p align="center">
                                    <a class="button4">&#x20B9; 278.00</a> &nbsp;
                                    <a href="#" class="button1">Buy Now</a>
                                </p>
                            </div>
                        </div>
                    </td>
                    <!-- When in sm mode the 3rd column jumps up below the 2nd column. To fix it put the following right before the column that messes up using the screen mode being sm that messes up.
              <div class="clearfix visible-sm"></div>
            -->
                    <td>
                        <div class="product">
                            <img src="images/pediasure_complete_and_balance.jpg" alt="...">
                            <div class="caption">
                                <h2> <a href="#"> PEDIASURE </a> </h2>
                                <p align="center">
                                    <a class="button4">&#x20B9; 1092.50</a> &nbsp;
                                    <a href="#" class="button1">Buy Now</a>
                                </p>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="product">
                            <img src="images/dabur_honey.jpg" alt="...">
                            <div class="caption">
                                <h2> <a href="#"> DABUR HONEY </a></h2>
                                <p align="center">
                                    <a class="button4">&#x20B9; 56.05</a> &nbsp;
                                    <a href="#" class="button1">Buy Now</a>
                                </p>
                            </div>
                        </div>
                    </td>
                </tr>
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
