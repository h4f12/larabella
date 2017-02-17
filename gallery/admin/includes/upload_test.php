<?php require_once("header.php"); ?>

<?php

if(isset($_POST['submit'])) {
// echo "<pre>";

// print_r($_FILES['file_upload']);

// echo "</pre>";


$upload_errors = array(

	UPLOAD_ERR_OK         => "There is no error, the file uploaded with success",
	UPLOAD_ERR_INI_SIZE   => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
	UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
	UPLOAD_ERR_PARTIAL    => "The uploaded file was only partially uploaded.",
	UPLOAD_ERR_NO_FILE    => "No file was uploaded.",
	UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder. Introduced in PHP 5.0.3.",
	UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk. Introduced in PHP 5.1.0.",
	UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload."
	);

$temp_name = $_FILES['file_upload']['tmp_name'];
$the_file = $_FILES['file_upload']['name'];
$directory = "images";

	if(move_uploaded_file($temp_name, $directory."/".$the_file)) {
		echo $the_message = "You file is uploaded succesfully";
	
	}
	else {
	
	$the_error = $_FILES['file_upload']['error'];
	$error_message = $upload_errors[$the_error];
	
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
	if(!empty($the_error)) {
		echo $error_message;

}

?>
	<form action="upload.php" enctype="multipart/form-data" method="post">

		<input type="file" name="file_upload"><br>

		<input type="submit" name="submit">

	<form>

<body>
</html>