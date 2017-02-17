<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/nav.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">

<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($email) && !empty($password)){

    $reg_username = mysqli_real_escape_string($connect, $username);
    $reg_password = mysqli_real_escape_string($connect, $password);
    $reg_email = mysqli_real_escape_string($connect, $email);


    $query = "SELECT randSalt FROM users";
    $query_select_randSalt = mysqli_query($connect, $query);

        if(!$query_select_randSalt){
            die("randSalt Query Fail ".mysqli_error($connect));
        }

    $row = mysqli_fetch_array($query_select_randSalt);
    $salt = $row['randSalt'];
    $reg_password = crypt($reg_password, $salt);



    $query = "INSERT INTO users(user_name, user_email, user_password) VALUES('$reg_username', '$reg_email', '$reg_password')";
    $query_register_new_user = mysqli_query($connect, $query);

        if(!$query_register_new_user){
            die("CONNCTION FAIL ".mysqli_error($connect));
        }

        $message = "Thanks. Your registration has been submitted.";

    }else{
        $message = "Please Fill In All Fields!";
    }


    


}else{
    $message = "";
}


?>


    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                <h5 class="text-center bg-info"><?php echo $message; ?></h5>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
