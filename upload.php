<?php

header('Content-Type: application/json');
	if(!empty($_FILES["file"]["name"][0]))
	{
		echo "hello"; 
		foreach($_FILES["file"]["name"] as $position => $name)
		{
			if(move_uploaded_file($_FILES["file"]["tmp_name"][$position],'images/uploaded_prescriptions/'))
			{
				$_SESSION["message"] = "Prescription Uploaded Successfully!!!";
				redirect_to("upload_prescription.php");
			}
		}
	}
?>