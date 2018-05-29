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
  
  //$logged_user_id = 1;
  
  if ( !empty ( $_POST ) ) 
  {
    $send_message = @$insert->send_message($_POST);
  }
  
  $friend_ids = @$query->get_friends($logged_user_id);
  
  foreach ( $friend_ids as $friend_id ) 
  {
    $friend_objects[] = @$query->load_user_object($friend_id);
  }
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
        <h1>Compose Message</h1>
        <form method="post">
        <input name="message_time" type="hidden" value="<?php echo time(); ?>" />
        <input name="message_sender_id" type="hidden" value="<?php echo $logged_user_id; ?>" />
        <p>
          <label for="message_recipient_id">To:</label>
          <select name="message_recipient_id">
            <option value="">--Select a Friend--</option>
            <?php foreach ( $friend_objects as $friend ) : ?>
              <option value="<?php echo $friend->userid; ?>"><?php echo $friend->name; ?></option>
            <?php endforeach; ?>
          </select>
        </p>
        <p>
          <label class="labels" for="message_subject">Subject:</label>
          <input name="message_subject" type="text" />
        </p>
        <p>
          <label for="message_content">Message:</label>
          <textarea name="message_content"></textarea>
        </p>
        <p>
          <input type="submit" value="Submit" />
        </p>
      </form>
    </div>
  </div>
  <div id="footer">
    Copyright &copy; 2017 Team Buymee
  </div>
  
</div>
</body>
</html>