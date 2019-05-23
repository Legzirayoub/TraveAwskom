<?php session_start(); ?>
<?php 
include( "Awskomfunction/connecttodatabase.php" );
	if ( isset( $_SESSION['user_email'] ) ) {
	header( "location:sweethome.php" );
	}else {
                include ('style/header.php');  
		include( "head/header/header-login.php" );
		include( "sweethome.php" );
		include( "login-logout/login.php" );
		}?>
                <?php include ("footer.php"); ?>
