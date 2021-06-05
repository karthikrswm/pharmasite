<?php require_once("../session.php"); ?>
<?php require_once("../db_connection.php"); ?>
<?php require_once("../functions.php"); ?>

<html>
<head>
    <link href="../css/ex_ss.css" type="text/css" rel="stylesheet" />
</head>
<body>

<table align="center">
			
			<?php 
				$i=0;
				$product_set = find_products_by_category("otc");
				while($product = mysqli_fetch_assoc($product_set))
				{	if($i%3==0) echo "<tr>";
			?>
			        <td>
                        <div class="product">
                         <a href="../view_product.php?product_id=<?php echo $product["id"] ?>" target="_parent">
                            <img src="../images/<?php echo $product["picture"] ?>" >
						</a>
                            <div class="caption">
                                <h2><a href="../view_product.php?product_id=<?php echo $product["id"] ?>" target="_parent"><?php echo $product["name"] ?> </a></h2>
                                <p align="center">
                                    <a class="button4">&#x20B9; <?php echo $product["price"] ?></a> &nbsp;
                                    <a href="../view_product.php?product_id=<?php echo $product["id"] ?>" class="button1" target="_parent">BUY NOW</a>
                                </p>
                            </div>
                        </div>
                    </td>
			<?php 
			$i++;
			if($i%3==0) echo "</tr>";}
			?>
         </table>

</body>
</html>