<html lang="Eng-us">
	<head>
	<meta charset="utf-8">
	<title>AWSKOM</title>
                <link href="userimage/awskom.png" alt="logo" rel="shortcut icon">
                <?php 
		$user 	       = $_SESSION['user_email'];
		$get_user      = "SELECT * from users where user_email='$user'";
		$ferteh_user   = mysqli_query( $connection, $get_user );
		$row 	       = mysqli_fetch_array( $ferteh_user );
		$user_id       = $row['user_id'];
		$user_name     = $row['user_name'];
		$user_pass     = $row['user_pass'];
		$user_email    = $row['user_email'];
		$user_gender   = $row['user_gender'];
		$user_image     = $row['user_image'];
		$register_date  = $row['register_date'];
		$user_posts = "SELECT  * from posts where user_id='$user_id'";
		$ferteh_posts = mysqli_query( $connection, $user_posts );
		$posts = mysqli_num_rows( $ferteh_posts );
		?>
                    </head>
	                <body>
					<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
                    <a  href="index.php"><img src ="img/logo.png" width="70px" height="70px"></a></div>				
					<div class="collapse navbar-collapse navbar-ex1-collapse">
                    <div class="navbar-form navbar-left">                                                            
<a href="logout.php"><button class="btn btn-info"><img src ="img/users.png" width="25px" alt="users" height="25px">Logout</button></a>
<a href="home.php"><button class="btn btn-info"><img src ="img/1f3d5.png" alt="forum" width="25px" height="25px">Forum </button></a>				
                    </div><form action="" method="post" class="navbar-form navbar-right" role="search">
			        <div class="form-group">                                                            
<form method="get" action="results.php" id="form1" class="navbar-form navbar-right" role="search">
			<div class="form-group">
			<input type="text" name="user_query" class="form-control" placeholder="Search a topic">
			</div>
			<input type="submit" name="search" class="btn btn-info" value="Search">
			</form>
			</div>
			<div class="form-group"> 	
<a href="user_profile.php?user_id=<?php echo $user_id; ?>" >  <img src="userimage/<?php echo $user_image; ?>" class="img-circle" width="50px" height="50px"alt="users"><?php echo $user_name; ?></a>
</div>
</form></div> 
