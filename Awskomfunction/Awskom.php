<?php
function Gettopics() {
	global $connection;
	$get_topics = "SELECT * from topics";
	$ferteh_topics = mysqli_query( $connection, $get_topics );
	while ( $row = mysqli_fetch_array( $ferteh_topics ) ) {
		$topic_id = $row['topic_id'];
		$topic_title = $row['topic_title'];
		echo "<option value='$topic_id'>$topic_title</option>";}}
function GetVisibility() {
	global $connection;
	$get_Visibility = "SELECT * from Visibility";
	$ferteh_Visibility = mysqli_query( $connection, $get_Visibility );
	while ( $row = mysqli_fetch_array( $ferteh_Visibility ) ) {
		$Visibility_id = $row['Visibility_id'];
		$Visibility_title = $row['Visibility_title'];
		echo "<option value='$Visibility_id'>$Visibility_title</option>";}}
function Insertpost() {
	global $connection;
	global $user_id;
	if ( isset( $_POST['sub'] ) ) {
		$content = $_POST['content'] ;
		$topic = $_POST['topic'];
		$Visibility = $_POST['Visibility'];
                $IP = $_SERVER['REMOTE_ADDR']; 
			$insert = "INSERT into posts(user_id,topic_id,Visibility_id,post_content,post_date,IP) values('$user_id','$topic','$Visibility','$content',NOW(),'".$IP."')";
			$ferteh = mysqli_query( $connection, $insert );
			if ( $ferteh ) {
			$update = "UPDATE users set posts='1' where user_id='$user_id'";
			$ferteh_update = mysqli_query( $connection, $update );}}}	                                          
function travelwith() {
	global $connection;
        $user = "SELECT * from users where interested='yes' LIMIT 0,9";
	$ferteh_user = mysqli_query( $connection, $user );
	$awskom  = "<h2>Someone to travel with ?</h2>";
	while ( $row = mysqli_fetch_array( $ferteh_user ) ) {
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
                $user_gender = $row['user_gender'];
                $fromCoun = $row['fromCoun'];
                $toCoun = $row['toCoun'];
		$user_image = $row['user_image'];
                $awskom .= "<div class='panel panel-primary'>";
		$awskom .= "<div class='panel-body'>";
                $awskom .= "<a href='user_profile.php?user_id=$user_id'><img src='userimage/$user_image'class='img-circle' alt='image' width='50' height='50' ></a>";
		$awskom .= "<li><span>Username: </span>$user_name</li>";
                $awskom .= "<li><span>Gender: </span>$user_gender</li>";
                $awskom .= "<li><span>From: </span>$fromCoun<span> To: $toCoun</span></li>";
                $awskom .= "</div>";
                $awskom .= "</div>";
                }
echo $awskom;}

function travelwithall() {
	global $connection;
        $user = "SELECT * from users where interested='yes' LIMIT 0,99999";
	$ferteh_user = mysqli_query( $connection, $user );
	$awskom  = "<h2>Someone to travel with ?</h2>";
	while ( $row = mysqli_fetch_array( $ferteh_user ) ) {
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
                $user_gender = $row['user_gender'];
                $fromCoun = $row['fromCoun'];
                $toCoun = $row['toCoun'];
		$user_image = $row['user_image'];
                $awskom .= "<div class='panel panel-primary'>";
		$awskom .= "<div class='panel-body'>";
                $awskom .= "<a href='user_profile.php?user_id=$user_id'><img src='userimage/$user_image'class='img-circle' alt='image' width='50' height='50' ></a>";
		$awskom .= "<li><span>Username: </span>$user_name</li>";
                $awskom .= "<li><span>Gender: </span>$user_gender</li>";
                $awskom .= "<li><span>From: </span>$fromCoun<span> To: $toCoun</span></li>";
                $awskom .= "</div>";
                $awskom .= "</div>";
                }
echo $awskom;}?>
