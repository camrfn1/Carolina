<?php include('connect.php'); ?>

<div class="content" id="content">
	<table class="table table-bordered table-hover table-responsive" style="text-align:left; background-color:white">	
		<thead>
			<tr>
				<th width="33%"> Sales Date</th>
				<th width="33%"> Total Sales </th>
				<th width="33%"> Profit </th>
			</tr>
		</thead>
		
		<tbody>
			<?php
				$result = $db->prepare("SELECT * FROM sales ORDER BY date DESC LIMIT 7");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['date']; ?></td>
			<td><?php
			$totalamount=$row['amount'];
			echo '$'.number_format((float)$totalamount, 2, '.', '');
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
				<th><strong>Totals</strong></th>
				<th><strong>
				<?php 
					$results = $db->prepare("SELECT sum(amount) FROM sales ORDER BY date DESC LIMIT 7");
					$results->execute();
					for($i=0; $rows = $results->fetch(); $i++){
					$totalsales=$rows['sum(amount)'];
					echo '$'.number_format((float)$totalsales, 2, '.', '');}
				?></strong></th>
				<th><strong>
				<?php 
					$results = $db->prepare("SELECT sum(profit) FROM sales ORDER BY date DESC LIMIT 7");
					$results->execute();
					for($i=0; $rows = $results->fetch(); $i++){
					$totalprofit=$rows['sum(profit)'];
					echo '$'.number_format((float)$totalprofit, 2, '.', '');}
				?></strong></th>
			</tr>
		</thead>
	</table>
</div>
