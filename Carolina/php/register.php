<?php
//start session 
session_start();
 
require 'connect.php';
 
if(isset($_POST['register'])){
    
    //Retrieve the field values from our registration form.
	$firstname 	= !empty($_POST['firstname']) ? trim($_POST['firstname']) : '';
	$lastname 	= !empty($_POST['lastname']) ? trim($_POST['lastname']) : '';
    $username 	= !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password 	= !empty($_POST['password']) ? trim($_POST['password']) : null;

    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(username) AS rowcount FROM users WHERE username = :username";
    $prepare = $db->prepare($sql);
    //Bind the provided username to our prepared statement.
    $prepare->bindValue(':username', $username);
    //Execute.
    $prepare->execute();
    //Fetch the row.
    $row = $prepare->fetch(PDO::FETCH_ASSOC);
    
    //If the username already exists display error
    if($row['rowcount'] > 0){
        die('That username already exists.');
    }
    
    //Prepare insert statement.
    $sql = "INSERT INTO users (username, password, firstname, lastname) VALUES (:username, :password, :firstname, :lastname)";
    $prepare = $db->prepare($sql);
    
    //Bind our variables.
    $prepare->bindValue(':username', $username);
    $prepare->bindValue(':password', $password);
	$prepare->bindValue(':lastname', $lastname);
	$prepare->bindValue(':firstname', $firstname);
 
    //Execute the statement and insert the new account.
    $result = $prepare->execute();
    
    //If the signup process is successful then redirect to sign in
    if($result){
		header('Location: index.php');
    }  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>InventorySol - Register</title>

    <!-- Bootstrap core CSS -->
    <link href="../startbootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../startbootstrap/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../startbootstrap/bower_components/bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>

<body>
	<div class="container">
		<div class="jumbotron" style="background-color:white;">
			<form action="register.php" method="post">
				<div style="width:350px; height:100px; margin: 0 auto">
					<img src="../images/logo.jpg" style="max-width:100%; max-height:100%; border-radius:10px">
				</div>
				
				<div style="width:350px; height:50px; margin: 0 auto">
					<h2 style="color:grey; font-size:25px; font-family: TimesNewRoman, 'Times New Roman', Times, Baskerville, Georgia, serif; margin-left:120px">Registration</h2>
				</div><br>
				
				<div class="input-group input-group-lg" style="width:350px; height:50px; margin: 0 auto">
					<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" aria-describedby="sizing-addon1">
				</div><br>
				
				<div class="input-group input-group-lg" style="width:350px; height:50px; margin: 0 auto">
					<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" aria-describedby="sizing-addon1">
				</div><br>
				
				<div class="input-group input-group-lg" style="width:350px; height:50px; margin: 0 auto">
					<input type="text" class="form-control" id="username" name="username" placeholder="Username" aria-describedby="sizing-addon1">
				</div><br>
				
				<div class="input-group input-group-lg" style="width:350px; height:50px; margin: 0 auto">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-describedby="sizing-addon1">
				</div><br>
				
				<button class="btn btn-large btn-primary btn-block"  style="background-color:#ED173B; margin: 0 auto; color:white; font-weight:bold; width:350px; height:50px; border:#ED173B " name="register" type="submit"><i class="icon-signin icon-large"></i>REGISTER</button>
			</form><br>
			
				<div style="width:350px; height:50px; margin: 0 auto">
					<p style="font-size: 15px; font-weight:bold; margin: 0 auto"> Already have an account? <a href="index.php" style="color:#ED173B">Log In</a></p>
				</div>
		 <!-- jumbotron --> 
		</div>
	<!-- /container -->
	</div>
</body>

	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../startbootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../startbootstrap/bower_components/bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

</html>