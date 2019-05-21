<?php 
	session_start(); 
	include ( "Awskomfunction/connection.php" );
        include ( "Awskomfunction/Awskom.php" );
	if ( !isset( $_SESSION['user_email'] ) ) {
	header( "location: index.php" );
	}else {
	include ( "head/header/header.php" );
        include( "forum/header.php" );?>
		
                <div class="col-sm-9">
		<h2>Search results:</h2>
			
        <?php
	if ( isset( $_GET['search_topic'] ) ) {
	$search_term = $_GET['search_topic'];}
	$get_posts  = "SELECT * from posts where post_title like '%$search_term%' ORDER by 1 DESC";
	$ferteh_posts  = mysqli_query( $connection, $get_posts );
	$count_result = mysqli_num_rows( $ferteh_posts );
	if ( $count_result == 0 ) {
	echo "<div class='alert alert-danger' role='alert'>Oops Sorry, we do not have results for this topic !</div>";
	exit();}
	while ( $row_posts   = mysqli_fetch_array( $ferteh_posts ) ) {
		$post_id     = $row_posts['post_id'];
		$user_id     = $row_posts['user_id'];
		$post_title  = $row_posts['post_title'];
		$content     = $row_posts['post_content'];
		$post_date   = $row_posts['post_date'];
		$user        = "SELECT * from users where user_id='$user_id'";
		$ferteh_user = mysqli_query( $connection, $user );
		$row_user    = mysqli_fetch_array( $ferteh_user );
		$user_name   = $row_user['user_name'];
		$user_image  = $row_user['user_image']; ?>
		
			<div class   ='panel panel-default'>
		<div class   ='panel-body'>
		<div class   ='col-sm-2'>
		<img src='userimage/<?php echo $user_image ?>' class='img-circle' width='100' alt='image' height='100'>
		</div>
		<div class='col-sm-10'>
		<ol class='breadcrumb'>
		<li><a href='user_profile.php?user_id=<?php echo $user_id ?>'><?php echo  $user_name ?></a></li>
		<li><?php echo $post_date ?></li>
		</ol>
		<h3><?php echo $post_title ?></h3>
		<p><?php echo $content ?></p>
		<a href='One.php?post_id=<?php echo $post_id ?>' class='btn btn-info'>Reply</a>
		</div>
		</div>
		</div>
		<?php }} ?>
		</div>
<?php 
include( "footer.php" );
 ?>
