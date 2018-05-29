<?php     
         session_start();
         $name=$_SESSION['name'];     
         echo'welcome :'. $name.'<br>';
         echo'<a href="comsignout.php">Signout</a>';
?>