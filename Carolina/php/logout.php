<?php
	//Start session
	session_start();
	
	//Destroys all Sessions
	if(session_destroy()) {
	header('Location: index.php');
	}
?>