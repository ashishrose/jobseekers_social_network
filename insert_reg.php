<?php
if(isset($_POST['userid']))
{
$name=$_POST['name'];
$userid=$_POST['userid'];
$dob=$_POST['dob'].":00";
$address=$_POST['address'];
$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$file=$_POST['file'];

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'buymee');

$q="insert into userreg (name,userid,dob,addrs,email,password,gender,file,flag) values ('$name','$userid','$dob','$address','$email','$password','$gender','$file','user')";
//$q="insert into userreg (name,userid,dob) values ('$name','$userid','$dob')";
/*$q="insert into userreg (name,userid,address,email,gender,password,file) values ('$name','$userid','$address','$email','$gender','$password','$file')";*/

$i=mysqli_query($con,$q);
echo $i;
header('location:loginpage.php');
mysqli_close($con);
}
?>