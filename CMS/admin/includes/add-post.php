

<?php 
if(isset($_POST['submit'])){
	$post_title = $_POST['title'];
	$post_author = $_POST['author'];
	$post_category = $_POST['category'];
	$post_date = date('d-m-y');

	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];

	$post_content = $_POST['content'];
	$post_tags = $_POST['tags'];
	$post_status = $_POST['status'];

	move_uploaded_file($post_image_temp, "../images/$post_image");

	$query = "INSERT INTO posts(post_title, post_author, post_date, post_category_id, post_image, post_content, post_tags, post_status) "; 
	$query .= "VALUES('$post_title', '$post_author', now(), '$post_category', '$post_image', '$post_content', '$post_tags', '$post_status')";
	$query_add_new_post = mysqli_query($connect, $query);

	$edit_post_id = mysqli_insert_id($connect);


	if(!$query_add_new_post){
		die("NOT CONNECTED TO DB!" . mysqli_error($connect));
	}else{
		echo "<a  href='../post.php?p-id={$edit_post_id}'><p class='bg-success'>{$post_title} succesfully edited. Click here to view.</p></a>";
	}
	
	// $query2 = "SELECT * FROM posts WHERE post_title = $post_title";
	// $query_post_title = mysqli_query($connect, $query2);


	// while($row = mysqli_fetch_assoc($query_post_title)){
 //    $post_id = $row['post_id'];
 //    echo $post_id;
	
	// //echo "<a href='../post.php?p-id={$post_id}'>$post_title successfully created.Click here to view.</a>";
	// }
	
	
}


?>
 

 <div class="container col-xs-12">
	<h1 class="page-header text-center">add a new post </h1>
	<small>Created on: <?php echo date('d-y-m'); ?></small>

	<form action="" method="post" enctype="multipart/form-data">
		


		<br>

		<div class="form-group">
		    <label> Post Title </label>
		    <input class="form-control" type="text" name="title"></input>
		</div>


		<div class="form-group">

			<?php
			if(isset($_SESSION['username'])){
				$username = $_SESSION['username'];
			}

			?>

		    <label> Author </label>
		    <input value="<?php echo $username;?>" class="form-control" type="text" name="author"></input>
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

		<div class="form-group">
			<label> Select Category:</label><br>
             <select name="category" id=""> 	
                <?php 
               	$query = "SELECT * FROM categories";
               	$show_all_cat = mysqli_query($connect, $query);

               	while($row=mysqli_fetch_assoc($show_all_cat)){
        			$cat_id = $row['cat_id'];
        			$cat_title = $row['cat_title'];

        			echo "<option value='$cat_id'>{$cat_title}</option>";
        		}
                ?>
             </select>
        </div>

		<div class="form-group">
		    <label> Content </label>
		    <textarea class="form-control" type="text" name="content" cols="30" rows="10"></textarea>
		</div>


		<div class="form-group">
		    <label> Post Tags </label>
		    <input class="form-control" type="text" name="tags"></input>
		</div>

		<div class="form-group">
		    <label> Post Status: </label><br>
		    <select name="status">
		    	<option value="draft">Draft</option>
		    	<option value="published">Publish</option>
	    	</select>
		</div>


		<div class="form-group">
		    <input class="btn btn-primary" type="submit" name="submit" value="+ New Post"></input>
		</div>

	</form>
</div>
