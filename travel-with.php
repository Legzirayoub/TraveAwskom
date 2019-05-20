<?php 
	session_start(); 
	include ( "Aw-func/connection.php" );
include ( "Aw-func/Aw.php" );
	if ( !isset( $_SESSION['user_email'] ) ) {
		header( "location: index.php" );
	}else {
        include( "forum/header.php" );
		include ( "header/header.php" );?>
	<?php 
	 include ("Aw-func/travel-with.php"); }?>