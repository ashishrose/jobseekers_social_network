<?php
	if ( !class_exists ('DB') ) 
	{
		class DB 
		{
			public function __construct() 
			{
				$mysqli = new mysqli('localhost', 'root', '', 'buymee');
				//echo '</br>connection is established to buymee';
				
				if ($mysqli->connect_errno) 
				{
					printf("Connect failed %s\n", $mysqli->connect_error);
					exit();
				}
				
				$this->connection =  $mysqli;
			}
			
			public function insert($query) 
			{		
			//echo '</br>insert from db class is called';	
				$result = $this->connection->query($query);
				
				return $result;
			}
			
			public function update($query) 
			{
				$result = $this->connection->query($query);
				
				return $result;
			}
			
			public function select($query) 
			{
			//echo '</br>select from db class is called';						
				$result = $this->connection->query($query);
				
				if ( !$result ) 
				{
					//echo 'result is false';
					return false;
				}
				
				while ( $obj = $result->fetch_object() ) 
				{
					$results[] = $obj;
					//echo 'objects are being fetched';
				}
				
				return @$results ;
			}
		}
	}
	
	$db = new DB;
?>