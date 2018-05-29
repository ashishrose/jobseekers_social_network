<?php     
         session_start();
         @$logged_user_id=$_SESSION['name']; // here the name is the name value of the input from the loginpage.php
         if($logged_user_id==true)
         {
         echo'welcome :'. $logged_user_id.'<br>';
         echo'<a href="signout.php">Signout</a>';
         }
         else
         {
          echo'welcome :Guest<br>';
          echo '<a href="signup.html">pls register yourself</a>';
         }      
?>

<?php
  require_once('includes/insert-class.php');
  require_once('includes/query-class.php');
  
  //$logged_user_id = 2;
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
    <div class="menubar">
    <div id="nav">
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
    </div>
    <div id="main">
      <div class="box" id="boxes" >
        <h1>Inbox</h1>
        <?php @$query->do_inbox($logged_user_id); ?>
    </div>
  </div>
  <div id="footer">
    Copyright &copy; 2017 Team Buymee
  </div>
  
</div>
</body>
</html>