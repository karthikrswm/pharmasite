<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("db_connection.php"); ?>


<html>
<head>
    <title>PharmaSite | Help Center</title>
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
			font-size:20px;
            font-family:Segoe UI Light;
        }

		hr
		{
			background-color:black;
			height:1px;
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
            FAQs
        </p>
		
        <div class="content" >
		At PharmaSite, we are dedicated to providing a seamless shopping experience to all our customers. To help guide you through your online shopping
		with us, we have compiled a list of frequently asked questions and provided answers below. If you don't find your question, you are always welcome
		to contact us and we will get back to you as soon as possible.
			<ul>
				<li>
					<b>What are your hours of operation?</b><br>
					Our website is open 24 hours a day, 7 days a week. Call Centre support is available from Monday to Saturday, 09:00 am to 09:00 pm IST.
				</li>
				<li>
					<b>What are PharmaSite's Privacy and Security Policies?</b><br>
					At PharmaSite, your privacy and security are extremely important to us. We are committed to protecting the confidentiality of your personal 
					information (your name, address, email address ,contact number) and we never share them with any other person or company. 
					It is used solely by our authorised personnel to process your order. 
				</li>
				<li>
					<b>Do you accept any Insurance Plans?</b><br>
					No, we do not accept any insurance plans. However, we can provide invoice and receipt towards your order to claim your insurance.
					But, in most cases, you will find our low-priced medications to be of great value compared with that of your insurance plan.
				</li>
				<li>
					 <b>How is my order packaged?</b><br>
					 PharmaSite takes greatest possible care in packaging your order. Untouched by human hands, your order will be packaged 
					 in factory-sealed blister-packs.
				</li>
				<li>
					<b>How long does it take to deliver a standard delivery order?</b><br>
					 On average, it may take about 3 to 7 working days to deliver your order. Working days exclude public holidays and Sundays. 
					Please note that delivery times are estimates only and are not guaranteed, due to circumstances out of our control.  
					Also, delivery times may vary depending on the shipping destination.
				</li>
				<li>
					<b>How will my order be delivered?</b><br>
					 Your order will be delivered by EMS/Courier to your domicile within 3 to 7 working days of placing your order.
					 We pack our products in our state-of-the-art warehouse.
				</li>
			</ul>
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
</body>
</html>
