<?php
if(isset($_POST['userid']))
{
$userid=$_POST['userid'];
$workexperience=$_POST['workexperience'];
$skills=$_POST['skills'];
$education=$_POST['education'];
$personal=$_POST['personal'];
$references=$_POST['references'];

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'buymee');

$q="insert into resume_info (userid,workexp,skill,education,personalinfo,ref) values ('$userid','$workexperience','$skills','$education','$personal','$references')";

$i=mysqli_query($con,$q);
echo $i;
header('location:loginpage.php');
mysqli_close($con);
}
?>