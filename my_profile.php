<?php 
	session_start(); 
	include ( "Awskomfunction/connection.php" );
include ( "Awskomfunction/Awskom.php" );
	if ( !isset( $_SESSION['user_email'] ) ) {
	header( "location: index.php" );
	}else {
 include ( "head/header/header.php" );
 include( "forum/header.php" );
?>
		<div class="col-sm-9">
		<?php my_profile(); ?>
			<div id="posts">
				<br>
				<?php your_posts(); ?>
			</div>
		</div>
<?php include( "footer.php" );} ?>
