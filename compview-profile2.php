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
   require_once('includes/query-class.php');
   require_once('includes/insert-class.php');



   $user = @$query->load_user_object($_GET['uid']);
   $res_user = @$query->load_user_resume($_GET['uid']);
?>



<?php
if ( !empty ( $_POST ) )
{
   if ( $_POST['type'] == 'accept' ) 
   {
      $add = @$insert->add_accept($_GET['uid']);
   }
   elseif ($_POST['type'] == 'withheld') 
   {
      $withheld = @$insert->withheld_accept($_GET['uid']);
   }
   elseif($_POST['type'] == 'delete')
   {
      $delete = @$insert->delete_accept($_GET['uid']);
   }
   header('location:comprequests.php');
}


?>


<!DOCTYPE html>
<html>
   <head>
      <title>Home</title>
      <link rel="stylesheet" href="css/style.css" />
   </head>
   <body>

      <h1>Custom Profile View</h1>
      <div class="content">
         <p>Name: <?php echo $user->name; ?></p>
         <p>UserID: <?php echo $user->userid; ?></p>
         <p>Date Of Birth: <?php echo $user->dob; ?></p>
         <p>Address: <?php echo $user->addrs; ?></p>
         <p>Email Address: <?php echo $user->email; ?></p>
         <p>Gender: <?php echo $user->gender; ?></p>

         <p>Workexperience: <?php echo $res_user->workexp; ?></p>
         <p>Skillset: <?php echo $res_user->skill; ?></p>
         <p>Education: <?php echo $res_user->education; ?></p>
         <p>PersonalInfo: <?php echo $res_user->personalinfo; ?></p>
         <p>References: <?php echo $res_user->ref; ?></p>
         <form method ="post">
         <input type="hidden" name="type" value="accept">
         <input type="submit" name="accept" value="ACCEPT">
         </form>

         <form method ="post">
         <input type="hidden" name="type" value="withheld">
         <input type="submit" name="withheld" value="WITHHELD" >
         </form>

         <form method ="post">
         <input type="hidden" name="type" value="delete">
         <input type="submit" name="delete" value="DELETE" >
         </form>


      </div>
   </body>
</html>