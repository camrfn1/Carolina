<?php
//start session
session_start();

include('connect.php');

$invoice	= $_POST['invoice'];
$date 		= $_POST['date'];
$productid 	= $_POST['product'];
$quantity 	= $_POST['qty'];
//Select from products table
$sth = $db->prepare("SELECT * FROM products WHERE product_id= :id");
//Bind value.
$sth->bindParam(':id', $productid);
//Execute.
$sth->execute();
//Fetch row.
for($i=0; $row = $sth->fetch(); $i++){
	$pname		=$row['product_name'];
	$pbrand		=$row['brand_name'];
	$pcategory	=$row['product_category'];
	$pprice		=$row['price'];
	$profit		=$row['profit'];
}

//query to update quantity
$sql = "UPDATE products 
        SET qty=qty-?
		WHERE product_id=?";
//Prepare.		
$sth = $db->prepare($sql);
//Execute.
$sth->execute(array($quantity,$productid));
//Price per item
$amount=$pprice;
//Price per item * qty sold = total amount for that item
$amountqty=$amount*$quantity;
//Profit per item * qty sold = total amount of profit
$tprofit=$profit*$quantity;
//INSERT query
$sql = "INSERT INTO sales_order (invoice,product_id,qty,amount,product_category,price,profit,product_name,brand_name,date) 
		VALUES (:invoice,:productid,:quantity,:amountqty,:category,:unitprice,:profit,:productname,:brand,:date)";
$sth = $db->prepare($sql);
$sth->execute(array(':invoice'=>$invoice,':productid'=>$productid,':quantity'=>$quantity,':amountqty'=>$amountqty,':category'=>$pcategory,':unitprice'=>$pprice,':profit'=>$tprofit,':productname'=>$pname,':brand'=>$pbrand,':date'=>$date));
header("location:sales.php?invoice=$invoice");
?>