<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("db_connection.php"); ?>
<html>
<head>
    <title>PharmaSite | About Us</title>
    <link rel="shortcut icon" href="images/ps-icon.png" type="image/type here" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/ex_ss.css" type="text/css" rel="stylesheet" />
    <script src="js/jsfile.js"></script>

    <style>
        .content {
            padding: 50px;

        }
        .content img
        {
            width:250px;
			height:280px;
			border-radius:50% 50% 50% 50%;
            margin:50px;
        }

        .content img:hover
        {
            box-shadow: 0 0 5px 5px rgba(0,0,0,0.6);
        }

        .content p
        {
            font-family:Segoe UI Light;
            font-size:25px;
        }
		
		table tr td p
		{
			margin:0px 95px 0px 95px;
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


        

        <div class="content" align="center">

            <span style="color:black;font-family:Segoe UI Light;font-size:27px;"><b>Our Team</b></span><br>

            <a href=""><img src="images/varun.jpg" /></a>
			<a href=""><img src="images/abhishek.jpg" /></a>
            <a href=""><img src="images/karthik.jpg" /></a>
			<br>
		
            <table border="0">
                <tr>
					<td><p>Varun A N </p></td>  
                    <td><p>Abhishek Somashekar</p></td>     
                    <td><p>Karthik R Swamy </p></td>
                  </tr>  
            </table>
            <br />
			<br><br>
			<span style="color:black;font-family:Segoe UI Light;font-size:27px;"><b>About Pharmasite</b></span><br>
			
			<p>
				PharmaSite is one of India's most trusted pharmacies, with over 100 years of experience in dispensing quality medicines. At PharmaSite, we help you look after your own health effortlessly as well as take care of loved ones wherever they may reside in India. You can buy and send medicines from any corner of the country - with just a few clicks of the mouse. 
			</p>
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
