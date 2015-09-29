<?php
//start session
session_start();

include('connect.php');

$name 		= $_POST['name'];
$address 	= $_POST['address'];
$city 		= $_POST['city'];
$zipcode 	= $_POST['zipcode'];
$number 	= $_POST['number'];
$contact 	= $_POST['contact'];
$comment 	= $_POST['comment'];

//add supplier query
$sql = "INSERT INTO vendors (vendor_name,vendor_address,vendor_city,vendor_zipcode,vendor_number,vendor_contact,comment) 
		VALUES (:name,:address,:city,:zipcode,:number,:contact,:comment)";
$sth = $db->prepare($sql);
$sth->execute(array(':name'=>$name,':address'=>$address,':city'=>$city,':zipcode'=>$zipcode,':number'=>$number,':contact'=>$contact,':comment'=>$comment));
header("location: vendor.php");
?>