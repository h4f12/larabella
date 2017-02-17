<?php include "db.php"; ?>
<?php session_start(); ?>
<?php
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$log_username = mysqli_real_escape_string($connect, $username);
	$log_password = mysqli_real_escape_string($connect, $password);

$query = "SELECT * FROM users WHERE user_name = '$log_username'";
$query_select_user = mysqli_query($connect, $query); 

	if(!$query_select_user){
		die("CONNECTION FAILED ". mysqli_error($connect));
	}
	// else{
	// 	echo "login successful. Welcome $user_name!";
	// }

while($row = mysqli_fetch_assoc($query_select_user)){
	$db_user_id = $row['user_id'];
	$db_user_name = $row['user_name'];
	$db_user_password = $row['user_password'];
	$db_user_firstname = $row['user_firstname'];
	$db_user_lastname = $row['user_lastname'];
	$db_user_role = $row['user_role'];
	}
	
	$log_password = crypt($log_password, $db_user_password);
	// echo the encrypted password (in DB):
	//echo $log_password = crypt($log_password, $db_user_password);

	if($log_username === $db_user_name && $log_password === $db_user_password){
		
		$_SESSION['id'] = $db_user_id;
		$_SESSION['username'] = $db_user_name;
		$_SESSION['firstname'] = $db_user_firstname;
		$_SESSION['lastname'] = $db_user_lastname;
		$_SESSION['role'] = $db_user_role;

		header("Location: ../admin");
	}
	else{
		header("Location: ../index.php");
	}
		

}

?>