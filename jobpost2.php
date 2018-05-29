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
   require_once('includes/db-class.php');
   
   
   if ( !empty ( $_POST ) ) 
   {
      $update = $insert->update_joblist($logged_user_id, $_POST);
   }
   
   //$user = @$query->load_jobpost_object($logged_user_id);
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
      <h1>POST JOBS</h1>
      <div class="content">
         <form method="POST">
            <p>
               <label class="labels" for="name" >JOBID:</label>
               <input name="jobid" type="text" value="" />
            </p>
            <p>
               <label class="labels" for="name" >JOBTYPE:</label>
               <input name="jobtype" type="text" value="" />
            </p>
            <p>
               <label class="labels" for="name" >COMPANYID:</label>
               <input name="compid" type="text" value="<?php echo $logged_user_id;?>" />
            </p>
            <p>
               <label class="labels" for="name" >JOB VACANCY:</label>
               <input name="vacancy" type="text" value="" />
            </p>
            <p>
               <label class="labels" for="name" >SALARY:</label>
               <input name="salary" type="text" value="" />
            </p>
            <p>
               <input type="submit" value="Submit"/>
            </p>
         </form>
      </div>
   </body>
</html>