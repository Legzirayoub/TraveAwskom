<?php 
	session_start(); 
	include ( "Awskomfunction/connecttodatabase.php" );
	include ( "Awskomfunction/Awskom.php" );
	if ( !isset( $_SESSION['user_email'] ) ) {
	header( "location: index.php" );
	}else {
        include ( "head/header/header.php" );
        include( "style/header.php" );
?>
<head>
<style>
ol.breadcrumb {
padding: 10px;
background-color: #D3D3D3;
border-radius: 10px;
}
</style>
<div class="well">
<div class="row clearfix">
<div class="col-md-12 column">
<?php
		if ( isset( $_GET['user_id'] ) ) {
		$user_id = $_GET['user_id'];
		$select = "SELECT * from users where user_id='$user_id'";
		$ferteh = mysqli_query( $connection, $select );
		$row = mysqli_fetch_array( $ferteh);
		$id = $row['user_id'];
		$image = $row['user_image'];
		$name = $row['user_name'];
		$gender = $row['user_gender'];
		$register_date = $row['register_date'];} ?>
                <div class='col-sm-4'>
		<img src='userimage/<?php echo $image ?>' class='img-circle' width='80' alt='users' height='80' >
</div>
<div class='col-sm-4'>
<a href='message/Mymessage.php?user2_id=<?php echo $user_id ?>' class='btn btn-primary'>Message <?php echo $name ?></a>
<button cursor='pointer' class='btn btn-primary' onClick=\"addfriend(".$user2_id.");\">Add Friend</button>
</div>
</div></div></div>
<div class="container">
<div class="container-fluid">
<div class="row">
<div class="col-sm-3">
<?php
		if ( isset( $_GET['user_id'] ) ) {
		$user_id       = $_GET['user_id'];
		$select        = "SELECT * from users where user_id='$user_id'";
		$ferteh        = mysqli_query( $connection, $select );
		$row           = mysqli_fetch_array( $ferteh);
		$id            = $row['user_id'];
		$image         = $row['user_image'];
		$name          = $row['user_name'];
		$gender        = $row['user_gender'];
		$register_date = $row['register_date']; ?>
		<div class='panel panel-info' >
		<div class='panel-body'>
		<div class='row'>
		<div class='col-sm-9'>
		<ul class='user-details'>
                <hr>
		<li><span>Name: </span><?php echo $name ?></li>
		<li><span>Gender: </span><?php echo $gender ?></li>
		<li><span>Member Since: </span><?php echo $register_date ?></li>
                <hr>
		</ul>		 
<style>
.active{
cursor: pointer;
background-color: #0066CC; }
.inactive{
background-color: #EEEEEE; }
</style>
                </div>
		<div class='col-sm-4'>
		</div>
		</div>
		</div>
		</div>
		<?php } ?>  
</div>
<div class="col-sm-7"><div id="posts">
	<?php 	if ( isset( $_GET['user_id'] ) ) {
	$user_id = $_GET['user_id'];}
	$get_posts           = "SELECT * from posts where user_id='$user_id' order by post_date desc ";
	$ferteh_posts        = mysqli_query( $connection, $get_posts );
	while ( $row_posts   = mysqli_fetch_array( $ferteh_posts ) ) {
		$post_id     = $row_posts['post_id'];
		$user_id     = $row_posts['user_id'];
		$post_title  = $row_posts['post_title'];
		$content     = $row_posts['post_content'];
		$post_date   = $row_posts['post_date'];
                $topic_title = $row_posts['topic_title'];
		$user        = "SELECT * from users where user_id='$user_id' AND posts='yes'";
		$ferteh_user = mysqli_query( $connection, $user );
		$row_user    = mysqli_fetch_array( $ferteh_user );
		$user_name   = $row_user['user_name'];
		$user_image  = $row_user['user_image']; ?>
		<div class='panel panel-primary'>
		<div class='panel-body'>
		<div class='col-sm-13'>
		<ol class='breadcrumb'>
                <img src='userimage/<?php echo $user_image ?>' class='img-circle' alt='users' width='50' height='50'>
		<li><a href='user_profile.php?user_id=$user_id'><?php echo $user_name ?></a> 
		<i class='fas fa-angle-right'><?php echo "<li><a href='travelcategorie.php?topic=$topic_title'>$topic_title</a></li>"; ?></i>
                </li>
                <li><?php echo $post_date ?></li>
		</ol>
		<p><?php  echo $content ?></p>
		<div class='btn-group'>
		<a href='One.php?post_id=<?php echo $post_id ?>' class='btn btn-info'>Reply</a>
		</div>
		</div>
		</div>
		</div>
                <?php }  ?>
		</div>
		</div>
<?php  include ("footer.php"); } ?>
