<?php
if(isset($_POST['cid']))
{
$name=$_POST['cname'];
$comid=$_POST['cid'];
$address=$_POST['add'];
$type=$_POST['typ'];
$password=$_POST['pwd'];
$vacancy=$_POST['vacancy'];

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'buymee');

$q="insert into compreg (compname,compid,compaddrs,comptype,cpassword,vacancy,flag) values ('$name','$comid','$address','$type','$password','$vacancy','company')";

$i=mysqli_query($con,$q);
echo $i;
mysqli_close($con);
}
?>