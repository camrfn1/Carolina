<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>InventorySol - Sales Reciept</title>

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
	include('connect.php');
	include('invoicenumber.php');
?>

<?php
$invoice=$_GET['invoice'];
$sth = $db->prepare("SELECT * FROM sales WHERE invoice_number= :id");
$sth->bindParam(':id', $invoice);
$sth->execute();
for($i=0; $row = $sth->fetch(); $i++){
	$invoice	=$row['invoice_number'];
	$date		=$row['date'];
	$amount		=$row['amount'];
	$cash		=$row['amount_due'];
	$change		=$cash-$amount;
}
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
				<li><i class="fa fa-user fa-fw" style="color:black"></i>Welcome:<strong> <?php echo $_SESSION['username'];?></strong>
				&nbsp &nbsp <?php
								$today = date('y:m:d',time());
								$temp = date('l, F d, Y', strtotime($today));
								echo "<li>$temp</li>";
							?> 
				<li>
					<a href="logout.php" style="color:black; background-color:white; border-radius:2px;"><i class="glyphicon glyphicon-log-out" style="color:black"></i> Logout</a>
				</li>       
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation" style="background-color:#3A3A3A">
				<ul class="nav" id="side-menu">
					<li>
						<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; text-align:left"><a href="dashboard.php" style="color:white"><i class="glyphicon glyphicon-dashboard" style="color:white;margin-left:10px"></i> &nbsp Dashboard</a>
					</li>

					<li>
						<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; border-color:#ED173B; background-color:#ED173B; text-align:left"><a href="sales.php?id=cash&invoice=<?php echo $invoicenumber ?>" style="color:white"><i class="glyphicon glyphicon-usd" style="color:white;font-weight:bold;margin-left:10px"></i> &nbsp Sales</a>
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
						<!-- /.nav-second-level -->
					</li>
				</ul>
			<!-- /.navbar-static-side -->	
			</div>
		</nav>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
				<br>
				<img src="../images/logodashboard.jpg" width="350px" height="80px">
				</div>
				<!-- /.col-lg-12 -->
			</div>

		<div class="row panels">
			<div class="col-md-10">
				<div class="panel panel">
				<h2>Sales & Deposit Summary</h2>
				</div>
			</div>
				
			<div class="col-md-2">
				<div class="panel panel">
				<p style="font-size:15px">Invoice #: <strong><?php echo $invoice ?></strong></p>
				<p style="font-size:15px">Date:  <strong><?php echo $date ?></strong></p>
				</div>
			</div>
		</div>

		<div style="width: 100%; margin-top:20px">
			<table class="table table-bordered table-hover table-responsive" style="background-color:#FFFFFF; color:black; text-align: left">		
				<thead>
					<tr style="background:#191919;color:white">
						<th> Product Name </th>
						<th> Brand Name </th>
						<th> Category </th>
						<th> Qty </th>
						<th> Price </th>
						<th> Amount </th>
						<th> Profit </th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						$id=$_GET['invoice'];
						$sth = $db->prepare("SELECT * FROM sales_order WHERE invoice= :id");
						$sth->bindParam(':id', $id);
						$sth->execute();
						for($i=0; $row = $sth->fetch(); $i++){
					?>
					<tr class="record">
					<td><?php echo $row['product_name']; ?></td>
					<td><?php echo $row['brand_name']; ?></td>
					<td><?php echo $row['product_category']; ?></td>
					<td><?php echo $row['qty']; ?></td>
					<td>
					<?php
						$price=$row['price'];
						echo '$'.number_format((float)$price, 2, '.', '');
					?>
					</td>
					<td>
					<?php
						$amount=$row['amount'];
						echo '$'.number_format((float)$amount, 2, '.', '');
					?>
					</td>
					<td>
					<?php
						$profit=$row['profit'];
						echo '$'.number_format((float)$profit, 2, '.', '');
					?>
					</td>
					</tr>
					<?php
						}
					?>
					
					<tr>
					<td colspan="5" style="text-align:right"><strong>Total</strong></td>
					<td colspan="1"><strong>
					<?php
						$invoice=$_GET['invoice'];
						$sth = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
						$sth->bindParam(':a', $invoice);
						$sth->execute();
						for($i=0; $row = $sth->fetch(); $i++){
						$totalamount=$row['sum(amount)'];
						echo '$'.number_format((float)$totalamount, 2, '.', '');
						}
					?></strong></td>
					
					<td colspan="1"><strong>
					<?php
						$invoice=$_GET['invoice'];
						$sth = $db->prepare("SELECT sum(profit) FROM sales_order WHERE invoice= :a");
						$sth->bindParam(':a', $invoice);
						$sth->execute();
						for($i=0; $row = $sth->fetch(); $i++){
						$totalprofit=$row['sum(profit)'];
						echo '$'.number_format((float)$totalprofit, 2, '.', '');
						}
					?></strong></td>	
					</tr>
						
					<tr>
					<td colspan="5"style=" text-align:right;"><strong>Paid</strong></td>
					<td colspan="2"><strong>
					<?php
						echo '$'.number_format((float)$cash, 2, '.', '');
					?></strong></td>
					</tr>
					<tr>
					<td colspan="5" style=" text-align:right;"><strong>Cash Over/Short</strong></td>
					
					<?php
					if($change >= 0){
					?>
					<td colspan="2" style="color:white; background:#8AE62E"><strong>
					<?php
						echo '$'.number_format((float)$change, 2, '.', '');
					}?></strong></td>
					
					<?php 
					if($change < 0){
					?>
					<td colspan="2" style="color:white; background:#FF3300"><strong>
					<?php
						echo '$'.number_format((float)$change, 2, '.', '');
					}
					?></strong></td>
					
					</tr>
				</tbody>
			</table>
			<button class="btn" style="background:white; color:black; border:1px solid black; margin-bottom:100px" value="Print" onclick="window.print()" />Print</button>
		</div>
		<!--/page wrapper -->
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