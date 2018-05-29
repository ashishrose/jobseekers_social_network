<?php
	session_start();
	$logged_user_id=$_SESSION['name'];
?>



<?php
if (isset($_GET['search_text'])) //here the searched text is not exactly the same 
{
	$search_text = $_GET['search_text'];
	//$search_text = mysql_real_escape_string($search_text);//to avoid sql injection
}

if (!empty($search_text)) 
{

	if($db1 = new PDO('mysql:host=localhost;dbname=buymee;charset=utf8mb4', 'root', ''))
	{
		if(1)
		{
			$query= "SELECT compname,compid FROM compreg where (`compname`LIKE '".$search_text."%')";
			$query_run = $db1->query($query);

			/*if($query_run== false)
			{
				$query= "SELECT name,userid FROM userreg where (`name`LIKE '".$search_text."%')";
			$query_run = @mysql_query($query);
			}*/
			while ($query_row = $query_run->fetch(PDO::FETCH_ASSOC))//****
			{
				echo $name =  '<a href="anotherpage.php?link='.$query_row['compid'].'">'.$query_row['compname'].'</a><br>';
			}
		}
		else
		{
			echo 'database connection failed';
		}
	}
	else
	{
		echo 'connection fail';
	}
	
}

?>