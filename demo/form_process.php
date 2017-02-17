<?php 

if(isset($_POST["submit"])){

$regusers = array('hafiz', 'aliah', 'baharom');

  $user = $_POST["user"];
  $pass = $_POST['pass'];

  $max = 10;
  $min = 5;

  if (strlen($user) < $min){
    echo "username must be more than 5 chars";
  }
  if (strlen($user) > $max){
    echo "username must less than 10 chars";
  }


  if (in_array($user, $regusers)){
    echo "welcome ".$user;
  }

  else {
    echo "you are not welcome".$user;
  }

}

?>
