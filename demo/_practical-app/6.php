
<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

		<aside class="col-xs-4">
		
		<?php Navigation();?>
			
		</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">
 

	<?php  

/*  Step1: Make a form that submits one value to POST super global


 */
if(isset($_POST['submit'])){

	echo "submitted, Thanks!";
}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>

<form action="6.php" method="post">
	<input type="text" name="user" placeholder="Enter Your Username">
	<input type="password" name="pass" placeholder="Enter Your Password">
	<br>
	<input type="submit" name="submit">
	

	</input>

</form>


	



</body>
</html>

</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>