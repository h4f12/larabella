<?php

class Db_object {

protected function properties() {
		 $properties = array();

		 foreach(static::$db_table_fields as $db_field) {
		 	if(property_exists($this, $db_field)) {
		 		$properties[$db_field] = $this->$db_field;
		 	}
		 }
		 return $properties;
	}

	protected function clean_properties() {
		global $database;

		$clean_properties = array();

		foreach($this->properties() as $key => $value) {

			$clean_properties[$key] = $database->escape_string($value);
		}
		return $clean_properties;
	}

// ------------------------------------------------------------
///Query Methods:

//////1 Global Query Method 
	///  (end result will be like mysqli_query($sql), and the array of values (belong to user row) defined as objects:
	public static function find_by_query($sql) {

		global $database;
		$result_set = $database->query($sql);
		$the_object_array = array();

		while($row = mysqli_fetch_array($result_set)) {
			$the_object_array[] = static::instantiation($row);
		}

		return $the_object_array;
	}

			///1.1 Converting array-values, fetched from the row of the object's table, to be defined as $object->prop:
			public static function instantiation($user_array) {

			$calling_class = get_called_class();
			$the_object = new $calling_class;
	                            
	        // $the_object->id = $user_array['id'];
	        // $the_object->username = $user_array['username'];
	        // $the_object->password = $user_array['password'];
	        // $the_object->first_name = $user_array['first_name'];

			foreach($user_array as $the_attribute => $value) {
				if ($the_object->has_the_attribute($the_attribute)) {
					$the_object->$the_attribute = $value;
				}
			}
			return $the_object;
			}
			
					///1.1.1 To check if the attribute from the array (i.e. the $key, like $username, $id, $password - above) exist 
					///in the Class (as properties)
					private function has_the_attribute($the_attribute) {
						$object_properties = get_object_vars($this);

						///to return true or false:	
						return array_key_exists($the_attribute, $object_properties);

					}

//////2 Main Qury#1: Find all objects in the table
	public static function find_all() {

		return static::find_by_query("SELECT * FROM ".static::$db_table." ");
		 
	}

	
//////3 Main Query#2: Find object by specific by id
	public static function find_by_id($id) {

		
		$the_result_array = static::find_by_query("SELECT * FROM ".static::$db_table." WHERE id=$id LIMIT 1");
		
		///if $the_result_array not empty return first item of the array, else return false
		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}


// ------------------------------------------------------------
///CRUD:

//////4 Creating new object
	public function create() {
		global $database;
		$properties = $this->clean_properties();

		$sql = "INSERT INTO ".static::$db_table."(".implode(",", array_keys($properties)).")";
		$sql .= "VALUES ('". implode("','", array_values($properties)) ."')";
	
		if($database->query($sql)) {
			$this->id = $database->the_insert_id();
			return true;
		} else {
			return false;
		}

	}


//////5 Updating object's info
	public function update() {
		global $database;
		$properties = $this->clean_properties();
		$properties_pairs = array();

		foreach($properties as $key => $value) {
			$properties_pairs[] = "{$key} = '{$value}'";
		}

		$sql = "UPDATE ".static::$db_table." SET ";
		$sql .= implode(", ", $properties_pairs);
		$sql .= " WHERE id= ".$database->escape_string($this->id);
	
		if($database->query($sql)) {

		return (mysqli_affected_rows($database->connection) == 1) ? true : false;
		}
	
	}


//////6 Delete object by id
	public function delete() {
		global $database;

		$sql = "DELETE FROM ".static::$db_table." WHERE id = {$database->escape_string($this->id)} LIMIT 1";

		$database->query($sql);

		return (mysqli_affected_rows($database->connection) == 1) ? true : false;

	}


/////7 Update existing object/ Create new object
	public function save() {

		return isset($this->id) ? $this->update() : $this->create();
	}






}

?>