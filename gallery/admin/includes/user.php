<?php

class User extends Db_object {

	///Creating properties to be used as object later on
	protected static $db_table = "users";
	protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;

	



////// Verifying user's: checking if username & password are in DB and match (during login)
	public static function verify_user($username, $password) {
		global $database;
		///sanatization:
		$username = $database->escape_string($username);
		$password = $database->escape_string($password);

		$sql = "SELECT * FROM ".self::$db_table." WHERE username = '$username' AND password = '$password' LIMIT 1";

		$the_result_array = self::find_by_query($sql);

		return !empty($the_result_array) ? array_shift($the_result_array) : false;

	}
	






}
//End of class User


// $user = new User();



?>





