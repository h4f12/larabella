
<?php 
if(isset($_GET['p-id'])){
    $edit_post_id = $_GET['p-id'];
    ?>
<!--     <div class="container col-xs-12">
    	<p class="text-right"><?php //echo "Post ID: $edit_post_id";?></p><br>
    </div> -->
    <?php

    $query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
    $query_edit_post = mysqli_query($connect, $query);

    while($row=mysqli_fetch_assoc($query_edit_post)){
        $edit_title = $row['post_title'];
        $edit_author = $row['post_author'];
        $edit_category = $row['post_category_id'];
        //$edit_date = date('d-m-y');
        $edit_image = $row['post_image'];
        $edit_content = $row['post_content'];
        $edit_tags = $row['post_tags'];
        $edit_status = $row['post_status'];

        //echo "$edit_category";

    }

}

if(isset($_POST['update'])){
	$new_title = $_POST['title'];
	$new_author = $_POST['author'];
	$new_category = $_POST['category'];
	$new_image = $_FILES['image']['name'];
	$new_image_temp = $_FILES['image']['tmp_name'];
	$new_content = $_POST['content'];
	$new_tags = $_POST['tags'];
	$new_status = $_POST['status'];

	move_uploaded_file($new_image_temp, "../images/$new_image");

	if(empty($new_image)){
		$query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
		$select_img = mysqli_query($connect, $query);


		while($row=mysqli_fetch_array($select_img)) {
			$new_image = $row['post_image'];
		}
	}

	//echo "{$_POST['title']}";

	$query = "UPDATE posts SET ";
	$query .= "post_title = '{$new_title}', ";
	$query .= "post_author = '{$new_author}', ";
	$query .= "post_category_id = '{$new_category}', ";
	$query .= "post_content = '{$new_content}', ";
	$query .= "post_tags = '{$new_tags}', ";
	$query .= "post_status = '{$new_status}', ";
	$query .= "post_image = '{$new_image}', ";
	$query .= "post_date = now()" ;
	$query .= "WHERE post_id = $edit_post_id";
	$query_update_post = mysqli_query($connect, $query);

	if(!$query_update_post){
		die("CONNECTION FAIL ". mysqli_error($connect));
	}else{
		echo "<a  href='../post.php?p-id={$edit_post_id}'><p class='bg-success'>{$new_title} succesfully edited. Click here to view.</p></a>";
	}
	


}
?>
 <div class="container col-xs-12">
	<h1 class="page-header text-center">Edit Post</h1>
	<small>Update on: <?php echo date('d-y-m'); ?></small>
	<br>
	<br>


	<form action="" method="post" enctype="multipart/form-data">
		
		<div class="container col-md-4">
			<img src="../images/<?php echo $edit_image;?>" class="center-block img-responsive" width='300' height='auto' margin='50'>
		</div>

		<div class="form-group col-md-7">
		    <label> Post Title </label>
		    <input value='<?php echo $edit_title;?>' class="form-control" type="text" name="title"></input>
		</div>


		<div class="form-group col-md-7">
		    <label> Author </label>
		    <input value='<?php echo $edit_author;?>' class="form-control" type="text" name="author"></input>
		</div>

		<div class="form-group col-md-4">
		    <label> Change Image? </label>
		    <input value='' type="file" name="image"></input>
		</div>


		<div class="form-group col-md-4">
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

<!-- 		<div class="form-group">
		    <label> Date </label>
		    <input value="<?php //echo date('d-m-y'); ?>" class="form-control" type="date" name="date"></input>
		</div>
 -->


		<div class="form-group col-md-12">
		    <label> Content </label>
		    <textarea class="form-control" type="text" name="content" cols="30" rows="10"><?php echo $edit_content;?></textarea>
		</div>


		<div class="form-group col-md-6">
		    <label> Post Tags </label>
		    <input value='<?php echo $edit_tags;?>' class="form-control" type="text" name="tags"></input>
		</div>

		<div class="form-group col-md-6">
			<label> Post Status:</label><br>
            <select name="status" id=""> 	
            	<option value='<?php echo $edit_status;?>'><?php echo $edit_status;?></option>
                <?php 
                if($edit_status == 'published'){
                	echo "<option value='draft'>draft</option>";
                }else{
                	echo "<option value='published'>published</option>";
                }

                ?> 
            </select>
        </div>


<!-- 		<div class="form-group col-md-6">
		    <label> Post Status </label>
		    <input value='<?php// echo $edit_status;?>' class="form-control" type="text" name="status"></input>
		</div> -->


		<div class="form-group text-right col-md-12">
		    <input class="btn btn-danger" type="submit" name="update" value="Update"></input>
		</div>

	</form>
</div>
