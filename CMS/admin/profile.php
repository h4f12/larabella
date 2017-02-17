<?php include "includes/header.php"; ?>
<?php session_start(); ?>



<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/nav.php"; ?>

        <!-- /.navbar-collapse -->

        <div id="page-wrapper">

            <div class="container-fluid">

<?php 
if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];


    $query = "SELECT * FROM users WHERE user_id = '{$user_id}'";
    $query_select_user = mysqli_query($connect, $query);

    while($row=mysqli_fetch_assoc($query_select_user)){
        $user_name = $row['user_name'];
        //$user_id = $row['user_id'];
        $user_image = $row['user_image'];
        $user_date = $row['user_date'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_password = $row['user_password'];


        //echo "$edit_category";

    }

}

if(isset($_POST['update'])){
    $new_username = $_POST['username'];
    $new_firstname = $_POST['firstname'];
    $new_lastname = $_POST['lastname'];
    $new_image = $_FILES['image']['name'];
    $new_image_temp = $_FILES['image']['tmp_name'];
    $new_email = $_POST['email'];
    $new_role = $_POST['role'];
    $new_password = $_POST['password'];
    
    move_uploaded_file($new_image_temp, "../images/$new_image");

    if(empty($new_image)){
        $query = "SELECT * FROM users WHERE user_id = '{$user_id}'";
        $select_img = mysqli_query($connect, $query);


        while($row=mysqli_fetch_array($select_img)) {
            $new_image = $row['user_image'];
        }
    }

    //echo "{$_POST['title']}";

    $query = "UPDATE users SET ";
    $query .= "user_name = '{$new_username}', ";
    $query .= "user_firstname = '{$new_firstname}', ";
    $query .= "user_lastname = '{$new_lastname}', ";
    $query .= "user_email = '{$new_email}', ";
    $query .= "user_role = '{$new_role}', ";
    $query .= "user_password = '{$new_password}', ";
    $query .= "user_image = '{$new_image}', ";
    $query .= "user_date = now()" ;
    $query .= "WHERE user_id = '{$user_id}'";
    $query_update_user = mysqli_query($connect, $query);

    if(!$query_update_user){
        die("CONNECTION FAIL ". mysqli_error($connect));
    }
    // else{
    //  echo "CONNECTED TO DB";
    // }
    //header("Location: post.php");

}
?>
 <div class="container col-xs-12">
    <h1 class="page-header text-center">Edit Post</h1>
    <small>Update on: <?php echo date('d-y-m'); ?></small>
    <br>
    <br>


    <form action="" method="post" enctype="multipart/form-data">
        
        <div class="container center-block">
            <img src="../images/<?php echo $user_image;?>" class="center-block img-responsive img-thumbnail" width='250' height='auto' margin='50'>
        </div>

        <div class="form-group">
            <label> Change Image? </label>
            <input value='' type="file" name="image"></input>
        </div>

        <div class="form-group">
            <label> Username </label>
            <input value='<?php echo $user_name;?>' class="form-control" type="text" name="username"></input>
        </div>


        <div class="form-group">
            <label> First Name </label>
            <input value='<?php echo $user_firstname;?>' class="form-control" type="text" name="firstname"></input>
        </div>      

        <div class="form-group">
            <label> Last Name </label>
            <input value='<?php echo $user_lastname;?>' class="form-control" type="text" name="lastname"></input>
        </div>




        <div class="form-group">
            <label> Select Role:</label><br>
            <select name="role" id="">  
                <option value='<?php echo $user_role;?>'><?php echo $user_role;?></option>
                <?php 
                if($user_role == 'Admin'){
                    echo "<option value='Subscriber'>Subscriber</option>";
                }else{
                    echo "<option value='Admin'>Admin</option>";
                }

                ?> 
            </select>
        </div>

<!--    <div class="form-group">
            <label> Date </labe
            l>
            <input value="<?php //echo date('d-m-y'); ?>" class="form-control" type="date" name="date"></input>
        </div> -->


        <div class="form-group">
            <label> Email </label>
            <input value='<?php echo $user_email;?>' class="form-control" type="email" name="email"></input>
        </div>

     <!--    <div class="form-group">
            <label> Role </label>
            <input value='<?php //echo $user_role;?>' class="form-control" type="text" name="role"></input>
        </div> -->

        <div class="form-group">
            <label> Password </label>
            <input value='<?php echo $user_password;?>' class="form-control" type="password" name="password"></input>
        </div>      


        <div class="form-group text-right col-md-12">
            <input class="btn btn-danger" type="submit" name="update" value="Update"></input>
        </div>

    </form>
</div>


               




            </div>
        </div>
                <!-- /.row -->



    </div>
    <!-- /#wrapper -->

<?php include "includes/footer.php"; ?>
