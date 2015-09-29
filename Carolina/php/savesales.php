<?php
//Start session
session_start();

include('connect.php');

$invoice	= $_POST['invoice'];
$date 	 	= $_POST['date'];
$amount		= $_POST['amount'];
$profit  	= $_POST['profit'];
$amountdue	= $_POST['cash'];

//save query
$sql = "INSERT INTO sales (invoice_number,date,amount,profit,amount_due) 
		VALUES (:invoice,:date,:amount,:profit,:amountdue)";
$sth = $db->prepare($sql);
$sth->execute(array(':invoice'=>$invoice,':date'=>$date,':amount'=>$amount,':profit'=>$profit,':amountdue'=>$amountdue));
header("location: salesreceipt.php?invoice=$invoice");
exit();
?>