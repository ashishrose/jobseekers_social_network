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
		$update = @$insert->update_user($logged_user_id, $_POST);
	}
	
	$user = @$query->load_user_object($logged_user_id);
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
		<h1>Edit Profile</h1>
		<div class="content">
			<form method="post">
				<p>
					<label class="labels" for="name">Name:</label>
					<input name="name" type="text" value="<?php echo @$user->name; ?>" />
				</p>
				<p>
					<label class="labels" for="name">DOB:</label>
					<input name="dob" type="date" value="<?php echo @$user->dob; ?>" />
				</p>
				<p>
					<label class="labels" for="name">Address:</label>
					<input name="address" type="text" value="<?php echo @$user->addrs; ?>" />
				</p>
				<p>
					<label class="labels" for="email">Email Address:</label>
					<input name="email" type="email" value="<?php echo @$user->email; ?>" />
				</p>
				<p>
					<label class="labels" for="name">Gender:</label>
					<input name="gender" type="radio" value="male">M</input>
					<input name="gender" type="radio" value="female">F</input>
				</p>
				<p>
					<label class="labels" for="password">Password:</label>
					<input name="password" type="password" value="<?php echo $user->password; ?>" />
				</p>
				<p>
					<input type="submit" value="Submit" onkeydown="update_user()"/>
				</p>
			</form>
		</div>
	</body>
</html>