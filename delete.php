<?php
if(isset($_GET['type']))
{
 mysql_connect('localhost','root','') or die(mysql_error());//connection to the local host
 mysql_select_db('buymee') or die(mysql_error());// connection to the database

 $user_id=$_GET['type'];//user_id is captured 
 echo $user_id;
   $query=mysql_query("DELETE FROM userreg WHERE userid = '$user_id'") or die(mysql_error());
}
?>