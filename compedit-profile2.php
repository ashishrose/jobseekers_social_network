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
            echo '<a href="signup.html">pls register yourself</a>';
         }      
?>

<?php 
   require_once('includes/query-class.php');
   require_once('includes/insert-class.php');
   
   
   if ( !empty ( $_POST ) ) 
   {
      $update = @$insert->update_company($logged_user_id, $_POST);
   }
   
   $user = @$query->load_comp_object($logged_user_id);
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Edit Profile</title>
      <link rel="stylesheet" href="css/style.css" />
   </head>
   <body>
      <div id="navigation">
         <ul>
                <li><a href="welcome.php">Home</a></li>
                <li><a href="anotherpage.php"> Profile</a></li>
                <li><a href="compedit-profile.php">Edit Profile</a></li>
                <li><a href="comprequests.php">Requests</a></li>
                <li><a href="feed-view.php">View Feed</a></li>
                <li><a href="jobpost.php">Post Jobs</a></li>
                <li><a href="messages-inbox.php">Inbox</a></li>
                <li><a href="messages-compose.php">Compose</a></li>
            </ul>
      </div>
      <h1>Edit Profile</h1>
      <div class="content">
         <form method="post">
            <p>
               <label class="labels" for="name">Name:</label>
               <input name="name" type="text" value="<?php echo @$user->compname; ?>" />
            </p>
            <p>
               <label class="labels" for="name">Address:</label>
               <input name="address" type="text" value="<?php echo @$user->compaddrs; ?>" />
            </p>
            <p>
               <label class="labels" for="name">Company Type:</label>
               <input name="type" type="text" value="<?php echo @$user->comptype; ?>" />
            </p>
            <p>
               <label class="labels" for="password">Password:</label>
               <input name="password" type="password" value="<?php echo $user->cpassword; ?>" />
            </p>
            <p>
               <label class="labels" for="name">Vacancy:</label>
               <input name="vacancy" type="text" value="<?php echo @$user->vacancy; ?>" />
            </p>
            <p>
               <input type="submit" value="Submit" onkeydown="update_user()"/>
            </p>
         </form>
      </div>
   </body>
</html>