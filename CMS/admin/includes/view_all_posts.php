<?php
if(isset($_POST['checkboxArray'])){
    //echo "good job";
    foreach($_POST['checkboxArray'] as $checked_post_id) {
        
        $bulk_options = $_POST['bulk_options'];

        switch($bulk_options){

        case 'published':

        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$checked_post_id}";
        $update_to_published_status = mysqli_query($connect, $query);

        if(!$update_to_published_status){
            die("CONNECTION FAIL ".mysqli_error($connect));
        }

        break;        


        case 'draft':

        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$checked_post_id}";
        $update_to_draft_status = mysqli_query($connect, $query);

        if(!$update_to_draft_status){
            die("CONNECTION FAIL ".mysqli_error($connect));
        }

        break;

        case 'delete':

        $query = "DELETE FROM posts WHERE post_id = {$checked_post_id}";
        $delete_post = mysqli_query($connect, $query);

        if(!$delete_post){
            die("CONNECTION FAIL ".mysqli_error($connect));
        }

        break;
    }
    
    }

}

?> 


 <!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">
            View All Posts     
        </h1>
    

<div class="col-xs-12">
  <form action="" method="post">
    <table class="table table-hover">

    <div class="row">
        <div class="col-xs-6 col-lg-9">
            <a href="./post.php?source=add" class="btn btn-info">+ New Post</a>
        </div>
        
        <div class="col-xs-6 col-lg-3">
            <select name="bulk_options" style="dislpay: inline-block; margin-right: 10px;">
                <option>- Select Action -</option>
                <option value="published">publish</option>
                <option value="draft">draft</option>
                <option value="delete">delete</option>
            </select>
            <input type="submit" name="submit" value="Apply" class="btn btn-success btn-xs">
           
        </div>
        <br>
        <br>
    </div>
   

        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllBoxes"></th>
                <th>ID</th>
                <th>Image</th>
                <th>Publish Date</th>
                <th>Author</th>
                <th>Category</th>
                <th>Title</th>               
                <th>Status</th>
                <th>Tags</th>
                <th>Comment Count</th>
            </tr>
        </thead>
        <tbody>
 
                
               <?php 

                $query = "SELECT * FROM posts";
                $all_posts = mysqli_query($connect, $query);

                while($row = mysqli_fetch_assoc($all_posts)) {
                $post_id = $row['post_id'];
                $post_date = $row['post_date'];
                $post_author = $row['post_author'];
                $post_category = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_image = $row['post_image'];
                $post_status = $row['post_status'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                
                echo "<tr><td><input class='checkboxes' type='checkbox' name='checkboxArray[]' value='$post_id'></td>";
                echo "<td>{$post_id}</td>";
                echo "<td><img class='img-responsive' src='../images/$post_image' width='100' height='auto'></td>";
                echo "<td>{$post_date}</td>";
                echo "<td>{$post_author}</td>";

                //table relation post <-> categories
                $query2 = "SELECT * FROM categories WHERE cat_id = $post_category";
                $select_cat_title = mysqli_query($connect, $query2);

                while($row = mysqli_fetch_assoc($select_cat_title)){
                    $cat_title = $row['cat_title'];
                    echo "<td>{$cat_title}</td>";
                }
                
                
                echo "<td><a href='../post.php?p-id={$post_id}'>{$post_title}</a></td>";
                echo "<td>{$post_status}</td>";
                echo "<td><small>{$post_tags}</small></td>";
                echo "<td>{$post_comment_count}</td>";
                echo "<td><a href='post.php?source=edit&p-id={$post_id}' target='_blank'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>";
                echo "<td><a onClick=\"javascript:return confirm('Confirm delete {$post_title}?')\" href='post.php?delete={$post_id}'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td></tr>";
                }

                ?>

                <?php
                if(isset($_GET['delete'])){
                    // echo "deleting...";
                    $del_post_id = $_GET['delete'];

                    $query = "DELETE FROM posts WHERE post_id = {$del_post_id}";
                    $query_delete_post = mysqli_query($connect, $query);
                    header("Location: post.php");
                
                    // if(!$query_delete_post){
                    //     die("fail to delete post");
                    // }else{
                    //     echo "$post_title deleted";
                    // }
                }

                ?>

            
        </tbody>
    </table>
  </form>
</div>

