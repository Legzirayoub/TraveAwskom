<?php include __DIR__ . "/../../forum/header.php"; ?>
<?php 
		$user 	        = $_SESSION['user_email'];
		$get_user       = "SELECT * from users where user_email='$user_email'";
		$ferteh_user    = mysqli_query( $connection, $get_user );
		$row 	        = mysqli_fetch_array( $ferteh_user );
		$user_id        = $row['user_id'];
		$user_name      = $row['user_name'];
		$user_pass      = $row['user_pass'];
		$user_email     = $row['user_email'];
		$user_gender    = $row['user_gender'];
		$user_image     = $row['user_image'];
		$register_date  = $row['register_date'];
		$user_posts     = "SELECT  * from posts where user_id='$user_id'";
		$ferteh_posts   = mysqli_query( $connection, $user_posts );
		$posts          = mysqli_num_rows( $ferteh_posts );
	?>
<!DOCTYPE html>
<html lang="en-US">
<body>
<header id="header">
	<nav class="navbar navbar-default" role="navigation">
			<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
						       </button>
						       </div>
				                       <?php include ( "countermsg.php" ); ?>
						       <ul class="nav navbar-nav navbar-right">
			</ul><div class="collapse navbar-collapse navbar-ex1-collapse">
			<form method="get" action="results.php" id="form1" class="navbar-form navbar-right" role="search">
			<div class="form-group">
			<input type="text" name="search_topic" class="form-control" placeholder="Search a topic">
			</div>
			<input type="submit" name="search" class="btn btn-info" value="Search">
			</form>
			</div>
			</div>
			</div>
			</nav>
		        </header>
		        <section id="content">
		        <div class="container">
		        <div class="row">
