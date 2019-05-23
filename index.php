<?php session_start(); ?>
<?php 
include( "Awskomfunction/connecttodatabase.php" );
	if ( isset( $_SESSION['user_email'] ) ) {
	header( "location: home.php" );
	}else {
                include ('style/header.php');  
		include( "head/header/header-login.php" );
		include( "home-html.php/home.php" );
		include( "login-logout/login.php" );
		}?>
                <?php include ("footer.php"); ?>
