<?php 
	if ( isset( $_POST['login']) ) {
		$email = mysqli_real_escape_string( $connection, $_POST['email'] );
		$pass  = mysqli_real_escape_string( $connection, $_POST['pass'] );
		$ara_user = "SELECT * FROM users WHERE user_email='$email' AND user_pass='$pass'";
		$ferteh_user = mysqli_query( $connection, $ara_user );
		$security = mysqli_num_rows( $ferteh_user );
		$Data = mysqli_fetch_array( $ferteh_user );
		$status = $Data['status'];
	if ( $security == 1 ) {
	if ( $status == 'unverified') {
				echo "<script>alert('Your email is not verified. Please check your email to verify.')</script>";
	}else{	
				$_SESSION['user_email'] = $email;
				echo "<script>window.open('home.php','_self')</script>";}
	}else {
			echo "<script>alert('Password or email is not correct!')</script>";
		}}?>