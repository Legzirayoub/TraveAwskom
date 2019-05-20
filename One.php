<?php 
	session_start(); 
	include ( "Aw-func/connection.php" );
        include ( "Aw-func/Aw.php" );
	if ( !isset( $_SESSION['user_email'] ) ) {
	header( "location: index.php" );
	}else {
	include ( "header/header.php" );
        ?>
		<div class="col-xs-7 col-sm-6 col-lg-8">
		<div id="posts">
		<?php if ( isset( $_GET['post_id'] ) ) {
		$get_id = $_GET['post_id'];
		$get_posts  = "SELECT * from posts where post_id='$get_id'";
		$ferteh_posts  = mysqli_query( $connection, $get_posts );
		$row_posts = mysqli_fetch_array( $ferteh_posts );
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
                <div class='panel panel-default'>
		<div class='panel-body'>
		<div class='col-sm-13'>
		<ol class='breadcrumb'>
                <img src='user/user_images/<?php echo $user_image ?>' class='img-circle' width='50' height='50'>
		<li><a href='user_profile.php?user_id=<?php echo $user_id ?>'><?php echo $user_name ?></a></li>
		<li><?php echo $post_date ?></li>
		</ol>
		<h3><?php echo $post_title ?></h3>
		<p><?php echo $content ?></p>
		</div>
		</div>
		</div>
		<?php
		if ( isset( $_POST['reply'] ) ) {
			$comment = $_POST['comment'];
			$user_email = $_SESSION['user_email'];
                        $IP = $_SERVER['REMOTE_ADDR'];
			$current_user = "SELECT * from users where user_email='$user_email'";
			$ferteh_current_user = mysqli_query( $connection, $current_user );
			$current_user_row = mysqli_fetch_array( $ferteh_current_user );
			$current_user_id = $current_user_row['user_id'];
			$insert = "INSERT into comments (post_id, user_id,comment,date,IP) values('$post_id','$current_user_id','$comment',NOW(),'".$IP."')";
			$ferteh = mysqli_query( $connection, $insert );
			}  
	        $get_id = $_GET['post_id'];
	        $get_comments = "SELECT * from comments where post_id='$post_id'";
	        $ferteh_query = mysqli_query( $connection, $get_comments );
	        while   ( $row = mysqli_fetch_array( $ferteh_query ) ) {
		$comment_user_id = $row['user_id'];
		$comment = $row['comment'];
		$comment_date = $row['date'];
		$user = "SELECT * from users where user_id='$comment_user_id'";
		$ferteh_user = mysqli_query( $connection, $user );
		$row_user = mysqli_fetch_array( $ferteh_user );
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
                ?>
		<div class='row single-comment'>
		<div class='col-sm-10'>
		<div class='panel panel-default'>
		<div class='panel-heading'>
                <div class='col-sm-2'>
		<div class='thumbnail'>
		<img src='user/user_images/<?php echo $user_image ?>' class='img-circle'>
		</div>
		</div>
		<strong><a href='user_profile.php?user_id=<?php echo $comment_user_id ?>'><?php echo $user_name ?></a></strong>
		<span>commented<?php echo $comment_date ?></span>
		</div>
		<div class='panel-body'>
		<p><?php echo $comment ?></p>
		</div>
		</div>
		</div>
		</div>
                <?php } ?>
                <form action='' method='post' class='form-horizontal'>
		<div class='form-group'>
		<div class='col-sm-12'>
		<textarea name='comment' class='form-control' cols='30' rows='10' placeholder=' reply...' required></textarea>
		</div>
		</div>
		<div class='form-group'>
	        <div class='col-sm-12'>
		<input type='submit' name='reply' class='btn btn-info pull-right' value='Reply'>
		</div>
		</div>
		</form>						
	        <?php  }}  ?>
		</div>
		</div>
<?php 
include( "footer.php" );
?>