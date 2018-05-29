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
      $add = @$insert->add_accept($_GET['uid'],$logged_user_id);
   }
   elseif ($_POST['type'] == 'withheld') 
   {
      $withheld = @$insert->withheld_accept($_GET['uid'],$logged_user_id);
   }
   elseif($_POST['type'] == 'delete')
   {
      $delete = @$insert->delete_accept($_GET['uid'],$logged_user_id);
   }
   header('location:comprequests.php');
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
                <li><a href="anotherpage.php"> Profile</a></li>
                <li><a href="compedit-profile.php">Edit Profile</a></li>
                <li><a href="comprequests.php">Requests</a></li>
                <li><a href="jobpost.php">Post Jobs</a></li>
            </ul>
    </div>
    </div>
    <div id="main">
      <div class="box" id="boxes" >
        <h1>Custom Profile View</h1>
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
  </div>
  <div id="footer">
    Copyright &copy; 2017 Team Buymee
  </div>
  
</div>
</body>
</html>