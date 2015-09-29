<?php include('connect.php'); ?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>InventorySol - Sales Report & Summary</title>
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

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
	
	<!-- Facebox CSS -->
	<link href="../startbootstrap/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	
	<!-- Tcal CSS -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<!-- Searchbox CSS -->
	<link rel="stylesheet" type="text/css" href="searchbox.css" media="screen" />
	
	<!-- JavaScript -->
	<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
	<script src="../startbootstrap/js/application.js" type="text/javascript" charset="utf-8"></script>
	<script src="../startbootstrap/lib/jquery.js" type="text/javascript"></script>
	<script src="../startbootstrap/src/facebox.js" type="text/javascript"></script>
    <script src="../startbootstrap/bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>
	<script type="text/javascript" src="tcal.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
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
	<div id="wrapper" style="background-color:#3A3A3A; margin:auto">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="background-color:white">
			<div class="navbar-header">
				<a class="navbar-brand" href="dashboard.php" style="color:black; font-size:25px"><strong>Inventory</strong>Sol</a>					
			<!-- /.navbar-header -->
			</div>
			
			<ul class="nav navbar-top-links navbar-right">
				<li><i class="fa fa-user fa-fw" style="color:black"></i>Welcome:<strong> <?php echo $_SESSION['username'];?></strong>
				&nbsp &nbsp <?php
								echo date('l, F d, Y');
							?> 
				</li>
				<li>
					<a href="logout.php" style="color:black; background-color:white; border-radius:2px;"><i class="glyphicon glyphicon-log-out" style="color:black"></i> Logout</a>
				</li>       
			</ul>

			<div class="navbar-default sidebar" role="navigation" style="background-color:#3A3A3A">
				<ul class="nav" id="side-menu">	
					<li>
						<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; text-align:left"><a href="dashboard.php" style="color:white"><i class="glyphicon glyphicon-dashboard" style="color:white;margin-left:10px"></i> &nbsp Dashboard</a>
					</li>

					<li>
						<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; text-align:left"><a href="sales.php?id=cash&invoice=<?php echo $invoicenumber ?>" style="color:white"><i class="glyphicon glyphicon-usd" style="color:white;font-weight:bold;margin-left:10px"></i> &nbsp Sales</a>
					</li>
					
					<li>
						<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; text-align:left"><a href="products.php" style="color:white"><i class="glyphicon glyphicon-barcode" style="color:white; font-weight:bold; margin-left:10px"></i> &nbsp Products</a>
					</li>
					
					<li>
						<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px;  text-align:left"><a href="vendor.php" style="color:white"><i class="glyphicon glyphicon-th-list" style="color:white; margin-left:10px"></i> &nbsp Vendors</a>
					</li>
					<li>
						<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; border-color:#ED173B; background-color:#ED173B; text-align:left"><a href="salesreport.php?datestart=0&dateend=0" style="color:white"><i class="glyphicon glyphicon-file" style="color:white; margin-left:10px"></i> &nbsp Sales Report</a>
					</li>
				</ul>
			</div>
		<!-- /.navbar-static-side -->
		</nav>
		
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<br><img src="../images/logodashboard.jpg" width="350px" height="80px">
				</div>
				<!-- /.col-lg-12 -->
			</div>

			<nav class="navbar navbar-default" style="margin-top:15px; background:#FEFEFE">
				<div class="container-fluid">
				
				<?php 
					$result = $db->prepare("SELECT * FROM sales ORDER BY transaction_id DESC");
					$result->execute();
					$rowcount = $result->rowcount();
				?>
					
				<form action="salesreport.php" method="get">
				<!-- Collect the nav links, forms, and other content for toggling -->
					<ul class="nav navbar-nav" style="padding:10px">
						<li style="padding-right:15px"><strong>From : <input type="text" style="width: 110px; height: 33px; border-radius:4px" name="datestart" class="tcal" value="" /> To: <input type="text" style="width: 110px; height: 33px; border-radius:4px" name="dateend" class="tcal" value="" /></strong></li>
						<li style="padding-right:15px"><button class="btn btn-info" type="submit">Search</button></li>
						<li style="padding-right:15px"><button class="btn btn-warning">Save</button></li>
						<li style="padding-right:15px"><button class="btn btn-danger" onclick="window.print()">Print</button></li>
						<li style="padding-right:15px"><button class="btn btn-success">Sales Reports <span class="badge"><?php echo $rowcount;?></span></button></li>
					</ul>
				 </form> 
					<ul class="nav navbar-nav navbar-right" style="padding:10px">
						<li>
							<form>
								<input type="text" class="tftextinput" name="filter" id="filter" placeholder="Search Product" autocomplete="off"><input class="tfbutton" style="width:20px">
							</form>
						</li>
					</ul>
				<!-- /.container-fluid -->
				</div>
			<!-- /.navbar navbar-default -->
			</nav>

			<table class="table table-bordered table-hover table-responsive" style="text-align: left;">
				<thead>
					<tr style="background:#3A3A3A; color:white">
						<th width="25%"> Invoice Number </th>
						<th width="25%"> Invoice Date </th>
						<th width="25%"> Total Sales </th>
						<th width="25%"> Profit </th>
					</tr>
				</thead>
				<tbody>

				<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
					Sales Report <?php if($_GET['datestart'] != 0 && $_GET['dateend'] != 0)
					{
					echo $_GET['datestart'] ?>&nbsp;to&nbsp;<?php echo $_GET['dateend'];
					} ?>
				</div>
					<?php
						$datestart=$_GET['datestart'];
						$dateend=$_GET['dateend'];
						$result = $db->prepare("SELECT * FROM sales WHERE date BETWEEN :x AND :y ORDER by transaction_id DESC ");
						$result->bindParam(':x', $datestart);
						$result->bindParam(':y', $dateend);
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){
					?>
					<tr class="record">
					
					<td><?php echo "<a href = \"salesreceipt.php?invoice=$row[invoice_number]\">$row[invoice_number]</a> "; ?></td>
					<td><?php echo $row['date']; ?></td>
					<td><?php
							$sales=$row['amount'];
							echo '$'.number_format((float)$sales, 2, '.', '');
					?></td>
					<td><?php
							$profit=$row['profit'];
							echo '$'.number_format((float)$profit, 2, '.', '');
					?></td>
					</tr>
					<?php
						}
					?>	
				</tbody>
				
				<thead>
					<tr>
					<th colspan="2"> Total: </th>
					<th colspan="1"> 
					<?php
						$datestart=$_GET['datestart'];
						$dateend=$_GET['dateend'];
						$salesresults = $db->prepare("SELECT sum(amount) FROM sales WHERE date BETWEEN :x AND :y");
						$salesresults->bindParam(':x', $datestart);
						$salesresults->bindParam(':y', $dateend);
						$salesresults->execute();
						for($i=0; $rows = $salesresults->fetch(); $i++){
						$totalsales=$rows['sum(amount)'];
						echo '$'.number_format((float)$totalsales, 2, '.', '');
						}
						?>
					</th>
					<th colspan="1">
					<?php 
						$profitresults = $db->prepare("SELECT sum(profit) FROM sales WHERE date BETWEEN :c AND :d");
						$profitresults->bindParam(':c', $datestart);
						$profitresults->bindParam(':d', $dateend);
						$profitresults->execute();
						for($i=0; $rowss = $profitresults->fetch(); $i++){
						$totalprofit=$rowss['sum(profit)'];
						echo '$'.number_format((float)$totalprofit, 2, '.', '');
						}
						?>
					</th>
					</tr>
				</thead>
			</table>
		<!--/.page-wrapper -->
		</div>
	<!--/.page-wrapper -->
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