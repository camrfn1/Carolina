<?php include('connect.php'); ?>

<div style="width:auto;height:456px;line-height:3em;overflow:scroll;padding:5px;">
	<table class="table table-bordered table-hover table-responsive" style="background-color:#FEFEFE; color:black; text-align: left;">					
		<thead>
			<tr>
				<th> Product Name </th>
				<th> Category</th>
				<th> Vendor </th>
				<th> Arrival Date</th>
				<th> Expiration Date </th>
				<th> Unit Price </th>
				<th> Selling Price </th>
				<th> Total Quantity</th>
				<th> Remaining Quantity </th>
			</tr>
		</thead>
			
		<!-- populates the table with desired values -->	
		<?php
				$sth = $db->prepare("SELECT *, price * qty as total FROM products ORDER BY qty");
				$sth->execute();
				for($i=0; $row = $sth->fetch(); $i++){
				$total=$row['total'];
				$availableqty=$row['qty'];
				
				if ($availableqty < 10 && $availableqty > 0) {
				echo '<tr style="color: #fff; background:#f0ad4e">';
				}
				else if($availableqty == 0){
				echo '<tr style="color: #fff; background:#d9534f">';
				}
				else {
				echo '<tr>';
				}
		?>
				<td><?php echo $row['product_name']; ?></td>
				<td><?php echo $row['product_category']; ?></td>
				<td><?php echo $row['vendor']; ?></td>
				<td><?php echo $row['arrival']; ?></td>
				<td><?php echo $row['expiration']; ?></td>
				<td><?php
						$oprice=$row['unit_price'];
						echo '$'.$oprice;
						?></td>
				<td><?php
						$pprice=$row['price'];
						echo '$'.$pprice;
						?></td>
				<td><?php echo $row['qty_sold']; ?></td>
				<td><strong><?php echo $row['qty']; ?></strong></td>			
					</tr>
					<?php } ?>
	</table>
</div>