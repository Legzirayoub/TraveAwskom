<?php 
session_start();
	include( "Aw-func/connection.php" );
        include ( "Aw-func/Aw.php" );
	if ( isset( $_SESSION['user_email'] ) ) {
	header( "location: home.php" );
	}else {
              include ('forum/header.php'); 
              include ('header/header_register.php');  
	      include( "header/registration-form.php" );
	      }?>