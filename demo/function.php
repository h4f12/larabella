<?php

function daughter(){
	echo "hello my name is maria, the daughter";
}

function son(){
	echo "hello my name is dave, the son";
}

function wife(){
	echo "hello my name is susan, adam's wife, how are you?";
}

function adam(){
	echo "<h1>hello i am Adam, and this is my family</h1>";
}


function family(){
	adam();
	echo "<br>";
	wife();
	echo "<br>";
	son();
	echo "<br>";
	daughter();
}

family();
?>