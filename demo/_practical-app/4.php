<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

		<?php Navigation();?>
			
		
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

	
	<?php  

	function times($x,$y) {
		return $x * $y;
	}
	$z = times(2,3);
	echo $z;
	echo "<br>";
	$z = times(4, $z);
	echo $z;
	echo "<br>";
	$z = times(10, $z);
	echo $z;





	




/*  Step1: Define a function and make it return a calculation of 2 numbers

	Step 2: Make a function that passes parameters and call it using parameter values


 */

//	function $cook($a,$b){

//	}

?>





</article><!--MAIN CONTENT-->


<?php include "includes/footer.php"; ?>