<?php 
session_start();
	include( "Awskomfunction/connecttodatabase.php" );
        include ( "Awskomfunction/Awskom.php" );
	if ( isset( $_SESSION['user_email'] ) ) {
	header( "location: home.php" );
	}else {
              include ('style/header.php'); 
              include ('head/header/header_register.php');  
	      include( "head/header/registration-form.php" );
	      }?>
