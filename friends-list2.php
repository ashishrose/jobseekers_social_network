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
	
	//$logged_user_id = 1;
	
	$friends = @$query->get_friends($logged_user_id);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Friends List</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div id="navigation">
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
		<h1>Friends List</h1>
		<div class="content">
			<?php @$query->do_friends_list($friends); ?>
		</div>
	</body>
</html>