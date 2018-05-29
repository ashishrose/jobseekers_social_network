<?php     
         session_start();
         @$logged_user_id=$_SESSION['name']; 
         if($logged_user_id==true)
         {
         echo'welcome :'. $logged_user_id.'<br>';
         echo'<a href="signout.php">Signout</a>';
         }
         else
         {
            echo'welcome :Guest<br>';
            echo '<a href="loginpage.php">pls login</a>';
         }      
?>
<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
 <!-- java script for searching-->
<script type="text/javascript">
   function findmatch()
   {
      if(window.XMLHttpRequest)
      {
         xmlhttp = new XMLHttpRequest();
      }
      else
      {
         xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
      }
      xmlhttp.onreadystatechange = function()
      {
         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
         {
            document.getElementById('results').innerHTML = xmlhttp.responseText;
         }
      }
      xmlhttp.open('GET', 'search.php?search_text='+document.search.search_text.value, true);

      xmlhttp.send();
   }
</script>
</head>
<body>
<a href="signup.html">SIGNUP</a>
<a href="loginpage.php">LOGIN</a>
<!--<a href="welcome.php">WELCOME</a>-->
<a href="comsignup.html">COMPANYSIGNUP</a>

<form id="search" name="search">
	<input type="text" name="search_text" placeholder="search" onkeyup="findmatch();">
</form>

<div id="results">
</div>
<h1 align="center">BUYMEE NEWS PORTAL</h1>
<div class="box" align="center">
<u><b>NEWS</b></u>
<!--<br/>
<marquee direction="up">
<b> IoT and Smart Home Tech.</b>
<br/>
We’ve been hearing about the forthcoming revolution of the Internet-of-Things (IoT) and resulting interconnectedness of smart home technology for years. So what’s the holdup? Why aren’t we all living in smart, connected homes by now? Part of the problem is too much competition, with not enough collaboration—there are tons of individual appliances and apps on the market, but few solutions to tie everything together into a single, seamless user experience.
</br>
<b>AR and VR.</b>
<br/>
We’ve already seen some major steps forward for augmented reality (AR) and virtual reality (VR) technology in 2016. Oculus Rift was released, to positive reception, and thousands of VR apps and games followed. We also saw Pokémon Go, an AR game, explode with over 100 million downloads. The market is ready for AR and VR, and we’ve already got some early-stage devices and tech for these applications, but it’s going to be next year before we see things really take off.
</marquee>-->
</div>
</body>
</html>