<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>
			
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php  

$m = 3;

if (3 >= 10){
	echo "i dont code";

}

elseif (5 > 12){
	echo "i code sometime";

}

else {
	echo "i love php <br><br>";
}


/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP



	Step 2: Make a forloop  that displays 10 numbers


	Step 3 : Make a switch Statement that test againts one condition with 5 cases

 */



for($count = 0; $count < 10; $count++){

	echo $count . ", ";
}

echo "<br><br>";

$x = 13;
switch($x){

	case 12:
	echo "true 012";
	break;

	case 13:
	echo "true 013";
	break;

	case 14:
	echo "true 014";
	break;

	case 15:
	echo "true 015";
	break;

	case 16:
	echo "true 016";
	break;

	default:
	echo "N/A";
	break;
}


?>






</article><!--MAIN CONTENT-->
	
<?php include "includes/footer.php" ?>