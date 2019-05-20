<?php
$db['db_host'] = "pdb30.freehostingeu.com";
$db['db_user'] = "2820006_loginsystem";
$db['db_pass'] = "0-DH!!Go...OoTan";
$db['db_name'] = "2820006_loginsystem";
foreach ($db as $key => $value) {
	define ( strtoupper( $key ), $value );
}
$connection = mysqli_connect( DB_HOST, DB_USER, DB_PASS, DB_NAME ) or die( "Connection was not established" );
?>