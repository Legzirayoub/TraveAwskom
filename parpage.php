<?php 
	
	$query = "SELECT * from posts";
	$result = mysqli_query( $connection, $query );
	$all_posts = mysqli_num_rows( $result );
	$all_pages = ceil( $all_posts / $pagenumber ); ?>

	<div class='clearfix'>
	<ul class='pagination' >
	<li><a href='home.php?page=1'>First Page</a></li>
<?php
	for ( $p = 1; $p <= $all_pages; $p++ ) {
		if ( $page == $p ) { ?>
			<li class='active'><a href='home.php?page=<?php echo $p ?>'><?php echo $p ?></a></li>
		<?php }else{ ?>
			<li><a href='home.php?page=<?php echo $p ?>'><?php echo $p ?></a></li>
		<?php }
	} ?>
	<li><a href='home.php?page=<?php echo $all_pages ?>'>Last Page</a></li>
	</ul>
	</div>