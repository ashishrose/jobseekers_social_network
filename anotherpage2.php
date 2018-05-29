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
	/*if ( !empty ( $_POST ) ) 
	{
		if ( $_POST['type'] == 'add' ) 
		{
			$add_friend = @$insert->add_request($_POST['compid'], $_POST['userid']);
		}
	}*/
	

	if ( !empty ( $_GET['link'] ) ) //$_GET[link] gives the link to anotherpage.php
	{
		//echo '</br>this block is in use';
		$comp_id = $_GET['link'];
		$company = $query->load_comp_object($comp_id);
		$user=$query->load_user_object($comp_id);
		$job = @$query->get_jobs($comp_id);
		/*echo $comp_id;
		echo 'we got the link';*/
	}
	else
	{
		$company = $query->load_comp_object($logged_user_id);
		$job = @$query->get_jobs($_GET['link']);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<!--<div id="navigation">
			<ul>
				<li><a href="welcome.php">Home</a></li>
				<li><a href="anotherpage.php">Profile</a></li>
				<li><a href="compedit-profile.php">Edit Profile</a></li>
				<li><a href="friends-list.php">Friends List</a></li>
				<li><a href="feed-view.php">View Feed</a></li>
				<li><a href="feed-post.php">Post Status</a></li>
				<li><a href="messages-inbox.php">Inbox</a></li>
				<li><a href="messages-compose.php">Compose</a></li>
			</ul>-->
		</div>
		<h1>View Profile</h1>
		<div class="content">
			<p>Name: <?php echo $company->compname; ?></p>
			<p>CompanyID: <?php echo $company->compid; ?></p>
			<p>Address: <?php echo $company->compaddrs; ?></p>
			<p>Type: <?php echo $company->comptype; ?></p>
			<p>Vacancy: <?php echo $company->vacancy; ?></p>
			<p>JOB LISTINGS</p>
			<p><?php @$query->do_jobs_list($job); ?></p>


			<!--<p>jobid: <?php /*echo $jobpost->jobid; ?></p>
			<p>jobtype: <?php echo $jobpost->jobtype; ?></p>
			<p>compid: <?php echo $jobpost->compid; ?></p>
			<p>Vacancy: <?php echo $company->vacancy; ?></p>
			<p>salary: <?php echo $jobpost->salary; */?></p>-->


			<?php if($company->flag=="company"): ?>
			<?php if ($company->compid!=$logged_user_id): ?><!--this checks whether the same company is not searching in-->

			<!--this is an invisible form which is used for doing the friend requests-->
					<!--<p>
						<form method="post">
							<input name="compid" type="hidden" value="<?php echo $company->compid; ?>" />
							<input name="userid" type="hidden" value="<?php echo $logged_user_id; ?>" />
							<input name="type" type="hidden" value="add" />
							<?php //echo 'hello its add as friends';?>
							<input type="submit" value="Job Request" />
						</form>
					</p>-->
				<?php endif;?>
			<?php endif;?>
		</div>
	</body>
</html>