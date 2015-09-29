<?php
include('connect.php');
$id=$_POST['id'];
$sth = $db->prepare("DELETE FROM products WHERE product_id= :id");
$sth->bindParam(':id', $id);
$sth->execute();
?>