<?php
include('connect.php');

$id 			= $_POST['id'];
$name 			= $_POST['name'];
$brand 			= $_POST['brand'];
$category 		= $_POST['category'];
$unitprice 		= $_POST['unit_price'];
$price			= $_POST['price'];
$profit			= $_POST['profit'];
$vendor 		= $_POST['vendor'];
$quantity 		= $_POST['qty'];
$quantitysold 	= $_POST['qty_sold'];
$expiration 	= $_POST['expiration'];
$arrival 		= $_POST['arrival'];

//edit product query
$sql = "UPDATE products 
        SET product_name=?, brand_name=?, product_category=?, unit_price=?, price=?, profit=?, vendor=?, qty=?, qty_sold=?, expiration=?, arrival=? 
		WHERE product_id=?";
$sth = $db->prepare($sql);
$sth->execute(array($name,$brand,$category,$unitprice,$price,$profit,$vendor,$quantity,$quantitysold,$expiration,$arrival,$id));
header("location: products.php");
?>