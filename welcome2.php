
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
          echo '<a href="loginpage.php">pls register yourself</a>';
         }      
?>

<?php
  require_once('includes/query-class.php');
  require_once('includes/insert-class.php');


?>
<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>

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
<?php if (!empty($_GET['link']=='user') || empty($_GET['link'])): ?><!--the block for the user-->
  <div id="navigation">
              <ul>
                <li><a href="welcome.php">Home</a></li>
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
  <form id="search" name="search">
    <input type="text" name="search_text" placeholder="search" onkeyup="findmatch();">
  </form>

<?php elseif (!empty($_GET['link']=='company')):?><!--the block for the company********************-->

  <div id="navigation">
              <ul>
                <!--<li><a href="welcome.php">Home</a></li>-->
                <li><a href="anotherpage.php"> Profile</a></li>
                <li><a href="compedit-profile.php">Edit Profile</a></li>
                <li><a href="comprequests.php">Requests</a></li>
                <li><a href="feed-view.php">View Feed</a></li>
                <li><a href="jobpost.php">Post Jobs</a></li>
                <li><a href="messages-inbox.php">Inbox</a></li>
                <li><a href="messages-compose.php">Compose</a></li>
            </ul>
        </div>
  <form id="search" name="search">
    <input type="text" name="search_text" placeholder="search" onkeyup="findmatch();">
  </form>
<?php endif;?>

<div id="results">
</div>
</body>
</html>