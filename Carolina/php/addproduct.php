<?php include('connect.php'); ?>

<form action="saveproduct.php" method="post" id="myForm"> 
<div class="form-horizontal" style="border:1px solid #CCCCCC; border-radius:1px; padding:10px; background-color:white" >
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Product Name</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="name">
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Brand Name</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="brand">
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Vendor</label>
			<div class="col-sm-8">
				<select name="vendor"  class="form-control" >
					<option></option>
					<?php
						$vendors = $db->prepare("SELECT * FROM vendors");
						$vendors->execute();
						for($i=0; $row = $vendors->fetch(); $i++){
					?>
						<option><?php echo $row['vendor_name']; ?></option>
					<?php
					}
					?>
				</select>
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Category</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="category">
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Arrival Date</label>
			<div class="col-sm-8">
				<input type="date" class="form-control" name="arrival" >
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Expiration Date</label>
			<div class="col-sm-8">
				<input type="date" class="form-control" name="expiration">
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Unit Price</label>
			<div class="col-sm-8">
				<input type="text" id="unitprice" class="form-control" name="unit_price" onkeyup="sum();">
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Selling Price</label>
			<div class="col-sm-8">
				<input type="text" id="price" class="form-control" name="price" onkeyup="sum();">
			</div>
	</div>
  
	<div class="form-group" style="margin:auto">
		<div class="col-sm-8">
			<input type="hidden" id="profit" class="form-control" name="profit" readonly>
		</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Quantity</label>
			<div class="col-sm-8">
				<input type="number" class="form-control" id="qty" onkeyup="sum();"  name="qty">
				<input type="hidden" style="width:265px; height:30px;" id="qtysold" name="qty_sold" Required >
			</div>
	</div>
  
	<div style="padding-left:80px">
		<button class="btn btn-info" style="width:150px; color:white">Add</button>
		&nbsp &nbsp &nbsp <button class="btn btn-danger" style="width:150px; color:white" onclick="myFunction();"> Clear </button>
	</div>

<script>
function myFunction() {
    document.getElementById("myForm").reset();
}
</script>

</div>
</form>