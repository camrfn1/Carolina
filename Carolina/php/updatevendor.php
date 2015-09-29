<?php
include('connect.php');

$id			= $_POST['id'];
$name 		= $_POST['name'];
$address 	= $_POST['address'];
$city 		= $_POST['city'];
$zipcode 	= $_POST['zipcode'];
$number 	= $_POST['number'];
$contact 	= $_POST['contact'];
$comment 	= $_POST['comment'];

//edit supplier query
$sql = "UPDATE vendors 
        SET vendor_name=?, vendor_address=?, vendor_city=?, vendor_zipcode=?, vendor_number=?, vendor_contact=?, comment=?
		WHERE vendor_id=?";
$sth = $db->prepare($sql);
$sth->execute(array($name,$address,$city,$zipcode,$number,$contact,$comment,$id));
header("location: vendor.php");
?>