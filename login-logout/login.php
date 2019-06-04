<?php 
	if ( isset( $_POST['login']) ) {
		$email       = mysqli_real_escape_string( $connection, $_POST['email'] );
		$password    = mysqli_real_escape_string( $connection, $_POST['password'] );
		$ara_user    = "SELECT * FROM users WHERE user_email='$email' AND user_password='$password'";
		$ferteh_user = mysqli_query( $connection, $ara_user );
		$security    = mysqli_num_rows( $ferteh_user );
		$Data        = mysqli_fetch_array( $ferteh_user );
		$status      = $Data['status'];
	if ( $security == 1 ) {
	if ( $status == '1') {
				echo "<script>alert('Your email is not verified. Please check your email Inbox.')</script>";
	}else{	
				$_SESSION['user_email'] = $email;
				echo "<script>window.open('home.php')</script>";}
	}else {
			echo "<script>alert('Wrong Email or password')</script>";
}}?>
