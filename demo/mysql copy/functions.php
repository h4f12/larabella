<?php include "db.php";?>
<?php

function createRow(){
if(isset($_POST["submit"])){
    ?>
    <div class='text-center'>
     <?php
    if($_POST['username'] && $_POST['password']){
     echo "<h1>yeahhh " . $_POST['username'] . "!!</h1><br><p>Your Password is ".$_POST['password']."!! hahaha</p>"; 
    }
    else{
        echo "<h2>Oppss, incomplete submission!!</h2>";
    } 

    $pass = $_POST['password'];
    $user = $_POST['username'];

    //mysql query (msqli_query): connect and record data/values in the table
    
    $query = "INSERT INTO username(username, password) VALUES ('$user', '$pass')";  /*VALUES as sting*/

    $result = mysqli_query($connection, $query);
    
    }
    }
    
    
  






function readRows() {
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error());
    }
        
while($row = mysqli_fetch_assoc($result)) {
        
        print_r($row);
    }  
}




function showAllData(){
    global $connection;
    $query = "SELECT * FROM username";  

    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];

        echo "<option value='id'>$id</option>";
    }





}


function updateTable() {
    if(isset($_POST['submit'])) {
    
global $connection;
$username = $_POST['username'];
$password = $_POST['password'];
$id = $_POST['id'];
    
$query = "UPDATE username SET ";
$query .= "username = '$username', ";
$query .= "password = '$password' ";
$query .= "WHERE id = $id ";
    
    $result = mysqli_query($connection, $query);
    if(!$result) {
    
     die("QUERY FAILED" . mysqli_error($connection));    
    }else {
    
    echo "Record Updated"; 
    
    }
        
    }
    

}


function deleteRows() {
    
    if(isset($_POST['submit'])) {
global $connection;
$username = $_POST['username'];
$password = $_POST['password'];
$id = $_POST['id'];
    
$query = "DELETE FROM username ";
$query .= "WHERE id = $id ";
    
    $result = mysqli_query($connection, $query);
    if(!$result) {
    
     die("QUERY FAILED" . mysqli_error($connection));    
    }else {
    
    echo "Record Deleted"; 
    
    }
  
    }

}



















    