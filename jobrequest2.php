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
         echo $_GET['uid'];
?>

<?php 
   require_once('includes/query-class.php');
   require_once('includes/insert-class.php');



   if ( !empty ( $_POST ) ) 
   {
      if ( $_POST['type'] == 'add' ) 
      {
         $add_friend = @$insert->add_request($_POST['compid'], $_POST['userid']);
      }
   }


   if(!empty($_GET['uid']))
   {
      $jobid = $_GET['uid'];
      $job = $query->load_job_list($jobid); 
   }
?>



<!DOCTYPE html>
<html>
   <head>
      <title>Home</title>
      <link rel="stylesheet" href="css/style.css" />
   </head>
   <body>
      </div>
      <h1>View Profile</h1>
      <div class="content">
         <p>JobID: <?php echo $job->jobid; ?></p>
         <p>Jobtype: <?php echo $job->jobtype; ?></p>
         <p>Compid: <?php echo $job->compid; ?></p>
         <p>Vacancy: <?php echo $job->vacancy; ?></p>
         <p>Salary: <?php echo $job->salary; ?></p>


         <?php echo $job->compid;?>

         <p>
            <form method="post">
               <input name="compid" type="hidden" value="<?php echo $job->compid; ?>" />
               <input name="userid" type="hidden" value="<?php echo $logged_user_id; ?>" />
              <!-- <input name="compid" type="hidden" value="<?php //echo $job->jobid; ?>" />-->
               <input name="type" type="hidden" value="add" />
               <input type="submit" value="Job Request" />
            </form>
         </p>
      </div>
   </body>
</html>