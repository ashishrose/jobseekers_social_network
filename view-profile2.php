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
	
	if ( !empty ( $_POST ) ) 
	{
		if ( $_POST['type'] == 'add' ) 
		{
			$add_friend = @$insert->add_friend($_POST['user_id'], $_POST['friend_id']);
		}
		
		if ( $_POST['type'] == 'remove' ) 
		{
			$remove_friend = @$insert->remove_friend($_POST['user_id'], $_POST['friend_id']);
		}
	}
	
	
	if ( !empty ( $_GET['uid'] ) ) // here we are getting the uid
	{
		$user_id = $_GET['uid'];
		if ( $logged_user_id == $user_id ) //this is mine account
		{
			$mine = true;
		}
		else// this is angelas account
		{
			$mine = false;
		}
		$user = @$query->load_user_object($user_id);// all info about angela is fetched from the usereg table
	} 
	else // here we are not getting the uid
	{
		//echo '</br>this block is in use';
		$user = $query->load_user_object($logged_user_id);
		$mine = true;
	}
	//echo '</br>now this block is in use';
	
	$friends_id = @$query->get_friends($logged_user_id);// to get the list of friends for a particular id (logged in id)

	$new_arr = array_map(function($piece){return (string) $piece;}, $friends_id); // this is the solution to the error that has occured because we are trying to search the whole object with the array so for this we are typecasting the object into an array

?>



<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
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
		<h1>View Profile</h1>
		<div class="content">
			<p>Name: <?php echo $user->name; ?></p>
			<p>UserID: <?php echo $user->userid; ?></p>
			<p>Date Of Birth: <?php echo $user->dob; ?></p>
			<p>Address: <?php echo $user->addrs; ?></p>
			<p>Email Address: <?php echo $user->email; ?></p>
			<p>Gender: <?php echo $user->gender; ?></p>
			<!--<?php /*echo 'hello its content'*/;?>-->
			<!--this is an invisible form which is used for doing the friend requests-->
			<?php if ( !$mine ) : ?>
				<?php if ( !in_array($user->userid, $new_arr ) ) : ?>
					<p>
						<form method="post">
							<input name="user_id" type="hidden" value="<?php echo $logged_user_id; ?>" />
							<input name="friend_id" type="hidden" value="<?php echo $user_id; ?>" />
							<input name="type" type="hidden" value="add" />
							<!--<?php //echo 'hello its add as friends';?>-->
							<input type="submit" value="Add as Friend" />
						</form>
					</p>
				<?php else : ?>
					<p>
						<form method="post">
							<input name="user_id" type="hidden" value="<?php echo $logged_user_id; ?>" />
							<input name="friend_id" type="hidden" value="<?php echo $user_id; ?>" />
							<input name="type" type="hidden" value="remove" />
							<!--<?php //echo 'hello its remove as friends';?>-->
							<input type="submit" value="Remove Friend" />
						</form>
					</p>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</body>
</html>