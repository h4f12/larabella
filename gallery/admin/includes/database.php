<?php
require_once("new_config.php");

class Database {

	public $connection;

	// alternative;
	// public $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	function __construct(){
		$this->open_db_connection();
	}

	public function open_db_connection() {
		// $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	// alternative;
	// $this->connection;

		if(mysqli_connect_errno()){
			die("CONNECTION TO DB FAILED ".$this->connection->connect_error);
		}
	}

	public function query($sql) {
		$result = $this->connection->query($sql);

		return $result;

		$this->confirm_query($result);
	}

	public function confirm_query() {
		if(!$result){
		die("Query Failed ".$this->connection->error);
		}
	}

	public function escape_string($string){
		$escaped_string = $this->connection->real_escape_string($string);
		return $escaped_string;
	}

	///To pull the id of the last row(then the id will be assign to object-prop $user-id)	
	public function the_insert_id() {
		return mysqli_insert_id($this->connection);
	}

}

$database = new Database();
