<?php include __DIR__ . "/../forum/header.php"; ?>
<?php 
		$user 	    = $_SESSION['user_email'];
		$get_user   = "SELECT * from users where user_email='$user'";
		$ferteh_user   = mysqli_query( $connection, $get_user );
		$row 	    = mysqli_fetch_array( $ferteh_user );
		$user_id    = $row['user_id'];
		$user_name  = $row['user_name'];
		$user_pass  = $row['user_pass'];
		$user_email = $row['user_email'];
		$user_gender= $row['user_gender'];
		$user_image = $row['user_image'];
		$register_date  = $row['register_date'];
		$user_posts = "SELECT  * from posts where user_id='$user_id'";
		$ferteh_posts = mysqli_query( $connection, $user_posts );
		$posts = mysqli_num_rows( $ferteh_posts );
		$sel_msg = "SELECT * from messages where receiver='$user_id'";
		$ferteh_msg = mysqli_query( $connection, $sel_msg );
		$count_msg = mysqli_num_rows( $ferteh_msg );
	?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta name="google-site-verification" content="5pLi041onTkwAX7e1Yy73SMAEKOSWVqzgLgaycwhYwQ" />
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131233400-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-131233400-1');
</script>
		<meta charset="utf-8">
                <meta name="viewport" content="width=500, initial-scale=1">
                <meta name="keywords" content="Flight search, hotel search, best Flight and Hotel deals, cheap air tickets, travel, travel forum , live message">
                <meta name="description" content="Want to Compare Flight and Hotel deals or Looking for someone to travel with ? We really appreciate all of you taking time to get in touch in our travel forum">
		<title>AWSKOM FLIGHT | HOTEL SEARCH AND TRAVEL FORUM</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                <link href="user/user_images/awskom.png" rel="shortcut icon  " alt="userimage">
</head>
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
                                                         <a class="navbar-brand" href="#">Awskom</a>

						       </div>
				                       <?php include ( "counter.php" ); ?>
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
			</nav>
		        </header>
		        <section id="content">
		        <div class="container">
		        <div class="row">