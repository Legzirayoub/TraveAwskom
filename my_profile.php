<?php 
	session_start(); 
	include ( "Aw-func/connection.php" );
include ( "Aw-func/Aw.php" );
	if ( !isset( $_SESSION['user_email'] ) ) {
	header( "location: index.php" );
	}else {
 include ( "header/header.php" );
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