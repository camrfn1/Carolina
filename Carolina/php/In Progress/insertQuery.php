<?php
	include_once("dB.php");
	
	//values of all inserted items
	$parameterValue=$_GET['rowArray'];
		
	$parameterV=explode(",", $parameterValue);

	//table to insert to
	$table=$_GET['tableSelect'];
	
	
	//total number of inserted rows
	$recordCount=$_GET['totalInserts'];
	
	
	
	$insertInstance= new insert();
	$result=$insertInstance->insertVal($table, $recordCount, $parameterV);
	if ($result!= -1)
	{
		echo "Successfully inserted ".$result." records";
	}
	
	class insert{
	//create instance of database class to access insert method
	//create start of insert statement and end of statement by 
	public function insertVal($table, $recordCount, $parameterValue)
	{
	
		$insertTable=$this->FindTableKey($table);
		if($insertTable!=-1)
		{
			$beginningStatement="INSERT INTO ".$insertTable;
			$tableColumnKey=$this->getTableColumnKey();
			$beginningStatement=$beginningStatement." ".$tableColumnKey[$insertTable]." VALUES ";
			$endStatement=$this->appendInsert($insertTable,$recordCount);
			$sql=$beginningStatement." ".$endStatement;
			
			//get binding parameters
			$tableParam=$this->getTableColumnPrepareKey();
			$allParameters=$tableParam[$insertTable];
			
			//remove paranthese
			$allParameters=substr($allParameters,1,-1);
			//remove commas and store column names in an array used for argument in pdo bind
			$parameterKeys=explode(",",$allParameters);
			$parameters=$parameterKeys;
			
			
			$tableColumnTotal=$this->getColumnTotals();
			//used to iterate through the bind keys
			$count=$tableColumnTotal[$insertTable];
			
			$j=0;
			$totalparam=$count*$recordCount;
		
			
			//foreach($parameters as $key)
			//{
				//echo $key."<br>";
			//}
		
			$dbObj= new database();
		
			$result=$dbObj->insertRec($sql, $parameterValue, $totalparam);
			return $result;
		}
		return -1;
	}

	//iterates thorugh array of tableCheck for match
	//if match found variable $returnTable is set to the corresponding $tableCheckKey array value
	//else returns -1
	protected function FindTableKey($table)
	{
		$tableCheck=$this->getTableCheck();
		for($i=0; $i<count($tableCheck); $i++)
		{
			if($table===$tableCheck[$i])
			{
				$tableCheckKey=$this->getTableCheckKey();
				$returnTable=$tableCheckKey[$i];
				return $returnTable;
			}
		}
		return -1;
	}
	//forms the end of the insert query for preparing the statement in the form "(:X,:X,:X), (:X,:X,:X)......"
	//uses the array $tableColumnPrepareKey
	//returns string $appendInsert to append as the end of the query for the insert
	protected function appendInsert($insertTable,$recordCount)
	{
		$appendInsert="";
		$tableColumnPrepareKey=$this->getTableColumnPrepareKey();
		for($i=0; $i<$recordCount; $i++)
		{
			$appendInsert=$appendInsert.$tableColumnPrepareKey[$insertTable];
			if($i<($recordCount-1))
			{
				$appendInsert=$appendInsert.", ";
			}
		}
		return $appendInsert;
	}
	//returns possible values from from hidden input tblname
	protected function getTableCheck()
	{
		$tableCheck=array(
		"use",
		"prod",
		"vend",
		"sale",
		"saleo"	
		);
		return $tableCheck;
	}
	//corresponding database table names to the keys of $tableCheck
	protected function getTableCheckKey()
	{
		$tableCheckKey=array(
		"users",
		"products",
		"vendors",
		"sales",
		"sales_order"
		);
		return $tableCheckKey;
	}
	//corresponding column names for start of insert
	protected function getTableColumnKey()
	{
		$tableColumnKey=array(
		"users"=>"(id, firstname, lastname, username, password)",
		"products"=>"(product_id, product_name, brand_name, product_category, unit_price, price, profit, vendor, qty, qty_sold, expiration, arrival)",
		"vendors"=>"(vendor_id, vendor_name, vendor_address, vendor_city, vendor_zipcode, vendor_contact, vendor_number, comment)",
		"sales"=>"(transaction_id, invoice_number, date, amount, profit, amount_due)",
		"sales_order"=>"(transaction_id, invoice, product_id, qty, amount, profit, product_name, brand_name, name, price, date)"
		);
		return $tableColumnKey;
	}
	//corresponding column names to each table for insert
	protected function getTableColumnPrepareKey()
	{
		$tableColumnPrepareKey=array(
		"users"=>"(?,?,?,?,?)",
		"products"=>"(?,?,?,?,?,?,?,?,?,?,?,?)",
		"vendors"=>"(?,?,?,?,?,?,?,?)",
		"sales"=>"(?,?,?,?,?,?)",
		"sales_order"=>"(?,?,?,?,?,?,?,?,?,?,?)"
		);
		return $tableColumnPrepareKey;
	}
	//column count for each table
	protected function getColumnTotals()
	{
		$tableColumnTotal=array(
		"users"=>5,
		"products"=>12,
		"vendors"=>8,
		"sales"=>6,
		"sales_order"=>11);
		return $tableColumnTotal;
	}
	
	
	}

?>