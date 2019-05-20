<?php 
	session_start(); 
	include ( "Awskomfunction/connection.php" );
        include ( "Awskomfunction/Awskom.php" );
	if ( !isset( $_SESSION['user_email'] ) ) {
	header( "location: index.php" );
	}else {
        include ( "head/header/header.php" );
        include( "forum/header.php" );
        ?>
		        <div class="col-sm-9">
			<h2>You search for someone ? 
			<form method="get" action="results2.php" id="form" class="navbar-form navbar-right" role="search">
			<div class="form-group">
			<input type="text" name="search_person" class="form-control" placeholder="Search for a person">
			</div>
			<input type="submit" name="search" class="btn btn-warning" value="Search">
			</form>
			</h2>
			<div class="row">			  
		        </div>
		        </div>
<?php 
include( "footer.php" );} ?>
