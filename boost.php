<?php require_once("session.php"); ?>
<?php require_once("db_connection.php"); ?>
<?php require_once("functions.php"); ?>
<html>
<head>
    <title>BOOST 500G JAR</title>
    <link rel="shortcut icon" href="images/ps-icon.png" type="image/type here" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/ex_ss.css" type="text/css" rel="stylesheet" />


    <style>
        .content1
        {
            padding:30px;
            margin:15px;
            height:250px;
        }

       /* .content1 img:hover
        {
            height:400px;
            width:300px;
            position:absolute;
            margin-left:200px;
        }*/

        .content2
        {
            width:100%;
            height:500px;
        }

        table {
	        font-family:Arial, Helvetica, sans-serif;
	        color:#666;
	        font-size:18px;
	        text-shadow: 1px 1px 0px #fff;
	        background:#eaebec;
	        margin:20px;
	        border:#ccc 1px solid;
	        border-radius:3px;
	        box-shadow: 0 1px 2px #d1d1d1;
        }
        table th {
	        padding:21px 25px 22px 25px;
	        border-top:1px solid #fafafa;
	        border-bottom:1px solid #e0e0e0;
	        background: #ededed;
        }

        table tr {
	        text-align: center;
	        padding-left:20px;
        }

        table td {
	        padding:18px;
	        border-top: 1px solid #ffffff;
	        border-bottom:1px solid #e0e0e0;
	        border-left: 1px solid #e0e0e0;
	        background: #fafafa;
        }

        table tr:hover td {
	        background: #f2f2f2;
        }

    </style>

</head>
<body onload="init()">
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

        <div class="content1">

                <div class="" style="float:left;">
                    <a href="images/boost.jpg" id="">
                        <img id="" class="" src="images/boost.jpg" style="border:1px solid;border-radius:6px;">
                    </a>
					
                 </div>
		<p style="float:right;font-size:2em;font-family:Georgia;" class="button5">	100 views	</p>

                <div class="" style="margin-left:300px;">
					
                    <p style="color:#000;font-family:Segoe UI Light;font-size:2.5em;">
                        BOOST 500G JAR  &nbsp;&nbsp;&nbsp;&nbsp;
                        <!--a class="button5">PRESCRIPTION NEEDED</a-->
                    </p>

                    <hr style="background-color:black;height:1px;">
                    <p style="font-size:1.5em;">
                        Quantity :
                        <select style="font-size:21px;" id="qty" onchange="func()">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; IN STOCK
                    </p>
                    <br />
                    <a class="button4">&#x20B9; <span id="price">204.25</span></a> &nbsp;
                    <a href="#" class="button1">BUY NOW</a>
                </div>
        </div>
            <br /><br />

            <div class="content2">

                <div class="" style="border-right:1px solid;text-align:center;float:left;width:50%;">
                    <h2 style="font-family:Segoe UI Light;font-size:27px;">Product Details</h2><br />
                   <!-- <table border="2em" align="center" cellspacing='0'>
                        <tr>
                            <td>Formulation</td>
                            <td>CONTAINER</td>
                        </tr>
                        <tr>
                            <td>Manufacturer</td>
                            <td>GLAXOSMITHKLINE PHARMACEUTICALS LIMITED</td>
                        </tr>
                        <tr>
                            <td>Packaging Type</td>
                            <td>CONTAINER</td>
                        </tr>
                    </table>

                    -->
                    <center>
                        <table cellspacing='0'>
                            <tr>
                                <th>Property</th><th>Type</th>
                            </tr>
                            <tr>
                                <td>Formulation</td>
                                <td>CONTAINER</td>
                            </tr>
                            <tr>
                                <td>Manufacturer</td>
                                <td>GLAXOSMITHKLINE PHARMACEUTICALS LIMITED</td>
                            </tr>
                            <tr>
                                <td>Packaging Type</td>
                                <td>CONTAINER</td>
                            </tr>
                        </table>
                    </center>
                </div>
				<!--hr style="transform:rotate(90deg);text-align:center;"/-->
                <div class="" style="text-align:center;">
                    <h2 style="font-family:Segoe UI Light;font-size:27px;">Product Reviews</h2><br />
                    <input type="text" style="font-size:15px;" placeholder="Name"/><br /><br />
                    <textarea rows="4" style="width:450px;border-radius:5px;" placeholder="Comments"></textarea>
                </div>

            </div>


        <div id="footer">
            <ul class="">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php">SiteMap</a></li>
                <li><a href="aboutus.php">AboutUs</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="contactus.php">ContactUs</a></li>
                <li><a href="privacy_policy.php">PrivacyPolicy</a></li>
            </ul>
            <p style="text-align:center;color:white;">Copyright &copy; 2016 PharmaSite</p>
        </div>


    </div>

	<script type="text/javascript">
	
	var rate1;
	function init(){
	rate1=parseFloat(document.getElementById("price").innerHTML);
	}
	function func()
	{
		var quantity=document.getElementById("qty").value;
		var rate=document.getElementById("price");
		var final_rate=(rate1)*quantity;
		rate.innerHTML=final_rate.toString();
	}	
	</script>
	
</body>
</html>
