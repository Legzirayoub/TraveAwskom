<?php session_start(); ?>
<?php 
include( "Aw-func/connection.php" );
	if ( isset( $_SESSION['user_email'] ) ) {
	header( "location: home.php" );
	}else {
                include ('forum/header.php');  
		include( "header/header_login.php" );
		include( "home.php" );
		include( "login.php" );
		}?>
                <?php include ("footer.php"); ?>