<?php   $user 	    = $_SESSION['user_email'];
		$get_user   = "SELECT * from users where user_email='$user'";
		$ferteh_user = mysqli_query( $connection, $get_user );
		$row 	= mysqli_fetch_array( $ferteh_user );
		$user_id = $row['user_id'];
		$user_name 	= $row['user_name'];
		$user_pass	= $row['user_pass'];
		$user_email	= $row['user_email'];
		$user_gender	= $row['user_gender'];
		$user_image 	= $row['user_image'];
		$register_date  = $row['register_date'];
                $fromCoun = $row['fromCoun'];
                $toCoun = $row['toCoun'];
                $user_posts = "SELECT  * from posts where user_id='$user_id'";
		$ferteh_posts = mysqli_query( $connection, $user_posts );
		$posts = mysqli_num_rows( $ferteh_posts );
		$sel_msg = "SELECT * from messages where receiver='$user_id' AND status='unread' order by 1 DESC";
		$ferteh_msg = mysqli_query( $connection, $sel_msg );
		$count_msg = mysqli_num_rows( $ferteh_msg );?>
		
                <div class="col-sm-9">
			<h2>Edit Your Profile :</h2><br>
			<form method="post" class="user-registration-form form-horizontal" enctype="multipart/form-data">
                               <div class="form-group">
					<label for="interested" class="col-sm-2">Looking for someone to travel with ?</label>
					<div class="col-sm-10">
						<select name="interested" class="form-control">						  
						  <option value="yes">yes</option>
						  <option value="no">no</option>
						</select>
					</div>
				</div>
                                <div class="form-group">
					<label for="fromCoun" class="col-sm-2">From:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fromCoun" value="<?php echo $fromCoun; ?>">
					</div>
                                        <label for="toCoun" class="col-sm-2">To:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="toCoun" value="<?php echo $toCoun; ?>">
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
                                        <br>
						<button type="submit" name="update" class="btn btn-info btn-success">Update</button>
					</div>
				</div>
			</form>
			                <?php 
				        if ( isset( $_POST['update'] ) ) {
					$user_name = $_POST['user_name'];
					$user_pass = $_POST['user_pass'];
                                        $interested = $_POST['interested'];
                                        $fromCoun = $_POST['fromCoun'];
                                        $toCoun = $_POST['toCoun'];
					
					$update = "UPDATE users set interested='$interested'
                                        ,fromCoun='$fromCoun',toCoun='$toCoun'
                                        where user_id='$user_id'";
					$ferteh = mysqli_query( $connection, $update );
					if ( $ferteh ) {
					echo "<script>alert('Profile Updated succesfully ')</script>";
					echo "<script>window.open( 'home.php', '_self' )</script>";
					}else { echo 'File is not valid. Please try again'; }}?>
		        </div>
<?php include( "footer.php" ); ?>
