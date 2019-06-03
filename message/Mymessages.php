<?php 
	session_start(); 
        include __DIR__ . "/../Awskomfunction/connecttodatabase.php";
        include __DIR__ . "/../Awskomfunction/Awskom.php";
	if ( !isset( $_SESSION['user_email'] ) ) {
	header( "location: /../index.php" );
	}else {
                include __DIR__ . "/../head/header/headermsg.php";
                include __DIR__ . "/../forum/header.php";
                include("storallmessage/wait.php");
?>		                           		                                                        
<?php 
include ('footer.php');
}?>
