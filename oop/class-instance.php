<?php

class Droid {
	function greet(){
		echo "Hi there";

	}

	function walk(){
		echo "'a droid is walking'";

	}	

	function cook(){
		echo "'a droid is cooking'";

	}

}


$adam = new Droid();

$adam->walking();
echo "<br>";
$adam->cooking();



?>