<div class="col-sm-9">
			                <?php 
				        if ( isset( $_GET['post_id'] ) ) {
					$get_id = $_GET['post_id'];
					$get_post = "SELECT *  from posts where post_id='$get_id'";
					$ferteh_post = mysqli_query( $connection, $get_post );
					$row = mysqli_fetch_array( $ferteh_post );
					$post_title = $row['post_title'];
					$post_content = $row['post_content'];}?>
                        <form action="" method="post" class="form-horizontal">
			<h2>Edit your post</h2>
			<div class="form-group">
			<div class="col-sm-12">
			<input type="text" name="title" class="form-control" value="<?php echo $post_title; ?>">
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">
			<textarea name="content" class="form-control" cols="30" rows="10"><?php echo $post_content; ?></textarea>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">
			<select name="topic" class="custom-select">
			<option value="">Select a topic</option>
			<?php Gettopics(); ?>
			</select>
                        <select name="Visibility" class="custom-select" required>
			<option value="">Select Visibility</option>
			<?php getVisibility(); ?> 
			</select>                     
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">
			<input type="submit" name="update" class="btn btn-info pull-right" value="Update Post">
			</div>
			</div>
			</form>
			<?php 
				        if ( isset( $_POST['update'] ) ) {
					$title = $_POST['title'];
					$content = $_POST['content'];
					$topic_id = $_POST['topic'];
                                        $Visibility_id = $_POST['Visibility'];
					$update_post = "UPDATE posts set post_title='$title', post_content='$content', topic_id='$topic_id',Visibility_id='$Visibility_id' where post_id='$get_id'";
					$ferteh_update = mysqli_query( $connection, $update_post );
					if ( $ferteh_update ) {
					echo "<script>alert('Post has been updated succefully!')</script>";
					echo "<script>window.open('home.php')</script>";}}?></div><?php 
	                                include( "footer.php" ); ?>
