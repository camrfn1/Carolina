<?php
//Start session
session_start();

include('connect.php');

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

//Save product query
$sql = "INSERT INTO products (product_name,brand_name,product_category,unit_price,price,profit,vendor,qty,qty_sold,expiration,arrival) 
		VALUES (:pname,:pbrand,:pcategory,:punitprice,:price,:pprofit,:pvendor,:pqty,:pqtysold,:pexp,:parrival)";
$sth = $db->prepare($sql);
$sth->execute(array(':pname'=>$name,':pbrand'=>$brand,':pcategory'=>$category,':punitprice'=>$unitprice,':price'=>$price,':pprofit'=>$profit,':pvendor'=>$vendor,':pqty'=>$quantity,':pqtysold'=>$quantitysold,':pexp'=>$expiration,':parrival'=>$arrival));
header("location: products.php");
?>