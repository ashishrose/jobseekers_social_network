<?php
	require_once('db-class.php');

	if ( !class_exists('QUERY') ) 
	{
		class QUERY 
		{
			public function load_user_object($user_id) 
			{
				global $db;
				
				$table = 'userreg';
				
				$query = "SELECT * FROM $table WHERE userid = '$user_id'";
				
				$obj = $db->select($query);
				
				if ( !$obj ) 
				{
					return "No user found so register";
				}
				
				return $obj[0];
			}

			public function load_job_object($user_id) 
			{
				global $db;
				
				$table = 'joblist';
				
				$query = "SELECT * FROM $table WHERE jobid = '$user_id'";
				
				$obj = $db->select($query);
				
				if ( !$obj ) 
				{
					return "No user found so register";
				}
				
				return $obj[0];
			}

			public function load_comp_object($user_id) 
			{
				global $db;
				
				$table = 'compreg';
				
				$query = "SELECT * FROM $table WHERE compid = '$user_id'";
				
				$obj = $db->select($query);
				//echo 'the query executed';
				
				if ( !$obj ) 
				{
					return "No user found so register";
					//echo 'the query not executed';
				}
				
				return $obj[0];
			}

			public function load_job_list($job_id)
			{
				global $db;

				$table = 'joblist';

				$query = "SELECT * FROM $table WHERE jobid = '$job_id'";

				$obj = $db->select($query);
				if ( !$obj ) 
				{
					return "No user found so register";
					//echo 'the query not executed';
				}

				return $obj[0];
			}

			public function load_user_resume($user_id)
			{
				global $db;
				$table = 'resume_info';
				$query = "SELECT * FROM $table WHERE userid = '$user_id'";
				$obj = $db->select($query);

				if ( !$obj ) 
				{
					return "No user found so register";
					//echo 'the query not executed';
				}
				
				return $obj[0];
			}
			
			public function load_all_user_objects() 
			{
				global $db;
				
				$table = 'userreg';
				
				$query = "SELECT * FROM $table";
				
				$obj = $db->select($query);
				
				if ( !$obj ) 
				{
					return "No user found";
				}
				
				return $obj;
			}

			public function load_all_comp_objects() 
			{
				global $db;
				
				$table = 'compreg';
				
				$query = "SELECT * FROM $table";
				
				$obj = $db->select($query);
				
				if ( !$obj ) 
				{
					return "No user found";
				}
				
				return $obj;
			}
			
			public function get_friends($user_id) 
			{
				global $db;
				//echo 'get friends';
				$table = 'friends';
				
				$query = "SELECT friendid FROM $table WHERE userid = '$user_id'";
				
				$friends = $db->select($query);
				
				foreach ( $friends as $friend ) 
				{
					$friend_ids[] = $friend->friendid;
					//echo '</br>getting friends in a loop';
				}
				
				return $friend_ids;
			}

			public function get_jobs($user_id) 
			{
				global $db;
				//echo 'get friends';
				$table = 'joblist';
				
				$query = "SELECT jobid FROM $table WHERE compid = '$user_id'";
				
				$jobs = $db->select($query);
				
				foreach ( $jobs as $job ) 
				{
					$job_ids[] = $job->jobid;
					//echo '</br>getting friends in a loop';
				}
				
				return $job_ids;
			}

			public function get_requests($user_id) 
			{
				global $db;
				//echo 'get friends';
				$table = 'request';
				
				$query = "SELECT userid, jobid FROM $table WHERE compid = '$user_id'";
				
				$requests = $db->select($query);
				
				foreach ( $requests as $request ) 
				{
					$request_ids[] = $request->userid;
					//echo '</br>getting friends in a loop';
				}
				
				return $request_ids;
			}
			
			public function get_status_objects($user_id)  
			{
				global $db;
				
				$table = 'status';
				$query = "SELECT userid,statuscontent FROM $table ORDER BY 'statustime' DESC";
				
				$status_objects = $db->select($query);
				return $status_objects;
			}
			
			public function get_message_objects($user_id) 
			{
				global $db;
				
				$table = 'messages';
				
				$query = "SELECT * FROM $table WHERE message_recipient_id = '$user_id'";
				
				$messages = $db->select($query);
								
				return $messages;
			}
			
			public function do_user_directory() 
			{
				$users = $this->load_all_user_objects();
				
				foreach ( $users as $user ) 
					{ ?>
					<div class="directory_item">
						<h3><a href="view-profile.php?uid=<?php echo $user->userid; ?>"><?php echo $user->name; ?></a></h3>
						<p><?php echo $user->email; ?></p>
					</div>
				<?php
				}
			}

			public function do_users_directory() 
			{
				$users = $this->load_all_user_objects();
				
				foreach ( $users as $user ) 
					{ ?>
					<div class="directory_item">
						<h3><a href="view-profile.php?uid=<?php echo $user->userid; ?>"><?php echo $user->name; ?></a></h3>
						<?php $user_id = $user->userid;?>
						<p><?php echo $user->email; ?></p>
						<form method="GET" action="delete.php">
            			  <input name="type" type="hidden" value="<?php echo $user->userid;?>">
            			 <!-- <?php //echo $user_id;?>-->
            			  <input type="submit" name="submit" value="delete" >
            			</form>
					</div>
				<?php
				}
			}

			public function do_company_directory() 
			{
				$users = $this->load_all_comp_objects();
				
				foreach ( $users as $user ) 
					{ ?>
					<div class="directory_item">
						<h3><a href="view-profile.php?uid=<?php echo $user->userid; ?>"><?php echo $user->compname; ?></a></h3>
						<p><?php echo $user->compaddrs; ?></p>
					</div>
				<?php
				}
			}

			public function do_friends_list($friends_array) 
			{
				foreach ( $friends_array as $friend_id ) 
				{
					$users[] = $this->load_user_object($friend_id);
				}
								
				foreach ( $users as $user ) 
					{ ?>
					<div class="directory_item">
						<h3><a href="view-profile.php?uid=<?php echo $user->userid; ?>"><?php echo $user->name; ?></a></h3>
						<p><?php echo $user->email; ?></p>
					</div>
				<?php
				}
			}

			public function do_jobs_list($jobs_array) 
			{
				$link = $_GET['link'];
				foreach ( $jobs_array as $job_id ) 
				{
					$jobs[] = $this->load_job_object($job_id);
				}
								
				foreach ( $jobs as $job ) 
					{ ?>
					<div class="directory_item">
						<h3><a href="jobrequest.php?uid=<?php echo $job->jobid; ?>"><?php echo $job->jobid; ?></a></h3>
						<p><?php echo $job->jobtype; ?></p>
					</div>
				<?php
				}
			}

			public function do_requests_list($requests_array) 
			{
				foreach ( (array)$requests_array as $request_id ) 
				{
					$users[] = $this->load_user_object($request_id);
				}
								
				foreach ( @(array)$users as $user ) 
					{ ?>
					<div class="directory_item">
						<h3><a href="compview-profile.php?uid=<?php echo $user->userid; ?>"><?php echo $user->name; ?></a></h3>
						<p><?php echo $user->email; ?></p>
					</div>
				<?php
				}
			}
			
			public function do_news_feed($user_id) 
			{
				echo '</br>do news feed';
				$status_objects = $this->get_status_objects($user_id);

				if (is_array($status_objects) || is_object($status_objects))
				{
				foreach ( $status_objects as $status ) {?>
					<div class="status_item">
						<?php $user = $this->load_user_object($status->userid); ?>
						<h3><a href="view-profile.php?uid=<?php echo $user->userid; ?>"><?php echo $user->name; ?></a></h3>
						<p><?php echo $status->statuscontent; ?></p>
					</div>
				<?php
				}
			}
			}
			
			public function do_inbox($user_id) 
			{
				$message_objects = $this->get_message_objects($user_id);
				
				foreach ( $message_objects as $message ) 
					{?>
					<div class="status_item">
						<?php $user = $this->load_user_object($message->message_sender_id); ?>
						<h3>From: <a href="view-profile.php?uid=<?php echo $user->userid; ?>"><?php echo $user->name; ?></a></h3>
						<p><?php echo $message->message_subject; ?></p>
						<p><?php echo $message->message_content; ?></p>
					</div>
				<?php
				}
			}
		}
	}
	
	$query = new QUERY;
?>