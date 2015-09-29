<?php
include('connect.php');
$id=$_GET['id'];
$sth = $db->prepare("SELECT * FROM products WHERE product_id= :id");
$sth->bindParam(':id', $id);
$sth->execute();
for($i=0; $row = $sth->fetch(); $i++){
?>

<form action="updateproduct.php" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
	<div class="form-horizontal" style="border:1px solid #CCCCCC; border-radius:1px; padding:10px; background-color:white" >
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Product Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="name" value="<?php echo $row['product_name']; ?>" Required/>
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Brand Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="brand" value="<?php echo $row['brand_name']; ?>" />
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Category</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" name="category" value="<?php echo $row['product_category']; ?>" />
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Vendor</label>
				<div class="col-sm-8">
					<select class="form-control" name="vendor">
						<option><?php echo $row['vendor']; ?></option>
						<?php
							$vendors = $db->prepare("SELECT * FROM vendors");
							$vendors->execute();
							for($i=0; $rows = $vendors->fetch(); $i++){
						?>
							<option><?php echo $rows['vendor_name']; ?></option>
						<?php
						}
						?>
					</select>
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Arrival Date</label>
				<div class="col-sm-8">
					<input type="date" class="form-control" name="arrival" value="<?php echo $row['arrival']; ?>" />
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Expiration Date</label>
				<div class="col-sm-8">
					<input type="date" class="form-control" name="expiration" value="<?php echo $row['expiration']; ?>" />
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Unit Price</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="unitprice" name="unit_price" value="<?php echo $row['unit_price']; ?>" onkeyup="sum();" Required/>
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Selling Price</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" onkeyup="sum();" Required/>
			</div>
		</div>
	  
		<div class="form-group" style="margin:auto">
			<div class="col-sm-8">
				<input type="hidden" class="form-control" id="profit" class="form-control" name="profit" value="<?php echo $row['profit']; ?>" readonly />
			</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Quantity</label>
				<div class="col-sm-8">
					<input type="number" class="form-control" name="qty" value="<?php echo $row['qty']; ?>" />
					<input type="hidden" class="form-control" name="qty_sold" value="<?php echo $row['qty_sold']; ?>" />
			</div>
		</div>
	  
		<div style="padding-left:80px">
			<button class="btn btn-info" style="width:200px; color:white">Update</button>
		</div>
	</div>
</form>
<?php
}
?>