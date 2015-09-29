<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>


<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
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

    <title>InventorySol - Log In</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<div class="container">
 
  <div class="jumbotron" style="background-color:white;">

<form action="login.php" method="post">
		
		<div style="width:350px; height:100px; margin: 0 auto">
		<img src="images/logo.jpg" style="max-width:100%; max-height:100%; border-radius:10px">
        </div>
		
		<div style="width:350px; height:50px; margin: 0 auto">
		<h2 style="color:grey; font-size:25px; font-family: TimesNewRoman, 'Times New Roman', Times, Baskerville, Georgia, serif; margin-left:60px">Sign in to your account</h2>
		</div>
		
		<br>
		
		<div class="input-group input-group-lg" style="width:350px; height:50px; margin: 0 auto">
				<input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="sizing-addon1">
		</div>
		
		<br>
		
		<div class="input-group input-group-lg" style="width:350px; height:50px; margin: 0 auto">
				<input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="sizing-addon1">
		</div>
		
		<br>

        <button class="btn btn-large btn-primary btn-block"  style="background-color:#ED173B; margin: 0 auto; color:white; font-weight:bold; width:350px; height:50px; border:#ED173B " type="submit"><i class="icon-signin icon-large"></i> LOG IN</button>
      </form>
	  <br>
	  
	  <div style="width:350px; height:50px; margin: 0 auto">
	  <p style="font-size: 15px; font-weight:bold; margin: 0 auto"> New? <a style="color:#ED173B">Create an account</a></p>
	  </div>
	  
	</div> <!-- /container -->
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
