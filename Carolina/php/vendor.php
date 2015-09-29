<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>InventorySol - Vendors</title>
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

    <!-- Searchbox CSS -->
	<link rel="stylesheet" type="text/css" href="searchbox.css" media="screen" />

	<!-- Facebox CSS -->
	<link href="../startbootstrap/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../startbootstrap/bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!--JavaScript Files-->
	<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
	<script src="../startbootstrap/js/application.js" type="text/javascript" charset="utf-8"></script>
	<script src="../startbootstrap/lib/jquery.js" type="text/javascript"></script>
	<script src="../startbootstrap/src/facebox.js" type="text/javascript"></script>
	<script type="text/javascript">	
	jQuery(document).ready(function($) {
		$('a[rel*=facebox]').facebox({
		  loadingImage : '../startbootstrap/src/loading.gif',
		  closeImage   : '../startbootstrap/src/closelabel.png'
		})
	})
	</script>
	
	<script src="../js/jquery.js"></script>
	<script type="text/javascript">
	$(function() {

	$(".delbutton").click(function(){
	var element = $(this);
	var del_id = element.attr("id");
	var info = 'id=' + del_id;
	
	if(confirm("Delete?"))
	{
	 $.ajax({
	   type: "POST",
	   url: "deletevendor.php",
	   data: info,
	   success: function(){
	   
	   }
	 });
		 $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");
	 }
	return false;
	});
	});
	</script>
	
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
								echo date('l, F d, Y');
							?> 
				</li>
				<li>
					<a href="logout.php" style="color:black; background-color:white; border-radius:2px;"><i class="glyphicon glyphicon-log-out" style="color:black"></i> Logout</a>
				</li>       
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation" style="background-color:#3A3A3A">
				<div class="sidebar-nav navbar-collapse">
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
							<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; border-color:#ED173B; background-color:#ED173B; text-align:left"><a href="vendor.php" style="color:white"><i class="glyphicon glyphicon-th-list" style="color:white; margin-left:10px"></i> &nbsp Vendors</a>
						</li>
						<li>
							<button class="btn btn-default btn-md btn-block"  style="border: 0px; border-radius: 0px; text-align:left"><a href="salesreport.php?datestart=0&dateend=0" style="color:white"><i class="glyphicon glyphicon-file" style="color:white; margin-left:10px"></i> &nbsp Sales Report</a>
						</li>
					</ul>
				</div>
			</div>
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
					$result = $db->prepare("SELECT * FROM vendors");
					$result->execute();
					$rowcount = $result->rowcount();
				?>

				<ul class="nav navbar-nav" style="padding:10px">
					<li style="padding-right:15px"><button class="btn btn-success">Vendors <span class="badge"><?php echo $rowcount;?></span></button></li>
					<li style="padding-right:15px"><button class="btn btn-info" type="submit"><a rel="facebox" href="addvendor.php" style="color:white">Add Vendor</a></button></li>
				</ul>
			  
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

			<div style="width:auto;height:650px;line-height:3em;overflow:scroll;padding:5px;">
			<table class="table table-bordered table-hover table-responsive" style="background-color:#FEFEFE; color:black; text-align: left;">	
				<thead>
					<tr>
						<th> Vendor </th>
						<th> Contact</th>
						<th> Phone Number</th>
						<th> Address </th>
						<th> City </th>
						<th> Zip Code </th>
						<th> Comments</th>
						<th> Edit/Delete </th>
					</tr>
				</thead>
				<tbody>
					<?php
						$result = $db->prepare("SELECT * FROM vendors ORDER BY vendor_name");
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){
					?>
					<tr class="record">
					<td><?php echo $row['vendor_name']; ?></td>
					<td><?php echo $row['vendor_contact']; ?></td>
					<td><?php echo $row['vendor_number']; ?></td>
					<td><?php echo $row['vendor_address']; ?></td>
					<td><?php echo $row['vendor_city']; ?></td>
					<td><?php echo $row['vendor_zipcode']; ?></td>
					<td><?php echo $row['comment']; ?></td>
					<td>
					<a rel="facebox" href="editvendor.php?id=<?php echo $row['vendor_id']; ?>"><span class="glyphicon glyphicon-edit" style="color:black"></span></a>
					&nbsp <a href="#" id="<?php echo $row['vendor_id']; ?>" class="delbutton"><span class="glyphicon glyphicon-remove" style="color:black"></span></a>
					</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
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