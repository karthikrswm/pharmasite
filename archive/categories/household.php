<?php require_once("../session.php"); ?>
<?php require_once("../db_connection.php"); ?>
<?php require_once("../functions.php"); ?>
<html>
<head>
    <title>HOUSEHOLD</title>
    <link rel="shortcut icon" href="../images/ps-icon.png" type="image/type here" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../css/ex_ss.css" type="text/css" rel="stylesheet" />


    <style>
 .content
        {
            padding:0px 5px 50px 50px;

        }

        .content a
        {
            color:cornflowerblue;
            font-size:30px;
            font-family:Segoe UI Light;
        }
                
        .content a:hover
        {
            color:cadetblue;
            text-decoration:underline;
        }
        .content p
        {
            font-size:22px;
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
                    <a href="prescriptions.php">PRESCRIPTIONS</a>
                    <ul>
                        <li> <a href="prescriptions.php#medi">Medications</a> </li>
                        <li> <a href="prescriptions.php#all">Allergies</a> </li>
                        <li> <a href="prescriptions.php#pain">Pain Relievers</a> </li>
                        <li> <a href="prescriptions.php#adep">Anti-Depressants</a> </li>
                        <li> <a href="prescriptions.php#aim">Anti-Itch Medications</a> </li>
                        <li> <a href="prescriptions.php#atb">Anti-Tuberculosis (Tb) Medications</a> </li>
                        <li> <a href="prescriptions.php#ab">Antibiotics</a> </li>
                        <li> <a href="prescriptions.php#am">Asthma Medications</a> </li>
                        <li> <a href="prescriptions.php#cfm">Cold & Flu Medications</a> </li>
                        <li> <a href="prescriptions.php#sd">Skin Diseases</a> </li>
                        <li> <a href="prescriptions.php#wl">Weight Loss/Obesity Medications</a> </li>
                        <li> <a href="prescriptions.php#wn">Womens Need</a> </li>
                    </ul>
                </li>

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
                        <li> <a href="wellness.php#bha">Brace & Health Aids</a> </li>
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
                Household
            </p>


            <br /><a name="bfc">Break Fast Cereals</a><br />
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

            <br /><a name="hc">Home Care</a><br />
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

            <br /><a name="sl">Speciality</a><br />
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

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



    <script src="../js/jquery-2.2.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>