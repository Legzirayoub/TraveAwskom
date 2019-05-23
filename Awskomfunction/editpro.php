	<?php   $user 	        = $_SESSION['user_email'];
		$get_user       = "SELECT * from users where user_email='$user'";
		$ferteh_user    = mysqli_query( $connection, $get_user );
		$row 	        = mysqli_fetch_array( $ferteh_user );
		$user_id        = $row['user_id'];
		$user_name 	= $row['user_name'];
		$user_pass	= $row['user_pass'];
		$user_email	= $row['user_email'];
		$user_gender	= $row['user_gender'];
		$user_image 	= $row['user_image'];
		$register_date  = $row['register_date'];
                $fromCoun       = $row['fromCoun'];
                $toCoun         = $row['toCoun'];
                $user_posts     = "SELECT  * from posts where user_id='$user_id'";
		$ferteh_posts   = mysqli_query( $connection, $user_posts );
		$posts          = mysqli_num_rows( $ferteh_posts );
		?>
                <div class="col-sm-9">
			<h2>Edit Your Profile :</h2><br>
			<form method="post" class="user-registration-form form-horizontal" enctype="multipart/form-data">
				<div class="form-group">
					<label for="user_name" class="col-sm-2">Name:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="user_name" value="<?php echo $user_name; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="user_pass" class="col-sm-2">Password:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="user_pass" value="<?php echo $user_pass; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="user_email" class="col-sm-2">Email:</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>" disabled="disabled">
					</div>
				</div>
				<div class="form-group">
					<label for="user_gender" class="col-sm-2">Gender:</label>
					<div class="col-sm-10">
						<select name="user_gender" class="form-control" disabled="disabled">
						  <option><?php echo $user_gender; ?></option>
						  <option value="Male">Male</option>
						  <option value="Female">Female</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="user_image" class="col-sm-2">Time to change your picture :</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" name="user_image" value="<?php echo $user_image; ?>" required>
					</div>
				</div>
                              
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
					$user_image  = $_FILES['user_image']['name'];
					$user_image  = $user_id.$user_image;
					$image_tmp = $_FILES['user_image']['tmp_name'];
	                                $extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );   
	                                $extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;	
					move_uploaded_file( $image_tmp, "userimage/$user_image" );
					$update = "UPDATE users set user_name='$user_name',user_pass='$user_pass',
                                        user_image='$user_image'
                                        where user_id='$user_id'";
					$ferteh = mysqli_query( $connection, $update );
					if ( $ferteh ) {
					echo "<script>alert('Profile Updat succesful !')</script>";
					echo "<script>window.open( 'home.php')</script>";
					}else { echo 'File is not valid. Please try again later'; }}?>
		        </div>
<?php include( "footer.php" ); ?>
