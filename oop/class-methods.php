<?php


class Droid {
	function greeting(){
		echo "Hi there";

	}

	function walking(){
		echo "'i walk'";

	}	

	function cooking(){
		echo "'i cook'";

	}

}

$all_methods_droid = get_class_methods('Droid');


foreach($all_methods_droid as $method) {
	echo $method. "<br>";
}



?>
