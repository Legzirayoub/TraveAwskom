<?php 
	session_start(); 
	include ( "Awskomfunction/connecttodatabase.php" );
include ( "Awskomfunction/Awskom.php" );
	if ( !isset( $_SESSION['user_email'] ) ) {
		header( "location: index.php" );
	}else {
        include( "forum/header.php" );
		include ( "head/header/header.php" );?>
	<?php 
	 include ("Awskomfunction/travel-with.php"); }?>
