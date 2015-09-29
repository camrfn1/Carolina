<?php
class database
{

	//connect to the database
	protected function connect(){
		
		$servername		= 'localhost';
		$username		= 'root';
		$password		= '';
		$database		= 'inventorysol';
				
		$db=null;
		try{
			$db = new PDO('mysql:host='.$servername.';dbname='.$database, $username, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
		return $db;
	}
	
	//returns the query of a select
	public function getQuery($sql)
	{
		$db=$this->connect();
		
		$query=$db->prepare($sql);
		$query->execute();
		
		$db=$this->disconnect();
		
		return $query;
	}
	
	//prepares insert statement, binds the parameters, and inserts into the database. Returns the number of rows affected. If affected rows is 0, then insert failed
	public function insertRec($sql, $parameterValue, $count)
	{
		$db=$this->connect();
		$start=0;
		$stm=$db->prepare($sql);
		//echo $sql;
		for($i=0; $i<$count; $i++)
		{
		//	echo "Start index parameter ".$start." Value: ".$parameters[$start]." inserted value: ".$parameterValue[$i]." <br>";
			$stm->bindValue(($i+1), $parameterValue[$i]);
		
		}
				
		$stm->execute();
		
		$affected_rows = $stm->rowCount();
		
		$db=$this->disconnect($db);
		$stm=null;
		
		return $affected_rows;
	}
	
	
	
	//disconnect from the database
	protected function disconnect($db)
	{
		$db=null;
	}

}

?>