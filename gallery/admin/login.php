<?php require_once("includes/header.php"); ?>
<?php


///Check if the user already logged in
if($session->is_signed_in()) {
	redirect("index.php");
}

///If not signed in, hence the sign in process:
if(isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);


	///Method to check user database
	$user_found  = User::verify_user($username,$password);

	//echo "<h1>$user_found<h1>";

	if($user_found) {
		$session->login($user_found);
		redirect("index.php");
	}
	else {
		$the_message = "Your username or password is incorrect";
	}

}
else {
	$username = null;
	$password = null;
}

?>

<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php if(isset($the_message) ) {echo $the_message;} ?></h4>
	
<form id="login-id" action="" method="post">
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>">

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>


</form>


</div>

