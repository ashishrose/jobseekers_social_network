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
	
	$req = @$query->get_requests($logged_user_id);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Requests List</title>
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
		<h1>Requests</h1>
		<div class="content">
			<?php $query->do_requests_list($req); ?>
		</div>
	</body>
</html>