<?php
if(count($_POST)>0) {
	foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	$message = ucwords($key) . " field is required ";
	$type = "error";
	break;
	}}
        if(strlen(trim($_POST["user_pass"])) < 8){
        $message = "Password must have atleast 8 characters.";
        $type = "error";
        }
	if($_POST['user_pass'] != $_POST['confirm_password']){ 
	$message = 'Passwords should be same<br>'; 
	$type = "error";
	}
        if(!isset($message)) {
		require_once("lib/db.php");
		$db_handle = new CONNECTTODB();
		$query = "SELECT * FROM users where user_email = '" . $_POST["user_email"] . "' OR user_name= '" . $_POST["user_name"] . "' ";                		
		$count = $db_handle->numRows($query);
		if($count==0) {
                $status  = "0";
	        $verification_code = mt_rand();
                $IP = $_SERVER['REMOTE_ADDR'];
                $query = "INSERT INTO users (user_name, user_pass, user_email, user_gender , verification_code , status ,register_date, last_login, user_image , IP ) VALUES
                ('" . $_POST["user_name"] . "','" . $_POST["user_pass"] . "', '" . $_POST["user_email"] . "', '" . $_POST["user_gender"] . "','$verification_code','{$status}',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,'default.png','".$IP."')";
                $current_id = $db_handle->insertQuery($query);
		                if(!empty($verification_code)) {
				$actual_link = "https://$_SERVER[HTTP_HOST]"."/activate.php?verification_code=".$verification_code;
				$toEmail = $_POST["user_email"];
                                $mailHeaders = 'From: Awskom<admin@awskom.com>' . "\r\n";
                                $subject = 'Signup | Verification'; 
                                $content = '
                                                                                        Welcome to Awskom :
         
Username : '.$_POST["user_name"].' .  
Email : '.$_POST["user_email"].' .
Gender : '.$_POST["user_gender"].' .

Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

------------------------
Click this link to activate your account : ' . $actual_link . '
------------------------

thank you for being a member of our discussion group .
In case of problems , please contact us - admin@awskom.com -.

Regards,
Awskom Team
';

				if(mail($toEmail, $subject, $content, $mailHeaders)) {
				$message = "We have sent an email with a confirmation link to your email address. In order to complete the sign-up process, please click the confirmation link. If you do not receive a confirmation email, please check your spam folder.Please verify that you entered a valid email address in our sign-up form.";	
				$type = "success";
				}
				unset($_POST);
			        } else {
				$message = "Problem in registration. Try Again later !";	
			        }
		                } else {
			        $message = "User Email or Username is already in use , Please select another username|Email or reset your password ";	
			        $type = "error";}}}
?>
<html>
<?php include 'forum/header.php'?>
<?php include 'flight/head.php'?>
<head>
<style>
input.rounded {
	border: 1px solid #ccc;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
	-moz-box-shadow: 2px 2px 3px #666;
	-webkit-box-shadow: 2px 2px 3px #666;
	box-shadow: 2px 2px 3px #666;
	font-size: 20px;
	padding: 4px 7px;
	outline: 0;
	-webkit-appearance: none;
}
input.rounded:focus {
	border-color: #339933;
}
</style>
</head>
<body><div class="wrapper">
<div class="container">
<h2><font color="black">Welcome to Awskom</font></h2>
<div class="row">
<div class="vl">
</div> 
<div class="col">
<h3><font color="black">Be part of the discussion!</h3>
<form name="Registration" method="post" action="">
<table border="0" width="350" >
<?php if(isset($message)) { ?>
<div class='panel-heading'><strong><?php echo $message; ?></strong></div>
<?php } ?>
<tr>
<br><input type="text" class="rounded" placeholder="Username" name="user_name" value="<?php if(isset($_POST['user_name'])) echo $_POST['user_name']; ?>" required></td>
<br>
<tr>
<br><input type="password" class="rounded" placeholder="Password" name="user_pass" value="" required></td>
<br>
<tr>
<br><input type="password" class="rounded" placeholder="Confirm Password" name="confirm_password" value="" required></td>
<br>
<tr>
<br><input type="email" class="rounded" placeholder="Email" name="user_email" value="<?php if(isset($_POST['user_email'])) echo $_POST['user_email']; ?>" required></td>
<br>
<tr><br>
<input type="radio" name="user_gender" value="Male" <?php if(isset($_POST['user_gender']) && $_POST['user_gender']=="Male") { ?>checked<?php  } ?>> Male
<input type="radio" name="user_gender" value="Female" <?php if(isset($_POST['user_gender']) && $_POST['user_gender']=="Female") { ?>checked<?php  } ?>> Female
<tr>
<br>
<td><input type="checkbox" name="terms">I accept<a href="policy.php">Terms and Conditions</td>
</table><br>
<input type="submit" name="submit" value="Register" class="btn btn-primary">
</div>
<div class="col">
<div class="hide-md-lg">
</div>
<h2><font color="black">Already have an account ?<a href="index.php"><br>login</a></font></h2>
</div>
</div>
</div>
</div>
</div> 
</div>
</div>
</div>
<?php  include( "footer.php" ); ?>
</body>
