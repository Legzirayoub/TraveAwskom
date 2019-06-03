<head>
<style>
ol.breadcrumb {
border: 1px solid;
padding: 10px;
background-color: #D3D3D3;
border-radius: 10px;
}
</style>
<div class="container-fluid">
<div class="row">
<div class="col-sm-2"> Categories<hr> 
                                                       <?php $get_topics = "SELECT * from topics";
						       $ferteh_topics    = mysqli_query( $connection, $get_topics );
						       while ( $row      = mysqli_fetch_array( $ferteh_topics ) ) {
						       $topic_id         = $row['topic_id'];
						       $topic_title      = $row['topic_title'];
		                                       echo "<li><a href='travelcategorie.php?topic=$topic_title'>$topic_title</a></li>";}?><hr>
</div>
<div class="col-sm-6">
<form action="home.php" method="post" class="form-horizontal">
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
		$user_posts     = "SELECT  * from posts where user_id='$user_id'";
		$ferteh_posts   = mysqli_query( $connection, $user_posts );
		$posts          = mysqli_num_rows( $ferteh_posts );
?>
   <ul class="list-group">
   <div class="form-group">
        <div class="col-sm-12">
        <div class="well">
        <div class="row clearfix">
        <div class="col-md-12 column">
        <div class = "panel-heading">
		
<h3 class = "panel-title"> <a href="my_profile_like_user01.php?user_id=<?php echo $user_id; ?>"><img src="userimage/<?php echo $user_image; ?>" class="img-circle"  alt="Bear" width="30px" height="30px"></a> <?php echo $user_name; ?> Creat post</h3>
</div>
<textarea name="content" class="form-control" cols="15" rows="4" placeholder="<?php echo $user_name; ?> : What's in your mind ?" required></textarea>
<hr><label class="coveruploadBtn p_c_upload">
                            <span class="fa fa-camera"></span>
                            <input type="file" style="display: none;" name="coveruploadfield" onchange="profileCoverPhoto(this)" />
                            </label>
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Post">
                                <select name="topic" class="custom-select">
				<option value="">Categorie</option>
				<?php getTopics(); ?>
				</select>
                                <select name="Visibility" class="custom-select" required>
				<option value="">Visibility</option>
				<?php getVisibility(); ?> 
				</select>
                                </div>
				</div>                                                                
				<div class="form-group">
				<div class="col-sm-12">
				</div>
				</div>
			        <?php insertPost(); ?>
				</div></div>
				</div> 
			        <div id="posts">
	<?php if ( isset( $_GET['user_id'] ) ) {
	$user_id = $_GET['user_id'];}
	$topic_title = $_GET['topic'];
        $get_posts  = "SELECT * from posts where Visibility_id='1' order by post_date desc ";
	$ferteh_posts  = mysqli_query( $connection, $get_posts );
	while ( $row_posts = mysqli_fetch_array( $ferteh_posts ) ) {
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$post_title = $row_posts['post_title'];
		$content = $row_posts['post_content'];
		$post_date = $row_posts['post_date'];
                $topic_title = $row_posts['topic_title'];
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
        <img src='userimage/<?php echo $user_image ?>' class='img-circle'  alt="Bear" width='50' height='50'>
                <?php echo $user_name ?></a>
                <i class='fas fa-angle-right'><?php echo "<li><a href='travelcategorie.php?topic=$topic_title'>$topic_title</a></li>"; ?></i>
                </li>
		<li><?php echo $post_date ?></li>
                </ol>
                <hr>
		<p><?php echo $content ?></p><hr>
		<a href='One.php?post_id=<?php echo $post_id ?>' class='btn btn-primary'>Reply</a>
                <a  onclick="javascript:doAction('<?php echo $id;?>','like');">Like (<span id="<?php echo $id; ?>_likes"><?php echo $data->liked; ?></span>)</a>
	        <a  onclick="javascript:doAction('<?php echo $id;?>','unlike');">Unlike (<span id="<?php echo $id; ?>_unlikes"><?php echo $data->unliked; ?></span>)</a>    
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
                <?php }?>
                </div>
                </div>  
                <div class="col-sm-3">
                        <h2>Need a Travel Companion ?
			<form method="get" action="results2.php" id="form" class="navbar-form navbar-right" role="search">
			<div class="form-group">
                        <div class="col-sm-8">
			<input type="text" name="search_person" class="form-control" placeholder="Search for a person">
			</div>
                        <div class="col-sm-1">
                        <input type="submit" name="search" class="btn btn-warning" value="Search">
                        </div>
                        </div>
			</form>
			</h2>
			<div class="row">			  
		        </div><br>
<?php travelwith();?>
<div class='thumbnail'>
<a href='home2.php'>Display all interested traveller</a>
</div>
</div>
