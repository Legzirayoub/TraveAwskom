<div class="table table-bordered table-dark">
<table class="table">
<head>
<tr>
<th>Receivername</th>
<th>Time</th>
<th>Answer</th>
</tr>
</head>
<body>
<?php 
				$khtar_message       = "SELECT * from messages where sender='$user_id' AND message_type='dad' order by 1 DESC";
				$ferteh_message      = mysqli_query( $connection, $khtar_message );
				$count_message       = mysqli_num_rows( $ferteh_message );
				while ( $row_message = mysqli_fetch_array( $ferteh_message ) ) {
					$message_id        = $row_message['message_id'];
					$message_receiver  = $row_message['receiver'];
					$message_sender    = $row_message['sender'];
					$message_topic     = $row_message['message_topic'];
					$message_date      = $row_message['message_date'];
					$ara_receiver      = "SELECT * from users where user_id='$message_receiver'";
					$ferteh_receiver   = mysqli_query( $connection, $ara_receiver );
					$row               = mysqli_fetch_array( $ferteh_receiver );
					$image             = $row['user_image'];
                                        $receiver_name     = $row['user_name']; ?>       
				<tr class='active'>
				<td><a href='/../user_profile.php?user_id=<?php echo $message_receiver ?>'><img src='/../userimage/<?php echo $image ?>' class='img-circle' width='30' height='30' alt='image'><?php echo $receiver_name ?></a></td>
				<td><?php echo $message_date ?></td>
				<td><a href='Mymessages.php?message_id=<?php echo $message_id ?>'>View Reply</a></td>
				</tr>
				<?php }?>
</body>
</table>
</div>
