<?php require_once("session.php"); ?>
<?php require_once("db_connection.php"); ?>
<?php require_once("functions.php"); ?>

<?php
if (isset($_POST['signup'])) 
{

  if (empty($errors)) 
{
    // Perform Create
  $fname= mysql_prep($_POST["fname"]);
  $lname= mysql_prep($_POST["lname"]);
  $email = mysql_prep($_POST["email"]);
  $username = mysql_prep($_POST["username"]);
  $hashed_password = password_encrypt($_POST["password"]);
  
  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
  {
         $_SESSION["message"] = "Invlaid Email!!!!";
         redirect_to("signup.php");
  }
  
  $query  = "SELECT * ";
  $query .= "FROM users ";
  $query .= "WHERE username = '{$username}' OR email = '{$email}' ";
  $query .= "LIMIT 1";
  $user_set = mysqli_query($connection, $query);
  confirm_query($user_set);
  if($user = mysqli_fetch_assoc($user_set)) 
  {
	//check for existing username
        if($user["username"]==$username) 
        {
               $_SESSION["message"] = "Username already exists!!!!";
               redirect_to("signup.php");
        }
	//check for existing email
        if($user["email"]==$email) 
        {
             $_SESSION["message"] = "Email already exists!!!!";
             redirect_to("signup.php");
        }
   } 
   else { //return null; }    



   $query  = "INSERT INTO users (";
   $query .= "  fname,lname,email,username,password ";
   $query .= ") VALUES (";
   $query .= " '{$fname}','{$lname}', '{$email}', '{$username}', '{$hashed_password}'";
   $query .= ")";
   $result = mysqli_query($connection, $query);

   if ($result) 
   {
      // Success
      /*$to = $email;
      $subject = "Account Confirmation";
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $message = "<p style=\"color:#6699FF;font-size:25px;font-family:gabriola;\">";
      $message.= "Account created succesflully!!!";
      $message.="<br>";
      $message.=  "Welcome to Local Cricketing Messenger";
      $message.="<br>";
      $message.= "Your username is : ".$username;
      //$message.= "<br>"."Your password is : ".$password;
      $message.= " </p>";
      mail($to, $subject, $message,$headers);*/
      $_SESSION["message"] = "Account created succesflully!!!  Welcome to Pharmasite! ";
      redirect_to("login.php");
   } 
   else 
   {
      // Failure
      $_SESSION["message"] = "Account creation failed!!!!! Please try again.";
         redirect_to("signup.php");
    }
  }
} 
}
else 
{
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>


<html>
<head>
    <title>PharmaSite | Sign Up</title>
    <link rel="shortcut icon" href="images/ps-icon.png" type="image/type here" />
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/ex_ss.css" type="text/css" rel="stylesheet" />
    <script src="js/jsfile.js"></script>

    <style>

        .content
        {
            background:url("images/medical-vector-template_23-2147490477.jpg");
            background-repeat: no-repeat;
		    //background-attachment:fixed;
            background-size: cover;
            //text-align:center;
            box-shadow: 0 0 10px 5px rgba(0,0,0,0.6); 
            height:700px;
            width:900px;
            margin:0px auto 50px auto;
            padding-top:100px;
            //padding-left:70px;
        }

        .content form
        {
            margin:0px 285px 0px 270px;
            font-size:33px;
            text-align:left;
            font-variant:small-caps;
            font-weight:bold;
            font-family:Segoe UI Light;
        }

       .content form input
        {
            font-size:25px;
            font-family:Segoe UI Light;
        }

       .content form input:focus    
        {    
            border: solid 2px black;  
            color:green;                   
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
                <a href="login.php" class="button2" style="margin-left:5px;-webkit-transition: 0.1s 0.1s;">Login &rsaquo;</a>
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
            Sign Up
        </p>
		
        <div class="content" align="center">
		<?php echo message(); ?>
		<?php if(logged_in()) {  echo "<p style=\"color:black;font-family:Georgia;font-variant:small-caps;font-size:25px;\">Logged in as : <b><i>".$_SESSION["username"]."</i></b></p>"; }?>
            <form action="signup.php" method="post" onsubmit="return validate();">
                <fieldset>
                    <legend>Name :</legend>
                    <input type="text" name="fname" placeholder="First Name" id="fname_jsid" autofocus><br />
                    <input type="text" name="lname" placeholder="Last Name" id="lname_jsid"><br>
                </fieldset>
                <br>
                <fieldset>
                    <legend>Email :</legend>
                    <input type="text" name="email" placeholder="Email" id="email_jsid"><br />
                    <input type="text" name="username" placeholder="Username" id="username_jsid"><br>
                </fieldset>
                <br>
                <fieldset>
                    <legend>Password :</legend>
                    <input type="password" name="password" placeholder="Password" id="password_jsid"><br />
                    <input type="password" placeholder="Confirm Password" id="confirm_password_jsid"><br>
                </fieldset>
                <br />
                 <center>
                    <input type="submit" name="signup" value="Sign Up &rsaquo;" style="color:white;background: linear-gradient(#666666, #000000);border: 1px solid white;border-radius: 6px;padding:8px;">
                </center>
            </form>
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
