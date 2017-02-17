<?php include "db.php";

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
?>


    </div>
<?php //include "functions.php" ?>
<?php //createRows(); ?>

<?php include "includes/header.php" ?>

<div class="container">
    
    <div class="col-sm-6 col-sm-push-3">
       <h1 class="text-center">Create</h1>
        <form action="login_create.php" method="post">
            <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control">
            </div>
            
             <div class="form-group">
                <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
            </div>
            
            <input class="btn btn-warning" type="submit" name="submit" value="CREATE">
            
        </form>
    </div>

<?php include "includes/footer.php" ?>



