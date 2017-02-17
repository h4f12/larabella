

<?php 
if(isset($_POST['submit'])){
	$user_name = $_POST['username'];
	$user_firstname = $_POST['firstname'];
	$user_lastname = $_POST['lastname'];
	$user_password = $_POST['password'];
	$user_email = $_POST['email'];

	$user_image = $_FILES['image']['name'];
	$user_image_temp = $_FILES['image']['tmp_name'];

	$user_role = $_POST['role'];
	

	move_uploaded_file($user_image_temp, "../images/$user_image");

	$query = "INSERT INTO users(user_name, user_firstname, user_lastname, user_password, user_email, user_image, user_role, user_date) "; 
	$query .= "VALUES('$user_name', '$user_firstname', '$user_lastname', '$user_password', '$user_email', '$user_image', '$user_role', now())";
	$query_add_new_user = mysqli_query($connect, $query);

	if(!$query_add_new_user){
		die("NOT CONNECTED TO DB!" . mysqli_error($connect));
	}else{
		echo "$user_name successfully created";
	}

	
}


?>
 

 <div class="container col-xs-12">
	<h1 class="page-header text-center">add a new user </h1>
	<small>Create on: <?php echo date('d-y-m'); ?></small>

	<form action="" method="post" enctype="multipart/form-data">
		
		<br>
		
		<div class="form-group">
			<label> Select Role:</label><br>
				<select name="role" id=""> 	
					<option value='Subscriber'>Subscriber</option>
					<option value='Admin'>Admin</option>
			</select>
        </div>

		<div class="form-group">
		    <label> Username </label>
		    <input class="form-control" type="text" name="username"></input>
		</div>

		<div class="form-group">
		    <label> First Name </label>
		    <input class="form-control" type="text" name="firstname"></input>
		</div>

		<div class="form-group">
		    <label> Last Name </label>
		    <input class="form-control" type="text" name="lastname"></input>
		</div>		

		<div class="form-group">
		    <label> Password </label>
		    <input class="form-control" type="password" name="password"></input>
		</div>		

		<div class="form-group">
		    <label> Email </label>
		    <input class="form-control" type="email" name="email"></input>
		</div>		

		<!-- <div class="form-group">
		    <label> Date </label>
		    <input class="form-control" type="date" name="date"></input>
		</div>
 -->

		<div class="form-group">
		    <label> Image </label>
		    <input type="file" name="image"></input>
		</div>

 <!--
		<div class="form-group">
		    <label> Content </label>
		    <textarea class="form-control" type="text" name="content" cols="30" rows="10"></textarea>
		</div>


		<div class="form-group">
		    <label> Post Tags </label>
		    <input class="form-control" type="text" name="tags"></input>
		</div>

		<div class="form-group">
		    <label> Post Status </label>
		    <input class="form-control" type="text" name="status"></input>
		</div> -->


		<div class="form-group">
		    <input class="btn btn-primary" type="submit" name="submit" value="+ New User"></input>
		</div>

	</form>
</div>
