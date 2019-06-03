<div class="col-sm-9">
<?php 
if ( isset( $_GET['user2_id'] ) ) {
$user2_id = $_GET['user2_id'];
$query = "SELECT * from users where user_id='$user2_id'";
$ferteh = mysqli_query( $connection, $query );
$row = mysqli_fetch_array( $ferteh );
$user_name = $row['user_name'];
$user_image = $row['user_image'];
$register_date = $row['register_date'];
}?><br>
<div class="col-sm-2">Interested users<hr>    
</div><div class="col-sm-10">
     <h2>Message <?php echo $user_name; ?></h2>
			<form action="messages.php?user2_id=<?php echo $user2_id; ?>" method="POST" class="form-horizontal">
			<div class="form-group">
			<div class="col-sm-12">
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">
			<textarea name="message_topic" class="form-control" cols="15" rows="5" placeholder="Message Topic" required></textarea>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">
			<input type="submit" name="message" class="btn btn-info pull-right" value="Send Message">
			</div>
			</div>
			</form></div>
			    <?php 
				  if ( isset( $_POST['message'] ) ) {
					$message_topic = $_POST['message_topic'];
					$insert = "INSERT into messages(sender,receiver,message_topic,reply,status,message_type,message_date) values('$user_id','$user2_id','$message_topic','noreply','novue','dad',NOW())";
					$ferteh_insert = mysqli_query( $connection, $insert );
					if ( $ferteh_insert ) {
					echo "<font color='red'><h3>Message was sent to $user_name successfully</h3></font>";
					}else {
					echo "<font color='red'><h3>Error Message was not sent to $user_name successfully try again later</h3></font>";									
					}}?>
</div>
