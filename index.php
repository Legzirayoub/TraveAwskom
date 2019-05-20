<?php session_start(); ?>
<?php 
include( "Awskomfunction/connecttodatabase.php" );
	if ( isset( $_SESSION['user_email'] ) ) {
	header( "location: home.php" );
	}else {
                include ('forum/header.php');  
		include( "head/header/header_login.php" );
		include( "home-html.php/home.php" );
		include( "login.php" );
		}?>
                <?php include ("footer.php"); ?>
