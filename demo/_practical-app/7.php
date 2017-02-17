<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
    

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">
	
	
	
	<?php  

	/*  Step 1 - Create a database in PHPmyadmin

		Step 2 - Create a table like the one from the lecture

		Step 3 - Insert some Data

		Step 4 - Connect to Database and read data
*/
	
		$connect = mysqli_connect('localhost', 'root', '', 'practice');

		$query = "SELECT * FROM usertable";

		$result = mysqli_query($connect, $query);

		if(!$result){
			die('CONNECTION FAILED');
		}else {
			echo "CONNECTION SUCCESS!! .<br>";
		}

		while($row = mysqli_fetch_array($result)){
			print_r($row);
		}


	?>





</article><!--MAIN CONTENT-->

<?php include "includes/footer.php"; ?>
