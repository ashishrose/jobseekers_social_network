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
        <h1>POST JOBS</h1>
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
  </div>
  <div id="footer">
    Copyright &copy; 2017 Team Buymee
  </div>
  
</div>
</body>
</html>