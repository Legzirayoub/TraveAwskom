<?php 
session_start(); 
include ( "Aw-func/connection.php" );
include ( "Aw-func/Aw.php" );
if ( !isset( $_SESSION['user_email'] ) ) {
header( "location: index.php" );
}else {
include ( "header/header.php" );
include( "style/header.php" );
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
<div id="posts">
<h2>All your posts:</h2>
<br>
<?php
if ( isset( $_GET['user_id'] ) ) {
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
		$row_user = mysqli_fetch_array( $ferteh_user );
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image']; ?>
		<div class='panel panel-primary'>
		<div class='panel-body'>
		<div class='col-sm-2'>
		<img src='user/user_images/<?php echo $user_image ?>' class='img-circle' width='100' height='100' alt='userimage'>
		</div>
		<div class='col-sm-10'>
		<ol class='breadcrumb'>
		<li><a href='user_profile.php?user_id=<?php echo $user_id ?>'><?php echo $user_name ?></a></li>
		<li><?php echo $post_date ?></li>
		</ol>
		<h3><?php echo $post_title ?></h3>
		<p><?php echo $content ?></p>
                <div class='btn-group'>
                <?php
                $user_comments    = "SELECT comment_id from comments where post_id='$post_id'";
		        $ferteh_comments  = mysqli_query( $connection, $user_comments );
		        $comments         = mysqli_num_rows( $ferteh_comments ); ?>
                <a href='One.php?post_id=$post_id' class='navbar-brand'>View <?php echo $comments ?> comments </a>
                <hr>
                </div>
		<div class='btn-group'>
		<a href='changepost.php?post_id=<?php echo $post_id ?>' class='btn btn-info'>Edit</a>
		<a href='Aw-func/delete_post.php?post_id=<?php echo $post_id ?>' class='btn btn-danger'>Delete</a>
		</div>
		</div>
		</div>
		</div>
		<?php }} ?>
		</div>
		</div>
        <?php  
include( "footer.php" );
 ?>