<?php 
	session_start(); 
	include ( "Awskomfunction/connection.php" );
include ( "Awskomfunction/Awskom.php" );
	if ( !isset( $_SESSION['user_email'] ) ) {
	header( "location: index.php" );
	}else {
 include ( "head/header/header.php" );
 include( "style/header.php" );
?>
		<div class="col-sm-9">
		<?php myprofile(); ?>
			<div id="posts">
				<br>
				<?php ownposts(); ?>
			</div>
		</div>
<?php include( "footer.php" );} ?>
