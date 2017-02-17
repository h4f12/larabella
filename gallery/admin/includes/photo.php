<?php

class Photo extends Db_object {

	///Creating properties to be used as object later on
	protected static $db_table = "photos";
	protected static $db_table_fields = array('id', 'title', 'description', 'filename', 'filetype', 'size');
	public $id;
	public $title;
	public $description;
	public $filename;
	public $filetype;
	public $size;

	///Uploads images
	public $tmp_path;
	public $upload_directory = "images";
	public $errors = array();
	public $upload_errors_array = array(

		UPLOAD_ERR_OK         => "There is no error, the file uploaded with success",
		UPLOAD_ERR_INI_SIZE   => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
		UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
		UPLOAD_ERR_PARTIAL    => "The uploaded file was only partially uploaded.",
		UPLOAD_ERR_NO_FILE    => "No file was uploaded.",
		UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder. Introduced in PHP 5.0.3.",
		UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk. Introduced in PHP 5.1.0.",
		UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload."

		);

/////This is to passing $_FILES['uploaded_file'] as an arguement (resource (list of array keys): http://php.net/manual/en/features.file-upload.post-method.php)
	/// note: $file = $_FILES['uploaded_file']
	public function set_file($file) {

		if(empty($file) || !$file || !is_array($file)) {
			$this->errors[] = "no file uploaded1";
			return false;
		} 
		elseif($file['error'] != 0) {
			$this->errors[] = $this->upload_errors_array[$file['error']];
			return false;

		}
		else {

		$this->filename = basename($file['name']);
		$this->tmp_path = $file['tmp_name'];
		$this->type = $file['type'];
		$this->size = $file['size'];
		}

	}
/////Save the file (after it is set using above method, set_file())
	public function save() {
		if($this->id) {
			$this->update();
		} 
		///Checking errors: i) if there's error -> return false, ii) if the filename or temp path is empty -> return false
		else {
			if(!empty($this->errors)) {
				return false;
			}
			if(empty($this->filename) || empty($this->tmp_path))  {
				$this->errors[] = "no file uploaded2";
			return false;
			}

			///if no errors (above) we set the target path for the file/photo to be saved
			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

			///Checking if the path name already exist, if yes return error
			if(file_exists($target_path)) {
				$this->errors[] = "The file {$this->filename} is already exist";
				return false;
			}
			if(move_uploaded_file($this->tmp_path, $target_path)) {
				if($this->create()) {
					unset($this->tmp_path);
					return true;

				}
				///if unable to upload/create the file (probably issue regarding permission)
				else {
					$this->errors[] = "File failed to be uploaded: permission not granted";
					return false;
				}

			}
		}
	}


	




	






}
//End of class Photo


// $user = new User();



?>





