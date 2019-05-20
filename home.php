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
  <title>AWSKOM FLIGHT | HOTEL SEARCH AND TRAVEL FORUM</title>
  <meta name="keywords" content="Flight search, hotel search, best flight and hotel, cheap air tickets, travel, travel social network">
  <meta name="description" content="Want to Compare Flight and Hotel deals or Looking for someone to travel with ? We really appreciate all of you taking time to get in touch in our travel forum">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="format-detection" content="telephone=yes">
  <link href="user/user_images/awskom.png" rel="shortcut icon">
</head>
<div class="container-fluid">
<div class="row">
<div class="col-xs-6 col-sm-5 col-lg-7">
<form action="home.php?id=<?php echo $user_id; ?>" method="post" class="form-horizontal">
<?php 
		$user 		= $_SESSION['user_email'];
		$get_user       = "SELECT * from users where user_email='$user'";
		$ferteh_user    = mysqli_query( $connection, $get_user );
		$row 		= mysqli_fetch_array( $ferteh_user );
		$user_id 	= $row['user_id'];
		$user_name 	= $row['user_name'];
		$user_pass	= $row['user_pass'];
		$user_email	= $row['user_email'];
		$user_gender	= $row['user_gender'];
		$user_image 	= $row['user_image'];
		$register_date  = $row['register_date'];
		$user_posts = "SELECT  * from posts where user_id='$user_id'";
		$ferteh_posts = mysqli_query( $connection, $user_posts );
		$posts = mysqli_num_rows( $ferteh_posts );
		$sel_msg = "SELECT * from messages where receiver='$user_id' AND status='unread' order by 1 DESC";
		$ferteh_msg = mysqli_query( $connection, $sel_msg );
		$count_msg = mysqli_num_rows( $ferteh_msg );?>
	<a href="my_profile_like_user01.php?user_id=<?php echo $user_id; ?>"><img src="user/user_images/<?php echo $user_image; ?>" class="img-circle"  alt="Bear" width="50px" height="50px"><?php echo $user_name; ?></a>: What's in your mind ?<img src="user/user_images/270f.png"  alt="Bear" width="20px" height="20px" >
	<ul class="list-group">
	<div class="form-group">
	<div class="col-sm-12">
        <input type="text" name="title" class="form-control" placeholder="Title" required>
	<textarea name="content" class="form-control" cols="30" rows="10" placeholder="If you want to write a text . To organise it please follow this construction :
<p>For a paragraph ... </p>
For an ordered list use :
<ol>
  <li>1.TEXT</li>
  <li>2.TEXT</li>
  <li>3.TEXT</li>
</ol>
For an unordered list use :
<ul>
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ul>
if just a comment write it normal without tags . " required></textarea>
                                <input type="submit" name="sub" class="btn btn-info pull-right" value="Post">
                                <select name="topic" class="custom-select">
				<option value="">Categorie</option>
				<?php Gettopics(); ?>
				</select>
                                <select name="Visibility" class="custom-select" required>
				<option value="">Visibility</option>
				<?php GetVisibility(); ?> 
				</select>
                                </div>
				</div>                                                                
				<div class="form-group">
				<div class="col-sm-12">
				</div>
				</div>
			        <?php Insertpost(); ?>
			        <div id="posts">
				<?php if ( isset( $_GET['user_id'] ) ) {
	$user_id = $_GET['user_id'];}
        
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
		$user_image = $row_user['user_image']; ?>
                <div class='panel panel-primary'>
		<div class='panel-body'>
                <div class='col-sm-1'>
                <a href="#" class="navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
		<ul class="dropdown-menu">       
                <li><a href="#" >evaluate comment</a></li>                    
                <li><a href="#" >Save comment</a></li>										
                </ul></div>
		<div class='col-sm-10'>
		<ol class='breadcrumb'>
		<li><a href='user_profile.php?user_id=<?php echo $user_id ?>'>
                <img src='user/user_images/<?php echo $user_image ?>' class='img-circle'  alt="Bear" width='50' height='50'>
                <?php echo $user_name ?></a></li>
		<li><?php echo $post_date ?></li>
                </ol>
		<h3><?php echo $post_title ?></h3>
		<p><?php echo $content ?></p>
		<a href='One.php?post_id=<?php echo $post_id ?>' class='btn btn-info'>Reply</a>
                <?php if ( isset( $_POST['like'] ) ) {
		$user_id = $_POST['user_id'] ;
		$content = $_POST['post_id'];
		$like_id = $_POST['like_id'];
		$insert = "INSERT into likes(post_id,user_id,like_id) values('$post_id','$user_id','$like_id')";
		$ferteh = mysqli_query( $connection, $insert );
                } ?>
                <a href='home.php?post_id=<?php echo $post_id ?>' type='button' name="like" value="POST"  class='btn btn-info'><img src='like.png'  alt="Bear" width='20px' height='20px'  ></a>
                <div class='btn-group'>
                <?php
                $user_comments = "SELECT comment_id from comments where post_id='$post_id'";
		$ferteh_comments  = mysqli_query( $connection, $user_comments );
		$comments = mysqli_num_rows( $ferteh_comments ); ?>
                <a href='One.php?post_id=<?php echo $post_id ?>' class='navbar-brand'>View <?php echo $comments ?> comments </a>
                <hr>
                </div>
                </div>
	        </div>
	        </div>
<?php } include( "parpage.php" ); ?>
                </div>
                </div>  
                <div class="col-xs-6 col-sm-5 col-lg-5">
           
<?php travel_with();?>
<div class='thumbnail'>
<a href='home2.php'>Display all interested traveller</a>
</div>
</div>
                </div>
                </div>
                </div>
                <?php  ?>
