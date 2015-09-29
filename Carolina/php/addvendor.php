<form action="savevendor.php" method="post" id="myForm"> 

<div class="form-horizontal" style="border:1px solid #CCCCCC; border-radius:1px; padding:10px; background-color:white" >
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Vendor's Name</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="name">
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Contact</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="contact">
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Phone Number</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="number">
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Address</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="address" >
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">City</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="city">
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Zip Code</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="zipcode">
			</div>
	</div>
  
	<div class="form-group">
		<label for="input" class="col-sm-4 control-label" style="color:black">Comments</label>
			<div class="col-sm-8">
				<textarea name="comment" style="width:210px"></textarea>
			</div>
	</div>
  
	<div style="padding-left:80px">
		<button class="btn btn-success" style="width:100px; color:white">Add</button>
		<button class="btn btn-danger" style="width:100px; color:white" onclick="myFunction();"> Clear </button>
	</div>

<script>
function myFunction() {
    document.getElementById("myForm").reset();
}
</script>

</div>
</form>