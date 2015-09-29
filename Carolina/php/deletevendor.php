<?php
include('connect.php');
$id=$_POST['id'];
$sth = $db->prepare("DELETE FROM vendors WHERE vendor_id= :id");
$sth->bindParam(':id', $id);
$sth->execute();
?>