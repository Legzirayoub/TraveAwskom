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
		<div class="col-sm-9">
		<h2>Search results:</h2>
                <?php
	if ( isset( $_GET['search_person'] ) ) {
	$search_term = $_GET['search_person'];}
	$get_users  = "SELECT * from users where  user_name  like '%$search_term%' ORDER by 1 DESC";
	$ferteh_users  = mysqli_query( $connection, $get_users );
	$count_result = mysqli_num_rows( $ferteh_users );
	if ( $count_result == 0 ) {
		echo "<div class='alert alert-danger' role='alert'>Oops Sorry, we do not have results for this Person !</div>";
		exit();}
	while ( $row_users = mysqli_fetch_array( $ferteh_users ) ) {
		$user_id = $row_users['user_id'];
		$user_name = $row_users['user_name'];
		$user_id = $_GET['user_id'];
		$select = "SELECT * from users where user_name='$user_name'";
		$ferteh = mysqli_query( $connection, $select );
		$row = mysqli_fetch_array( $ferteh );
		$user_id = $row['user_id'];
		$image = $row['user_image'];
		$user_name = $row['user_name'];
		$gender = $row['user_gender'];
		$register_date = $row['register_date']; ?>
		<div class='panel panel-info' >
		<div class='panel-heading'><strong>User info :</strong></div>
		<div class='panel-body'>
		<div class='row'>
		<div class='col-sm-8'>
		<ul class='user-details'>
		<li>Username:<a href='user_profile.php?user_id=<?php echo $user_id ?>'><span> </span><?php echo $user_name ?></a></li>
		<li><span>Gender: </span><?php echo $gender ?></li>
		<li><span>Member Since: </span><?php echo $register_date ?></li>
		</ul>
		<a href='message/messages.php?user2_id=<?php echo $user_id ?>' class='btn btn-info'>Send message</a>
		</div>
		<div class='col-sm-4'>
		<img src='user/user_images/<?php echo $image ?>' class='img-circle' alt='image' width='180' height='180' >
		</div>
		</div>
		</div>
		</div>
		<?php }}	?>		
</div>               
<?php 
include( "footer.php" );
  ?>
