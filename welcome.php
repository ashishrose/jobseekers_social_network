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
          echo '<a href="index.php">pls register yourself</a>';
         }      
?>

<?php
  require_once('includes/query-class.php');
  require_once('includes/insert-class.php');


?>
<!DOCTYPE html>
<html>
<head>
	<title>buymee</title>
	<link rel="stylesheet" type="text/css" href="includes/style.css">
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
<style type="text/css">
  .box
  {
    background-color: #ffffff;
    height: 3000px;
  }
</style>
<div id="container">
	<div id="header">
	<h1>BUYMEE</h1>
		
	</div>
	<div id="content">
		<form id="search" name="search">
    		<input type="text" name="search_text" placeholder="search" onkeyup="findmatch();">
  	</form>
    <div id="results">
    </div>
  <?php if (!@empty($_GET['link']=='user') || @empty($_GET['link'])): ?><!--the block for the user-->
		<div class="menubar">
		<div id="nav">
			<ul>
        <li><a class="selected" href="welcome.php">Home</a></li>
        <li><a href="view-profile.php">View Profile</a></li>
        <li><a href="edit-profile.php">Edit Profile</a></li>
        <li><a href="friends-directory.php">Member Directory</a></li>
        <li><a href="friends-list.php">Friends List</a></li>
        <li><a href="feed-view.php">View Feed</a></li>
        <li><a href="feed-post.php">Post Status</a></li>
        <li><a href="messages-inbox.php">Inbox</a></li>
        <li><a href="messages-compose.php">Compose</a></li>
      </ul>
		</div>
		</div>
  <?php elseif (!empty($_GET['link']=='company')):?><!--the block for the company********************-->
    <div class="menubar">
    <div id="nav">
       <ul>
          <!--<li><a href="welcome.php">Home</a></li>-->
          <li><a href="anotherpage.php"> Profile</a></li>
          <li><a href="compedit-profile.php">Edit Profile</a></li>
          <li><a href="comprequests.php">Requests</a></li>
          
          <li><a href="jobpost.php">Post Jobs</a></li>
          
      </ul>
    </div>
    </div>
  <?php endif;?>
		<div id="main">
			<div class="box" id="boxes" >
      			<!--news feeds-->
            <?php if(!@empty($_GET['link']=='admin')):?>
              <p>USERS</p>
            <?php @$query->do_users_directory(); ?>
              <p>EMPLOYER</p>
            <?php @$query->do_company_directory(); ?>
           <?php endif;?>
      		</div>
			
		</div>
	</div>
	<div id="footer">
		Copyright &copy; 2017 Team Buymee
	</div>
	
</div>
</body>
</html>