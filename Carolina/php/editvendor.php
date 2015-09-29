<?php
include('connect.php');
$id=$_GET['id'];
$sth = $db->prepare("SELECT * FROM vendors WHERE vendor_id= :id");
$sth->bindParam(':id', $id);
$sth->execute();
for($i=0; $row = $sth->fetch(); $i++){
?>

<form action="updatevendor.php" method="post"> 
<input type="hidden" name="id" value="<?php echo $id; ?>" />
	<div class="form-horizontal" style="border:1px solid #CCCCCC; border-radius:1px; padding:10px; background-color:white" >
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Vendor's Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="name" value="<?php echo $row['vendor_name']; ?>">
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Contact</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="contact" value="<?php echo $row['vendor_contact']; ?>">
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Phone Number</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="number" value="<?php echo $row['vendor_number']; ?>">
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Address</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="address" value="<?php echo $row['vendor_address']; ?>">
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">City</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="city" value="<?php echo $row['vendor_city']; ?>">
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Zip Code</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="zipcode" value="<?php echo $row['vendor_zipcode']; ?>">
				</div>
		</div>
	  
		<div class="form-group">
			<label for="input" class="col-sm-4 control-label" style="color:black">Comments</label>
				<div class="col-sm-8">
					<textarea name="comment" style="width:210px"><?php echo $row['comment']; ?></textarea>
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