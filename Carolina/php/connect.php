<?php

$servername		= 'localhost';
$username		= 'root';
$password		= '';
$database		= 'inventorysol'; 
$db = new PDO('mysql:host='.$servername.';dbname='.$database, $username, $password);

// Error reporting - PDO will throw a PDOException and set its properties to reflect the error code and error information.
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
