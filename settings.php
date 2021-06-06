<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("db_connection.php"); ?>
<?php 
if(!logged_in()) $_SESSION["message"] = "Please login to update your preferences";
confirm_logged_in(); ?>


<?php
if (isset($_POST['update'])) 
{
  $fname= mysql_prep($_POST["fname"]);
  $lname= mysql_prep($_POST["lname"]);
  $email = mysql_prep($_POST["email"]);
  $cur_hashed_password = password_encrypt($_POST["cur_password"]);
  $hashed_password = password_encrypt($_POST["new_password"]);
  $mobile= mysql_prep($_POST["mobile"]);
  $address= mysql_prep($_POST["address"]);

  $me=find_user_by_id($_SESSION["user_id"]);
  $current_password=$me["password"];
  
  if($current_password!=$cur_hashed_password)
  {
         $_SESSION["message"] = "Incorrect current password!!!!";
         redirect_to("settings.php");
  }
  
  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
  {
         $_SESSION["message"] = "Invlaid Email!!!!";
         redirect_to("settings.php");
  }
		
  $query  = "SELECT * ";
  $query .= "FROM users ";
  $query .= "WHERE id!={$_SESSION["user_id"]} AND email = '{$email}' ";
  $user_set = mysqli_query($connection, $query);
  confirm_query($user_set);
  while($user = mysqli_fetch_assoc($user_set)) 
  {
	//check for existing email
        if($user["email"]==$email) 
        {
             $_SESSION["message"] = "Email already exists!!!!";
             redirect_to("update_profile.php");
        }
   } 
 



    $id = $_SESSION["user_id"];
  
    $query  = "UPDATE users SET ";
	$query .= "fname = '{$fname}', ";
	$query .= "lname = '{$lname}', ";
    $query .= "email = '{$email}', ";
    $query .= "password = '{$hashed_password}', ";
	$query .= "mobile = '{$mobile}', ";
	$query .= "address = '{$address}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      /*$to = $email;
      $subject = "Account Updated.";
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $message = "<p style=\"color:#6699FF;font-size:25px;font-family:gabriola;\">";
      $message.= "Hey ".$_SESSION["username"]."!!! Profile updated succesflully!!!";
      $message.="<br>";
      $message.=  "Regards : PharmaSite";
      $message.="<br>";
      $message.= " </p>";
      mail($to, $subject, $message,$headers);*/
      $_SESSION["message"] = "Profile updated successfully!!!";
      redirect_to("view_profile.php");
    }
   else 
   {
      // Failure
      $_SESSION["message"] = "Updating profile failed!!!!! Please try again.";
      redirect_to("settings.php");
    }


}
else 
{
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<html>
<head>
    <title>PharmaSite | Settings</title>
    <link rel="shortcut icon" href="images/ps-icon.png" type="image/type here" />
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/ex_ss.css" type="text/css" rel="stylesheet" />

    <style>

        .content
        {

            box-shadow: 0 0 10px 5px rgba(0,0,0,0.6); 
			padding:50px;
            //height:900px;
            width:900px;
            margin:0px auto;

        }

        .content form table
        {
            font-size:33px;
            font-variant:small-caps;
            font-weight:bold;
            font-family:Segoe UI Light;
        }

       .content form input,textarea
        {
            font-size:25px;
            font-family:Segoe UI Light;
			margin:10px;
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
            Profile Settings
        </p>
		
        <div class="content" align="center">
		<?php echo message(); ?>
		<?php 
		if(logged_in()) 
		{  	
			$user=find_user_by_username($_SESSION["username"]);
			$fname=$user["fname"];
			$lname=$user["lname"];
			$email=$user["email"];
			$mobile=$user["mobile"];
			$address=$user["address"];
		}
		?>
            <form action="settings.php" method="post" onsubmit="return validate_update();">
			<p style="color:#000;font-family:Segoe UI Light;font-size:33px;text-align:center;">
				Enter the Credentials :
			</p><br />
					<table border=0>
					
					<tr>
					<td>First Name</td>
                    <td> : <input type="text" name="fname" placeholder="First Name" required value="<?php echo $fname ?>" autofocus></td>
					</tr>
					
					<tr>
					<td>Last Name</td>
                    <td> : <input type="text" name="lname" placeholder="Last Name" required value="<?php echo $lname ?>"></td>
					</tr>
					
					<tr>
					<td>New Email</td>
					<td> : <input type="text" name="email" placeholder="Email" required value="<?php echo $email ?>"></td>
					</tr>
					
					<tr>
					<td>Current Password</td>
					<td> : <input type="password" name="cur_password" id="cur_pwd" placeholder="Current Password" required></td>
					</tr>
					
					<tr>
					<td>New Password</td>
					<td> : <input type="password" name="new_password" id="new_pwd" placeholder="New Password" required></td>
					</tr>
					
					<tr>
					<td>Confirm New Password</td>
					<td> : <input type="password" name="confirm_password" id="con_new_pwd" placeholder="Confirm New Password" required></td>
					</tr>
					
					<tr>
					<td>Contact Number</td>
                    <td> : <input type="text" name="mobile" placeholder="Mobile" required maxlength="10" autocomplete="off" value="<?php echo $mobile ?>"></td>
					</tr>
					
					<tr>
					<td>Address</td>
					<td>&nbsp;&nbsp;<textarea rows="5" cols="23" name="address" placeholder="Address" required autocomplete="off"><?php echo $address ?></textarea></td>
					</tr>
					
					
					</table>
                <br>
                 <center>
                    <input type="submit" name="update" value="Update Profile &rsaquo;" style="color:white;background: linear-gradient(#666666, #000000);border: 1px solid white;border-radius: 6px;padding:8px;">
                </center>
            </form>

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
	
	<script type="text/javascript">

function validate_update() {

 var var1 = document.getElementById("cur_pwd");
 var var2 = document.getElementById("new_pwd");
 var var3 = document.getElementById("con_new_pwd");

 if (var1.value.length < 8) {
 alert("Password must contain at least 8 characters");
 var1.focus();
 var1.style.border = "solid 2px red";
 return false;
 }
 
 if (var2.value.length < 8) {
 alert("Password must contain at least 8 characters");
 var2.focus();
 var2.style.border = "solid 2px red";
 return false;
 }


 if (var3.value.length < 8) {
 alert("Password must contain at least 8 characters");
 var3.focus();
 var3.style.border = "solid 2px red";
 return false;
 }

if (var3.value!=var2.value) {
 alert("Passwords don't match");
 var2.focus();
 var2.style.border = "solid 2px red";
 return false;
 }


 }
</script>

</body>
</html>
