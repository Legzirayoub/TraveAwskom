<?php 
	session_start(); 
	include ( "Awskomfunction/connection.php" );
        include ( "Awskomfunction/Awskom.php" );
	if ( !isset( $_SESSION['user_email'] ) ) {
	header( "location: index.php" );
	}else {
        include ( "header/header.php" );
        include( "style/header.php" );
?>
<div class="col-sm-9">
	                        <div class="form-group">
				<div class="col-sm-12">
				</div>
				</div>
				<div class="form-group">
				<div class="col-sm-12">
				</div>
				</div>
				<div class="form-group">
				<div class="col-sm-12">
				</div>
				</div>
				<div class="form-group">
				<div class="col-sm-12">
				</div>
				</div>
		                <div id="posts">
                                <?php 
	            if ( isset( $_GET['topic'] ) ) {
                    $topic_id = $_GET['topic'];
					$query = "SELECT * from topics where topic_id='$topic_id'";
					$ferteh_query = mysqli_query( $connection, $query );
					$row = mysqli_fetch_array( $ferteh_query );
					$topic_name = $row['topic_title'];
				       }?>
                       <h3>All post in '<?php echo $topic_name; ?>' Topic.</h3>
		       <?php if ( isset( $_GET['topic'] ) ) {
	$topic_id = $_GET['topic'];}
	$get_posts  = "SELECT * from posts where topic_id='$topic_id' ORDER by 1 DESC";
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
		<div class='panel panel-default'>
		<div class='panel-body'>
		<div class='col-sm-2'>
		<img src='userimage/<?php echo $user_image ?>' class='img-circle' width='100' height='100' alt='userimage'>
		</div>
		<div class='col-sm-10'>
		<ol class='breadcrumb'>
		<li><a href='user_profile.php?user_id=<?php echo $user_id ?>'><?php echo $user_name ?></a></li>
		<li><?php echo $post_date ?></li>
		</ol>
		<h3><?php echo $post_title ?></h3>
		<p><?php echo $content ?></p>
		<a href='One.php?post_id=<?php echo $post_id ?>' class='btn btn-info'>Reply</a>
                <div class='btn-group'>
                <?php
                        $user_comments         = "SELECT comment_id from comments where post_id='$post_id'";
		        $ferteh_comments       = mysqli_query( $connection, $user_comments );
		        $comments              = mysqli_num_rows( $ferteh_comments ); ?>
                <a href='One.php?post_id=<?php echo $post_id ?>' class='navbar-brand'>View <?php echo $comments ?>comments </a>
                <hr>
                </div>
		</div>
		</div>
		</div>
		<?php }} ?></div></div>             
<?php 
include( "footer.php" );
?>
