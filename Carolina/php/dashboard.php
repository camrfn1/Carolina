<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>InventorySol - Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="../startbootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../startbootstrap/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../startbootstrap/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../startbootstrap/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../startbootstrap/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../startbootstrap/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Facebook CSS -->
	<link href="../startbootstrap/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- javaScript -->
	<script src="sum.js" type="text/javascript" charset="utf-8"></script>
	<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
	<script src="../startbootstrap/js/application.js" type="text/javascript" charset="utf-8"></script>
	<script src="../startbootstrap/lib/jquery.js" type="text/javascript"></script>
	<script src="../startbootstrap/src/facebox.js" type="text/javascript"></script>

</head>

<?php
session_start();
 
//checks to see if user is logged in
if(!isset($_SESSION['username']) || !isset($_SESSION['logged_in'])){
    //if user is not logged in, redirect to sign in page
	header('Location: index.php');
    exit;
}
include('invoicenumber.php');
?>

<body>
    <div id="wrapper" style="background-color:#3A3A3A">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="background-color:white">
            <div class="navbar-header">
				<a class="navbar-brand" href="dashboard.php" style="color:black; font-size:25px"><strong>Inventory</strong>Sol</a>					
            </div>
			<!-- /.navbar-header -->
			
			<ul class="nav navbar-top-links navbar-right">
                <li><i class="fa fa-user fa-fw" style="color:black"></i>Welcome:<strong> <?php echo $_SESSION['username'];?> &nbsp</strong></li>
			    <li><?php
						echo date('l, F d, Y');
					?> 
				</li>
                <li>
					<a href="logout.php" style="color:black; background-color:white"><i class="glyphicon glyphicon-log-out" style="color:black"></i> Logout</a>
				</li>       
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="background-color:#3A3A3A">
				<ul class="nav" id="side-menu">
					<li>
						<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; border-color:#ED173B; background-color:#ED173B;text-align:left"><a href="dashboard.php" style="color:white"><i class="glyphicon glyphicon-dashboard" style="color:white;margin-left:10px"></i> &nbsp Dashboard</a>
					</li>
	
					<li>
						<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; text-align:left"><a href="sales.php?id=cash&invoice=<?php echo $invoicenumber ?>" style="color:white"><i class="glyphicon glyphicon-usd" style="color:white;font-weight:bold;margin-left:10px"></i> &nbsp Sales</a>
					</li>
					
					<li>
						<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; text-align:left"><a href="products.php" style="color:white"><i class="glyphicon glyphicon-barcode" style="color:white; font-weight:bold; margin-left:10px"></i> &nbsp Products</a>
					</li>
					
					<li>
						<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; text-align:left"><a href="vendor.php" style="color:white"><i class="glyphicon glyphicon-th-list" style="color:white; margin-left:10px"></i> &nbsp Vendors</a>
					</li>
					<li>
						<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; text-align:left"><a href="salesreport.php?datestart=0&dateend=0" style="color:white"><i class="glyphicon glyphicon-file" style="color:white; margin-left:10px"></i> &nbsp Sales Report</a>
					</li>
				</ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" style="margin-top:10px">
					<br><img src="../images/logodashboard.jpg" width="350px" height="80px">
                </div>
            <!-- /.col-lg-12 -->
            </div>
            
			<!-- panels -->
			<div style="margin-top:15px; margin-left:-15px">
				<div class="row Product">
					<!-- Product Overview Panel -->
					<div class="col-md-8">
						<div class="panel panel" style="background-color:#FCFCFC">
							<div class="panel-heading">
								<a href="products.php" style="color:black; font-size:20px"><strong>Products</strong> Overview</a>	
								<br><br>
								<?php include ('productoverview.php') ?>
							</div>
							<a href="products.php">
								<div class="panel-footer" style="background-color:white">
									<span class="pull-right" style="color:black">View More <i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					
					<!-- Add Product Panel -->
					<div class="col-md-4">
						<div class="panel panel"  style="background-color:#FCFCFC">
							<div class="panel-heading">
								<a href="" style="color:black; font-size:20px"><strong>Product</strong> Add</a>	
								<br><br>
								<?php include('addproduct.php');?>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row Sales">
					<!-- Sales Overview Panel -->
					<div class="col-md-8">
						<div class="panel panel" style="background-color:#FCFCFC">
							<div class="panel-heading">
								<a href="" style="color:black; font-size:20px"><strong>Sales</strong> Overview</a>
								<br><br>
								<?php include ('salesoverview.php') ?>
							</div>
								<a href="salesreport.php">
									<div class="panel-footer" style="background-color:white">
										<span class="pull-right" style="color:black">View Details <i class="fa fa-arrow-circle-right"></i></span>
										<div class="clearfix"></div>
									</div>
								</a>
						</div>
					</div>
					
					<!-- Past 7 days sales report Panel -->
					<div class="col-md-4">
						<div class="panel panel" style="background-color:#FCFCFC">
							<div class="panel-heading">
								<a href="" style="color:black; font-size:20px"><strong>7-Days</strong> Sales Summary</a>
								<br><br>
								<?php include ('salessummary.php') ?>	
							</div>
						</div>
					</div>
				<!-- /.row Sales -->	
				</div>
			<!-- /.panels -->	
			</div>
		<!-- /page-wrapper -->
		</div>
	<!-- /wrapper -->
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
