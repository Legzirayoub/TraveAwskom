<div class="col-sm-9">
		<h2>See your messages:</h2>
				<a href="M-messages.php?inbox&user2_id=<?php echo $user_id; ?>" class="btn btn-info">inbox</a>
				<a href="M-messages.php?sent&user2_id=<?php echo $user_id; ?>" class="btn btn-info">Sent</a>
                                <a href="M-messages.php?Receivedreply&user2_id=<?php echo $user_id; ?>" class="btn btn-info">Reply</a>
                                <a href="M-messages.php?Allmessage&user2_id=<?php echo $user_id; ?>" class="btn btn-danger">All message</a>
			<?php
			if ( isset( $_GET['sent'] ) ) {
			include( "Message_sent.php" );} 
			?>
                        <?php
			if ( isset( $_GET['Receivedreply'] ) ) {
			include( "replymessage.php" );} 
			?>
                        <?php
			if ( isset( $_GET['Allmessage'] ) ) {
			include( "Allmessage.php" );} 
			?>
			<?php if ( isset( $_GET['inbox'] ) ) {
                        ?>
                                <div class="table table-bordered table-dark">
				<table class="table">
				<head>
				<tr>
				<th>Sendername</th>
				<th>Time</th>
				<th>Reply</th>
				</tr>
				</head>
				<body>
<?php 
$sel_message = "SELECT * from messages where receiver='$user_id' AND message_type='dad' order by 1 DESC";
								$run_message = mysqli_query( $connection, $sel_message );
								$count_message = mysqli_num_rows( $run_message );
								while ( $row_message = mysqli_fetch_array( $run_message ) ) {
									$message_id = $row_message['message_id'];
									$message_receiver = $row_message['receiver'];
									$message_sender = $row_message['sender'];
									$message_subito = $row_message['message_subito'];
									$message_topic = $row_message['message_topic'];
									$message_date = $row_message['message_date'];
									$message_status = $row_message['status'];
									$get_sender = "SELECT * from users where user_id='$message_sender'";
									$run_sender = mysqli_query( $connection, $get_sender );
									$row = mysqli_fetch_array( $run_sender );
									$sender_name = $row['user_name'];
									$image = $row['user_image'];
                                                                        if ( $message_status == 'unread' ) {
									$awskom  = "<tr class='success'>";
									}else { ?>
									<tr class='active'>
                                                                        <?php } ?>
									<td><a href='/../user_profile.php?user_id=<?php echo $message_sender ?>'><img src='/../userimage/<?php echo $image ?>' class='img-circle' width='30' height='30' alt='userimage' ><?php echo $sender_name ?></a></td>
									<td><?php echo $message_date ?></td>
									<td><a href='Mymessages.php?message_id=<?php echo $message_id ?>'>Reply</a></td>
									</tr>
<?php }?>
                                        </body>
					</table>
				<?php } ?>
				<?php
				if ( isset( $_POST['submit_message'] ) ) {
						$get_id = $_GET['message_id'];
						$khtar_dad_message = "SELECT * from messages where message_id='$get_id'";
						$ferteh_dad_message = mysqli_query( $connection, $khtar_dad_message );
						$row_dad_message = mysqli_fetch_array( $ferteh_dad_message );
						$dad_message_receiver = $row_dad_message['receiver'];
						$dad_message_sender = $row_dad_message['sender'];
						$reply_sender = $user_id;
						if ( $dad_message_receiver == $user_id ) {
						$reply_receiver = $dad_message_sender;
						}else {
						$reply_receiver = $dad_message_receiver;
						}
						$user_reply = $_POST['message_reply'];
						$reply_status = "vue";
						$reply_msg_type = "reply";
						$insert_reply_message = "INSERT into messages(dad_message_id,sender,receiver,reply,status,message_type,message_date) values('$get_id','$reply_sender','$reply_receiver','$user_reply','vue','reply',NOW())";
						$ferteh_update = mysqli_query( $connection, $insert_reply_message);
					        }
				if ( isset( $_GET['message_id'] ) ) {
						$get_id = $_GET['message_id'];
						$select_message = "SELECT * from messages where message_id='$get_id'";
						$ferteh_message = mysqli_query( $connection, $select_message );
						$row_message = mysqli_fetch_array( $ferteh_message );
						$message_topic = $row_message['message_topic'];
						$message_receiver = $row_message['receiver'];
						$message_sender = $row_message['sender'];
						$get_receiver   = "SELECT * from users where user_id='$message_receiver'";
						$ferteh_receiver   = mysqli_query( $connection, $get_receiver );
						$row_receiver	= mysqli_fetch_array( $ferteh_receiver );
						$receiver_name = $row_receiver['user_name'];
						$receiver_image = $row_receiver['user_image'];
						$get_sender   = "SELECT * from users where user_id='$message_sender'";
						$ferteh_sender  = mysqli_query( $connection, $get_sender );
						$row_sender	= mysqli_fetch_array( $ferteh_sender );
						$sender_name = $row_sender['user_name'];
						$sender_image = $row_sender['user_image'];
						$update_nonvue = "UPDATE messages set status='vue' where message_id='$get_id'";
						$ferteh_nonvue = mysqli_query( $connection, $update_nonvue );
                                               ?>
                                                <tr>
						<div class='well clearfix'>
						<div class='message parent'>
                                                <div class='panel panel-primary'>
		                                <div class='panel-body'>
						<td><h4><img src='/../userimage/<?php echo $sender_image ?>' class='img-circle' width='80' height='80' alt='userimage'><strong><?php echo $sender_name ?></strong></h4></td>
						<td><p><strong>Subject:</strong><?php echo $message_subject ?></p></td>
						<td><p><strong>Message:</strong><?php echo $message_topic ?></p><br></td>
                                                </div></div>
                                                </div>
                                               <?php
						$get_message_reply = "SELECT * from messages where dad_message_id='$get_id' AND message_type='reply'  order by message_date ASC";
						$message_reply_query = mysqli_query( $connection, $get_message_reply );
						while ( $row_message_reply = mysqli_fetch_array( $message_reply_query ) ) {
							$reply_sender = $row_message_reply['sender'];
							$reply_receiver = $row_message_reply['receiver'];
							$reply_content = $row_message_reply['reply'];
							if ( $reply_sender == $message_sender ) {
                                                        ?>
                                                        <div class='panel panel-primary'>
		                                        <div class='panel-body'>
								<div class='message reply '>
								<img src='/../userimage/<?php echo $sender_image ?>' class='img-circle' width='80' height='80' alt='userimage'><strong><?php echo $sender_name ?></strong>
                                                                <div class='panel panel-primary'>
                                                                <div class='panel-body'>
                                                                <p class='text-left'><?php echo $reply_content ?></p>
								</div></div>
                                                                </div></div>
						                </div>
							        <?php  }else { ?>
                                                                <div class='panel panel-primary'>
		                                                <div class='panel-body'>
                                                                <div class='message reply  '>
								<img src='/../userimage/<?php echo $receiver_image ?>' class='img-circle' width='80' height='80' alt='userimage'><strong><?php echo $receiver_name ?></strong>
								<div class='panel panel-primary'>
                                                                <div class='panel-body'>
                                                                <p class='text-left'><?php echo $reply_content ?></p>
								</div></div></div></div></div>
							        <?php }} ?>
						<div class='reply-to-message  '>
						<form action='Mymessages.php?message_id=<?php echo $get_id ?>' method='POST' class='form-horizontal'>
						<textarea name='message_reply' class='form-control' rows='10' placeholder='Reply to this message...' required></textarea><br>
						<input type='submit' name='submit_message' class='btn btn-info' value='Answer to Message'>
						</form>	 
						</div>
						</div>	         					
<?php } ?></div></div>	
