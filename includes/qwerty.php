<?php
	if ( !class_exists ('DB') ) // to check whether a class is does NOT exists or not
	{
		class DB 
		{
			public function __construct() 
			{
				// $mysqli = new mysqli('localhost', 'root', '', 'buymee');
                $pdo = new PDO("mysql:host=localhost;dbname=buymee", 'root', '');
				//echo '</br>connection is established to buymee';
				
				if ($pdo == false)
				{
					printf("Connect failed %s\n");
					exit();
				}
				
				$this->connection =  $pdo;
			}
			
			public function insert($query)  // for inserting a query
			{		
			//echo '</br>insert from db class is called';	
				$result = $this->connection->query($query);
				
				return $result;
			}
			
			public function update($query)  // for execution of updating a query
			{
				$result = $this->connection->query($query);
				
				return $result;
			}
			
			public function select($query)  // for selecting a query
			{
			//echo '</br>select from db class is called';						
				$result = $this->connection->query($query);
				
				if ( !$result ) 
				{
					//echo 'result is false';
					return false;
				}
				
				while ( $obj = $result->fetch(PDO::FETCH_ASSOC) ) 
				{
					$results[] = $obj;
					//echo 'objects are being fetched';
				}
				
				return @$results ;
			}
		}
	}
	
	$db = new DB; // call of the class takes place
?>