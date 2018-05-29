<?php
	require_once('db-class.php');
	
	if ( !class_exists('INSERT') ) 
	{
		class INSERT 
		{
			public function update_user($user_id, $postdata) 
			{
				global $db;
				
				$table = 'userreg';
				
				$query = "UPDATE $table SET name='$postdata[name]',dob='$postdata[dob]',addrs='$postdata[address]',email='$postdata[email]',gender='$postdata[gender]',password='$postdata[password]'WHERE userid='$user_id'";

				return $db->update($query);
			}

			public function update_company($user_id, $postdata) 
			{
				global $db;
				
				$table = 'compreg';
				
				$query = "UPDATE $table SET compname='$postdata[name]',compaddrs='$postdata[address]',comptype='$postdata[type]',cpassword='$postdata[password]',vacancy='$postdata[vacancy]'WHERE compid='$user_id'";

				return $db->update($query);
			}

			public function update_joblist($user_id, $postdata) 
			{
				global $db;
				
				$table = 'joblist';

				$query = "INSERT INTO $table (jobid,jobtype,compid,vacancy,salary)VALUES('$postdata[jobid]','$postdata[jobtype]','$postdata[compid]','$postdata[vacancy]','$postdata[salary]')";
				return $db->update($query);
			}
			
			public function add_friend($user_id, $friend_id) 
			{
				global $db;
				
				$table = 'friends';
				
				$query = "INSERT INTO $table (userid, friendid)VALUES ('$user_id', '$friend_id')";
				
				return $db->insert($query);
			}
			public function add_request($user_id, $comp_id, $job_id) 
			{
				global $db;
				
				$table = 'request';
				
				$query = "INSERT INTO $table (request, userid, compid, jobid)VALUES (true, '$comp_id', '$user_id', '$job_id')";
				
				return $db->insert($query);
			}

			public function add_accept($user_id,$comp_id) 
			{
				global $db;
				
				$table = 'request';
				
				$query = "UPDATE $table set accepted = 'accepted' WHERE userid='$user_id' AND compid='$comp_id'";
				
				return $db->insert($query);
			}

			public function withheld_accept($user_id,$comp_id) 
			{
				global $db;
				
				$table = 'request';
				
				$query = "UPDATE $table set accepted = 'withheld' WHERE userid='$user_id' AND compid='$comp_id'";
				
				return $db->insert($query);
			}
			
			public function delete_accept($user_id,$comp_id) 
			{
				global $db;
				
				$table = 'request';
				
				$query = "DELETE FROM $table WHERE userid = '$user_id' AND compid='$comp_id'";
				
				return $db->insert($query);
			}

			/*public function delete($user_id) 
			{
				global $db;
				
				$table = 'userreg';
				
				$query = "DELETE * FROM $table WHERE userid = '$user_id'";
				
				return $db->insert($query);
			}*/

			public function remove_friend($user_id, $friend_id) 
			{
				global $db;
				
				$table = 'friends';
				
				$query = "DELETE FROM $table WHERE userid = '$user_id'AND friendid = '$friend_id'";
				
				return $db->insert($query);
			}
			
			public function add_status($user_id) 
			{
				global $db;
				
				$table = 'status';
				
				$query = "INSERT INTO $table (userid, statustime, statuscontent) VALUES ('$user_id', '$_POST[status_time]', '$_POST[status_content]')";
				
				return $db->insert($query);
			}
			
			public function send_message() 
			{
				global $db;
				
				$table = 'messages';
				
				$query = "INSERT INTO $table (message_time, message_sender_id, message_recipient_id, message_subject, message_content)VALUES ('$_POST[message_time]', '$_POST[message_sender_id]', '$_POST[message_recipient_id]', '$_POST[message_subject]', '$_POST[message_content]')";
				
				return $db->insert($query);
			}
		}
	}
	
	$insert = new INSERT;
?>