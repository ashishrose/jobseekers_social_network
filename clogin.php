<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
	<h1>Company Login<h1>
	<form action='#' method='post'>
		<table>
		<tr>
			<td>Company ID:</td>
			<td><input type='text' name='name'/></td>
		</tr>	
		<tr>
			<td>Password:</td>
			<td><input type='password' name='pwd'/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' name='submit' value='Submit'/></td>
		</tr>
		</table>
	</form>

<?php
session_start();
if(isset($_POST['submit']))
{
 mysql_connect('localhost','root','') or die(mysql_error());//connection to the local host
 mysql_select_db('buymee') or die(mysql_error());// connection to the database

 $name=$_POST['name'];//name is captured 
 $pwd=$_POST['pwd'];//password is captured

 if($name!=''&&$pwd!='')//if name and the password fields are not empty
 {
   $query=mysql_query("select * from compreg where compid='".$name."' and cpassword='".$pwd."'") or die(mysql_error());

   $res=mysql_fetch_row($query);//whole of the selected row is fetched as an array
   if($res)//if the data is fetched
   {
    $_SESSION['name']=$name;
    header('location:com_welcome.php');
   }
   else
   {
    echo'You entered username or password is incorrect';
   }
 }
 else // if both the fields are empty
 {
  echo'Enter both username and password';
 }
}
?>
<a href="comsignup.html">Are you a new user ?</a>
</body>
</html>