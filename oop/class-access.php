<?php

class Droid {
	public $head = 1;
	private $arm = 2;
	protected $leg = 2;
	

	function walk(){
		echo $this->head;
		echo $this->arm;
		echo $this->leg;
	}

	

}

$adam = new Droid;

echo $adam->head;
echo "<br>";

$adam->walk();

//return error:
echo $adam->arm;
echo "<br>";

echo $adam->leg;
echo "<br>";

?>