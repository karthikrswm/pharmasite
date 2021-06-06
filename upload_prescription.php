<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("db_connection.php"); ?>

<?php 
	if(!logged_in()) $_SESSION["message"] = "Please login to upload prescription.";
	confirm_logged_in(); 
?>

<?php
if(isset($_POST["submit"]))
{
  $target_dir = "images/uploaded_prescriptions/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $target_file_name=basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) 
    {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
    else 
    {
        $_SESSION["message"] = "File is not an image.";
        $uploadOk = 0;
      redirect_to("upload_prescription.php");
    }

  if ($_FILES["fileToUpload"]["size"] > 1000000)
  {
    $_SESSION["message"] = "Sorry, your file is too large.";
    $uploadOk = 0;
      redirect_to("upload_prescription.php");
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
  {
    $_SESSION["message"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
      redirect_to("upload_prescription.php");
  }

  // Check if $uploadOk is set to 0 by an error

  if ($uploadOk == 0) 
  {
    $_SESSION["message"] = "Sorry, your file was not uploaded.";
      redirect_to("edit_dp.php");
// if everything is ok, try to upload file
  } 
  else
  {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
     {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

    $pi = mysql_prep("$target_file_name");
    $id = $_SESSION["user_id"];
    $name = $_SESSION["username"];
	
    $query  = "INSERT INTO prescriptions (";
   $query .= "  user_id,username,prescription_name ";
   $query .= ") VALUES (";
   $query .= " '{$id}','{$name}','{$pi}'";
   $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Prescription uploaded successfully!!!";
      redirect_to("view_profile.php#my_prescriptions");
    }
   else 
   {
      // Failure
      $_SESSION["message"] = "Uploading prescription failed!!!!! Please try again.";
      redirect_to("upload_prescription.php");
    }

}
     else 
     {
        $_SESSION["message"] = "Sorry, there was an error uploading your file.";
      redirect_to("upload_prescription.php");
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
    <title>PharmaSite | Upload Prescription</title>
    <link rel="shortcut icon" href="images/ps-icon.png" type="image/type here" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/ex_ss.css" type="text/css" rel="stylesheet" />
	<script src="js/jsfile.js"></script>

    <style>
        .content {
            box-shadow: 0 0 10px 5px rgba(0,0,0,0.6); 
			padding:50px;
            //margin:10px;
            width:900px;
			margin:0px auto;
			font-size:25px;
            font-family:Segoe UI Light;
        }
		
		.dropzone
		{
			width:400px;
			height:300px;
			line-height:300px;
			border:2px dashed #808080;
			text-align:center;
			color:#808080;
			margin:0px auto;
		}

		.dropzone.dragover
		{
			border:3px dashed #000;
			color:#000;
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


        <p style="color:#000;font-family:Segoe UI Light;font-size:3em;text-align:center;">
            Upload Prescription
        </p>

        <div class="content">
			<center>
			<?php echo message();echo "<br><br>"; ?>
			</center>
		
			<!--div class="uploads"></div>
			<div class="dropzone" id="dropzone" align="center">
				<p>Drop your prescription image here</p>
			</div-->
			
			<form action="upload_prescription.php" method="post" enctype="multipart/form-data">
				  <span style="font-size:25px;"> Select a prescription image : </span>
				  <input type="file" name="fileToUpload" id="fileToUpload" style="color:white;font-size:20px;background: linear-gradient(#666666, #000000);border: 1px solid white;border-radius: 6px;padding:8px;"><br><br>
				  <input type="submit" value="Upload Image" name="submit" style="color:white;font-size:25px;background: linear-gradient(#666666, #000000);border: 1px solid white;border-radius: 6px;padding:8px;">
			</form>
			<br>
			<div class="Instructions">
				<b>Instructions : </b>
				<ul>
				<li>Ensure that the picture or scan is such that the entire prescription is visible (including the doctor/clinic’s letterhead).</li>
				<li>Ensure that the picture is taken in a way that the handwriting/type is visible clearly.</li>
				<li>The file size should not exceed 1 MB.</li>
				<li>Ensure that the prescription is valid. Your family member or a caregiver can place order for prescription medicines on your behalf.</li>
				<li>The Doctor's signature is compulsory.</li>
				</ul>
			</div>
			
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
	/*	(function(){
			var dropzone = document.getElementById('dropzone');
			
			var upload = function(files){
				//console.log(files);
				var formData = new FormData(),xhr = new XMLHttpRequest(),x;
				if (files.length>1){
					alert("Please select only one image..");
					return false;
				} 
				for(x=0;x<files.length;x=x+1){
					formData.append('file[]',files[x]);
				}
				
				
				xhr.open('post','upload.php');
				xhr.send(formData);
			};
			
			dropzone.ondrop = function(e) {
				e.preventDefault();
				this.className = 'dropzone';
				upload(e.dataTransfer.files);
			};
			
			dropzone.ondragover = function() {
				this.className = 'dropzone dragover';
				return false;
			};
			
			dropzone.ondragleave = function() {
				this.className = 'dropzone';
				return false;
			};
		}());*/
	</script>
</body>
</html>
