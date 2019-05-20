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
<?php include ("head/header/editpost.php"); }?>
