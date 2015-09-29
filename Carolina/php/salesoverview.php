<?php include('connect.php'); ?>

<div>
	<table class="table table-bordered table-hover table-responsive" style="background-color:#FEFEFE; color:black; text-align: left;">
		<thead>
			<tr style="background:#3A3A3A; color:white">
				<th width="25%"> Invoice Number </th>
				<th width="25%"> Invoice Date </th>
				<th width="25%"> Total Sales </th>
				<th width="25%"> Profit </th>
			</tr>
		</thead>
			
		<tbody>
			<?php
				$result = $db->prepare("SELECT * FROM sales ORDER BY date DESC LIMIT 5");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><strong><?php echo $row['invoice_number']; ?></strong></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php
					$sales=$row['amount'];
					echo '$'.number_format((float)$sales, 2, '.', '');
			?></td>
			<td><?php
					$profit=$row['profit'];
					echo '$'.number_format((float)$profit, 2, '.', '');
			?></td>
			<?php
				}
			?>
		</tbody>
	</table>
</div>