<?php require_once("session.php"); ?>
<?php require_once("db_connection.php"); ?>
<?php require_once("functions.php"); ?>

<?php

if (isset($_POST['login'])) {
  // Process the form
  
  // validations
  //$required_fields = array("username", "password");
  //validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$found_user = attempt_login($username, $password);

    if ($found_user) {
      // Success
      // Mark user as logged in

    $_SESSION["user_id"] = $found_user["id"];
    $_SESSION["username"] = $found_user["username"];

      redirect_to("index.php");
    } else {
      //echo "failre";
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  //$_SESSION["message"] = " This is probably a GET request";
  
} // end: if (isset($_POST['submit']))

?>

<html>
<head>
    <title>PharmaSite | Login</title>
    <link rel="shortcut icon" href="images/ps-icon.png" type="image/type here" />
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/ex_ss.css" type="text/css" rel="stylesheet" />
    <script src="js/jsfile.js"></script>

    <style>
        .content 
        {
            background: url("images/health.jpg");
            background-repeat: no-repeat;
            //background-attachment:fixed;
            background-size: cover;
            //text-align:center;
            box-shadow: 0 0 10px 5px rgba(0,0,0,0.6);
            height: 500px;
            width: 900px;
            margin: 0px auto 50px auto;
            padding-top: 100px;
            //padding-left:70px;
        }

        .content form 
        {
            margin: 0px 270px 0px 270px;
            font-size: 33px;
            text-align: left;
            font-variant: small-caps;
            font-weight: bold;
            font-family: Segoe UI Light;
        }

        .content form input 
        {
             font-size: 25px;
             font-family: Segoe UI Light;
        }

        .content form input:focus 
        {
             border: solid 2px black;
             //color: green;
        }

        .content a
        {
            font-size: 18px;
            font-family: Arial;
            font-variant: normal;
            color:black;
        }
    </style>

	
	<script>
var captcha;
 
function generateCaptcha() {
    var a = Math.floor((Math.random() * 10));
    var b = Math.floor((Math.random() * 10));
    var c = Math.floor((Math.random() * 10));
    var d = Math.floor((Math.random() * 10));
 
    captcha=a.toString()+b.toString()+c.toString()+d.toString();
    
    document.getElementById("captcha").value = captcha;
}

</script>




</head>
<body onload="generateCaptcha();">
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

        <p style="color:#000;font-family:Segoe UI Light;font-size:3em;text-align:center;">
            Login
        </p>

        <div class="content" align="center">
		<?php echo message(); ?>
		<?php if(logged_in()) {  echo "<p style=\"color:black;font-family:Georgia;font-variant:small-caps;font-size:25px;\">Logged in as : <b><i>".$_SESSION["username"]."</i></b></p>"; }?>
            <form action="" method="post" onsubmit="return validate_login();">
                <fieldset>
                    <legend align="center">Enter Credentials :</legend><br>
                    <input type="text" name="username" placeholder="Username" id="un_jsid" autofocus><br />
                    <input type="password" name="password" placeholder="Password" id="pwd_jsid"><br>
					
					<input type="text" id="inputText" placeholder="Captcha"/><br/>
					Captcha &nbsp; : &nbsp;<input type="text" id="captcha" disabled style="width:70px;text-align:center;"/><br/>
					<input type="button" onclick="generateCaptcha()" class="button5" value="Refresh" style="font-size:15px;">
					<!--button onclick="">Submit</button><br-->
					&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Forgot password ?</a><br />
                </fieldset>
                <br>
                 <center>
                    <input type="submit" name="login" value="Login &rsaquo;" style="color:white;font-size:25px;background: linear-gradient(#666666, #000000);border: 1px solid white;border-radius: 6px;padding:8px;">
                </center>
            </form>
            <br />
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
