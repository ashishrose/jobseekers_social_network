<!DOCTYPE html>
<html>
<head>
  <title>buymee</title>
  <link rel="stylesheet" type="text/css" href="includes/style.css">
</head>
<body>
<div id="container">
  <div id="header">
  <h1>BUYMEE</h1>
    
  </div>
  <div id="content">
    <div class="menubar">
    <div id="nav">
    </div>
    </div>
    <div id="main">
      <div class="box" id="boxes" >
        <h1>LOGIN</h1>
        <form action='#' method='post'>
        <table>
        <tr>
        <td>User name:</td>
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
            <a href="signup.html">Are you a new user ?</a>
      </form>  
<?php
session_start();
if(isset($_POST['submit']))
{
 /*mysql_connect('localhost','root','') or die(mysql_error());//connection to the local host
 mysql_select_db('buymee') or die(mysql_error());// connection to the database*/
$db1 = new PDO('mysql:host=localhost;dbname=buymee;charset=utf8mb4', 'root', '');

 $name=$_POST['name'];//name is captured 
 $pwd=$_POST['pwd'];//password is captured

 if($name!=''&&$pwd!='')//if name and the password fields are not empty
 {
   //$query=db1->query("select userid, flag from userreg where userid='".$name."' and password='".$pwd."' UNION select compid, flag from compreg where compid='".$name."' and cpassword='".$pwd."'UNION select username, password from admin where username='".$name."' and password= '".$pwd."'");
     
 $query=$db1->query("select userid, flag from userreg where userid='".$name."' and password='".$pwd."' UNION select compid, flag from compreg where compid='".$name."' and cpassword='".$pwd."'UNION select username, password from admin where username='".$name."' and password= '".$pwd."'");


   //$res=mysql_fetch_assoc($query);//whole of the selected row is fetched as an array
     $res = $query->fetch(PDO::FETCH_ASSOC);
   if($res)//if the data is fetched (the data will be fetched only when the entered value matchs with the value in the database)
   {
    $_SESSION['name']=$name;
    header('location:welcome.php?link='.$res['flag'].'');
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
    </div>
  </div>
  <div id="footer">
    Copyright &copy; 2017 Team Buymee
  </div>
  
</div>
</body>
</html>