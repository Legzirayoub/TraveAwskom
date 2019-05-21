<head>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' >
</head>
<div class="col-sm-3">
	<?php 
        session_start(); 
        include __DIR__ . "/../../Awskomfunction/connection.php";
		$user 		= $_SESSION['user_email'];
		$ara_user       = "SELECT * from users where user_email='$user'";
		$ferteh_user    = mysqli_query( $connection, $ara_user );
		$row 	        = mysqli_fetch_array( $ferteh_user );
                $post_id        = $row['post_id'];
	        $user_id        = $row['user_id'];
		$user_name      = $row['user_name'];
	        $user_posts     = "SELECT  * from posts where user_id='$user_id'";
		$ferteh_posts   = mysqli_query( $connection, $user_posts );
		$posts          = mysqli_num_rows( $ferteh_posts );
		$khtar_msg      = "SELECT * from messages where receiver='$user_id' AND status='unread' order by 1 DESC";
		$ferteh_msg     = mysqli_query( $connection, $khtar_msg );
		$msg            = mysqli_num_rows( $ferteh_msg );
                $ara_user       = "SELECT * from users where user_id='$user_id'";
		$ferteh_user    = mysqli_query( $connection, $ara_user );
		$row 	        = mysqli_fetch_array( $ferteh_user );
                $post_id        = $row['post_id'];
	        $user_id        = $row['user_id'];
		$user_name      = $row['user_name'];
		$comment_id     = $row['comment_id'];
                $user_comment   = "SELECT * from comments where post_id='$post_id' AND comment_id='$comment_id'";
		$ferteh_comment = mysqli_query( $connection, $user_comment );
		$comment        = mysqli_num_rows( $ferteh_comment );
                ?>
					               <a href="#" class="navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
					               <ul class="dropdown-menu">       
                                                       <li><a href="my_profile_like_user01.php?user_id=<?php echo $user_id; ?>" ><img src='user/user_images/<?php echo $user_image ?>' class='img-circle'  alt="Bear" width='20' height='20'> Profile</a>  </li>                 
                                                       <li><a href="travel-with.php?user_id=<?php echo $user_id; ?>" ><i class="fa fa-umbrella-beach"> Travel with</i></a></li>                    
                                                       <hr>
                                                       <?php $get_topics = "SELECT * from topics";
						       $ferteh_topics = mysqli_query( $connection, $get_topics );
						       while ( $row = mysqli_fetch_array( $ferteh_topics ) ) {
						       $topic_id = $row['topic_id'];
						       $topic_title = $row['topic_title'];
		                                       echo "<li><a href='Categorie.php?topic=$topic_id'>$topic_title</a></li>";}?><hr>
<li><a href="edit_profile.php?user_id=<?php echo $user_id; ?>" ><i class="fa fa-cogs"> Edit Account</i></a></li>                    
<li><a href="logout.php" >Logout</a></li></ul>
<a class="navbar-brand" ><i class="fas fa-grip-lines-vertical" style="font-size:15px;"></i></a>
<a class="navbar-brand" href="/../home.php"><i class="fa fa-home" style="font-size:18px;"></i></a><a class="navbar-brand" href="/../searchforsomeone.php"><i class="fa fa-globe" style="font-size:18px;" ></i></a>
<a class="navbar-brand" ><i class="fas fa-grip-lines-vertical" style="font-size:15px;"></i></a>
<a class="navbar-brand" href="message/M-messages.php?inbox&user_id=<?php echo $user_id; ?>"><i class="	far fa-envelope" style="font-size:18px;"><span class="badge badge-danger"><?php echo $msg; ?> </span></i></a>
<a class="navbar-brand" href="#"><i class="fa fa-bell" style="font-size:18px;"><span class="badge badge-info"><?php echo $comment; ?></span></i></a>
</div>
