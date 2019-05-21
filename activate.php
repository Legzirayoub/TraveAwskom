<?php 
include( "includes/connecttodatabase.php" );
include ( "Awskomfunction/Awskom.php" );
	if ( isset( $_GET['verification_code'] ) ) {
		$get_code = $_GET['verification_code'];
		$get_user = "SELECT * from users where verification_code='$get_code'";
		$ferteh_user = mysqli_query( $connection, $get_user );
		$check_user = mysqli_num_rows( $ferteh_user );
		$row_user = mysqli_fetch_array( $ferteh_user );
		$user_id = $row_user['user_id'];
		if ( $check_user == 1 ) {
			$update_status = "UPDATE users set status='1' where user_id='$user_id'";
			$ferteh_update = mysqli_query( $connection, $update_status );?> 		
			<h2>Your account has been successfully activated .</h2>Please 
                        <a href='index.php'>Login , Share your Story , Enjoy the discussion .</a>
		<?php }else {
			echo "<h2>Sorry, Email not verified, try again Later !</h2>";}}?>
