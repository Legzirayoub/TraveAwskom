<html lang="en-US">
<head>
<style>
ol.breadcrumb {
border: 1px solid;
padding: 10px;
background-color: #D3D3D3;
border-radius: 10px;
}
</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=500, initial-scale=1">
  <title>AWSKOM</title>
  <meta name="keywords" content="Flight search, hotel search, best flight and hotel, cheap air tickets, travel, travel forum">
  <meta name="description" content="Want to Compare Flight and Hotel deals or Looking for someone to travel with ? We really appreciate all of you taking time to get in touch in our travel forum">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="format-detection" content="telephone=yes">
  <link href="user/user_images/awskom.png" rel="shortcut icon">
  </head>
  <body>
    <div class="container-fluid">
    <div class="row">
    <div class="col-xs-7 col-sm-6 col-lg-8">
    <form action="" method="post" class="form-horizontal">                   
    <?php 
		$user 		= $_SESSION['user_email'];
		$get_user   = "SELECT * from users where user_email='$user'";
		$ferteh_user   = mysqli_query( $connection, $get_user );
		$row 		= mysqli_fetch_array( $ferteh_user );
		$user_id 	    = $row['user_id'];
		$user_name 		= $row['user_name'];
		$user_pass		= $row['user_pass'];
		$user_email		= $row['user_email'];
		$user_gender	= $row['user_gender'];
		$user_image 	= $row['user_image'];
		$register_date  = $row['register_date'];
		$user_posts = "SELECT  * from posts where user_id='$user_id'";
		$ferteh_posts = mysqli_query( $connection, $user_posts );
		$posts = mysqli_num_rows( $ferteh_posts );
		?>
	<ul class="list-group">
	<div class="form-group">
	<div class="col-sm-12">
	</div>
	</div>
	<div class="well">
        <div class="row clearfix">
        <div class="col-md-12 column">
        <h4 class="text-center">You need to <a href="index.php">Log In</a> or <a href="welcome.php">Register</a> To use <a  href="index.php"><img src ="img/awskom01.png" width="60px" alt="userpic" height="57px"> </a> and post comments.</h4>
        </div>
        </div>
        </div>                              
	<div class="form-group">
	<div class="col-sm-12">
	</div>
	</div>
	<div id="posts">
    <?php if ( isset( $_GET['post_id'] ) ) {
	$post_id = $_GET['post_id'];}
	$get_posts  = "SELECT * from posts where Visibility_id='1' order by post_date desc  ";
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
		$user_image = $row_user['user_image'];?>
        <div class='panel panel-primary'>
		<div class='panel-body'>
		<div class='col-sm-13'>
		<ol class='breadcrumb'>
        <img src='user/user_images/<?php echo $user_image  ;?>' class='img-circle' alt="userimage" width='50' height='50'>
		<li><a href='/'><?php echo $user_name ?></a></li>
		<li><?php echo $postdate ?></li>
		</ol>
		<h3><?php echo $posttitle ?></h3>
		<p><?php echo $content ?></p>
		<a href='/' class='btn btn-info'>Reply</a>
                <a href='/' type='button' value='$like'  id='linkeBtn' class='btn btn-info'><img src='like.png' alt="userimage" width='20px' height='20px' ></a>
                <a href='/' type='button' value='$unlike'  id='linkeBtn' class='btn btn-info'><img src='dislike.png' alt="userimage" width='20px' height='20px'></a>
                <div class='btn-group'>
                <?php  
        $user_comments = "SELECT comment_id from comments where post_id='$post_id'";
		$ferteh_comments  = mysqli_query( $connection, $user_comments );
		$comments = mysqli_num_rows( $ferteh_comments );?>
                <a href='/' class='navbar-brand'> View <?php echo $comments ?> comments</a>
                <hr>
                </div>
                </div>
		        </div>
		        </div>
                <?php } ?>
                </div>
                </div>  
<div class="col-xs-5 col-sm-6 col-lg-4"><?php travelwith();  ?></div>
 <?php   include( "footer.php" );  ?>
