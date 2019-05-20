<?php session_start(); ?>
<html lang="en-US">
<?php
include ( "Aw-func/connection.php" );
include ( "Aw-func/Aw.php" );
if (!isset( $_SESSION['user_email'] ) ) {
include( "forum/header.php" );
include("Aw-func/home-bevore-login.php");?>
<?php  
}else {
include ( "header/header.php" );
include ("Aw-func/home.php"); ?>
<?php include ("footer.php"); }  ?>