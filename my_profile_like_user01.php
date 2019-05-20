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
<?php
include( "Aw-func/S.php" );}
?>