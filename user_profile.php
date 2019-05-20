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
<style>
ol.breadcrumb {
border: 1px solid;
padding: 10px;
background-color: #D3D3D3;
border-radius: 10px;
}
</style>
<div class="col-sm-9">
                <?php
		if ( isset( $_GET['user_id'] ) ) {
		$user_id = $_GET['user_id'];
		$select = "SELECT * from users where user_id='$user_id'";
		$ferteh = mysqli_query( $connection, $select );
		$row = mysqli_fetch_array( $ferteh);
		$id = $row['user_id'];
		$image = $row['user_image'];
		$name = $row['user_name'];
		$gender = $row['user_gender'];
		$register_date = $row['register_date']; ?>
		<div class='panel panel-info' >
		<div class='panel-heading'><strong>User information :</strong></div>
		<div class='panel-body'>
		<div class='row'>
		<div class='col-sm-8'>
		<ul class='user-details'>
		<li><span>Name: </span><?php echo $name ?></li>
		<li><span>Gender: </span><?php echo $gender ?></li>
		<li><span>Member Since: </span><?php echo $register_date ?></li>
		</ul>
		<a href='message/messages.php?user2_id=<?php echo $user_id ?>' class='btn btn-info'>Message <?php echo $name ?></a>
		</div>
		<div class='col-sm-4'>
		<img src='user/user_images/<?php echo $image ?>' class='img-circle' width='180' alt='users' height='180' >
		</div>
		</div>
		</div>
		</div>
		<?php }} ?>  
<div id="posts">
<br>
<?php 	if ( isset( $_GET['user_id'] ) ) {
	$user_id = $_GET['user_id'];}
	$get_posts  = "SELECT * from posts where user_id='$user_id' ORDER by 1 DESC";
	$ferteh_posts  = mysqli_query( $connection, $get_posts );
	while ( $row_posts = mysqli_fetch_array( $ferteh_posts ) ) {
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$post_title = $row_posts['post_title'];
		$content = $row_posts['post_content'];
		$post_date = $row_posts['post_date'];
		$user = "SELECT * from users where user_id='$user_id' AND posts='yes'";
		$ferteh_user = mysqli_query( $connection, $user );
		$row_user    = mysqli_fetch_array( $ferteh_user );
		$user_name   = $row_user['user_name'];
		$user_image  = $row_user['user_image']; ?>
		<div class='panel panel-primary'>
		<div class='panel-body'>
		<div class='col-sm-13'>
		<ol class='breadcrumb'>
                <img src='user/user_images/<?php echo $user_image ?>' class='img-circle' alt='users' width='50' height='50'>
		<li><a href='user_profile.php?user_id=$user_id'><?php echo $user_name ?></a></li>
		<li><?php echo $post_date ?></li>
		</ol>
		<h3><?php echo $post_title ?></h3>
		<p><?php echo $content ?></p>
		<div class='btn-group'>
		<a href='One.php?post_id=<?php echo $post_id ?>' class='btn btn-info'>Reply</a>
		</div>
		</div>
		</div>
		</div>
		<?php } ?>
		</div>
		</div>
<?php
include( "footer.php" );
?>