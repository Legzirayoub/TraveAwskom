<?php 
include ( "connection.php" );
	if ( isset( $_GET['post_id'] ) ) {
		$post_id = $_GET['post_id'];
		$delete_post = "DELETE from posts where post_id='$post_id'";
		$ferteh_delete = mysqli_query( $connection, $delete_post );
		if ( $ferteh_delete ) {
			echo "<script>alert('Post has been deleted!')</script>";
			echo "<script>window.open('../home.php','_self')</script>";}}
?>