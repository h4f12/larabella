 <!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">
            View All Comments     
        </h1>

<div class="col-xs-12">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Post</th>
                <th>Author</th>
                <th>Email</th> 
                <th>Status</th>               
                <th>Comment</th>
                <th>Approve</th>
                <th>Unapprove</th>
                <th>Delete</th>
                              
<!--                 <th>Approve</th>
                <th>Unapprove</th>
                <th>Delete</th> -->
            </tr>
        </thead>
        <tbody>
            
               <?php 

                $query = "SELECT * FROM comments";
                $all_comments = mysqli_query($connect, $query);

                while($row = mysqli_fetch_assoc($all_comments)) {
                $com_id = $row['com_id'];
                $com_post_id = $row['com_post_id'];
                $com_date = $row['com_date'];
                $com_author = $row['com_author'];
                $com_email = $row['com_email'];
                $com_status = $row['com_status'];
                $com_content = $row['com_content'];

                
                echo "<tr><small><td>{$com_id}</small></td>";
                echo "<td><small>{$com_date}</small></td>";

                    //table relation: posts <-comment_post_id-> comments
                    $query2 = "SELECT * FROM posts WHERE post_id = $com_post_id";
                    $select_post_title = mysqli_query($connect, $query2);

                    while($row = mysqli_fetch_assoc($select_post_title)){
                        $post_title = $row['post_title'];
                        $post_id = $row['post_id'];
                        echo "<td><a href='../post.php?p-id={$post_id}' target='_blank'>{$post_title}</a></td>";
                    }
                
                echo "<td>{$com_author}</td>";
                echo "<td>{$com_email}</td>";
                echo "<td>{$com_status}</td>";
                echo "<td>{$com_content}</td>";

                echo "<td class='text-center'><a href='comment.php?approved={$com_id}'><small></small><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></a></td>";
                echo "<td class='text-center'><a href='comment.php?unapproved={$com_id}'><small></small><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>";
                echo "<td class='text-center'><a onClick=\"javascript:return confirm('Confirm delete this comment?')\" href='comment.php?delete={$com_id}'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td></tr>";
                }

                ?>

                <?php
                if(isset($_GET['approved'])){
                    // echo "deleting...";
                    $the_com_id = $_GET['approved'];

                    $query = "UPDATE comments SET com_status = 'approved' WHERE com_id = {$the_com_id}";
                    $query_approved_com = mysqli_query($connect, $query);
                    header("Location: comment.php");
                }

                if(isset($_GET['unapproved'])){
                    // echo "deleting...";
                    $the_com_id = $_GET['unapproved'];

                    $query = "UPDATE comments SET com_status = 'unapproved' WHERE com_id = {$the_com_id}";
                    $query_unapproved_com = mysqli_query($connect, $query);
                    header("Location: comment.php");
                }

                    if(isset($_GET['delete'])){
                    // echo "deleting...";
                    $del_com_id = $_GET['delete'];

                    $query = "DELETE FROM comments WHERE com_id = {$del_com_id}";
                    $query_delete_com = mysqli_query($connect, $query);
                    header("Location: comment.php");
                
                    // if(!$query_delete_post){
                    //     die("fail to delete post");
                    // }else{
                    //     echo "$post_title deleted";
                    // }
                }

                ?>

            
        </tbody>
    </table>
</div>