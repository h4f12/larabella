 <!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center">
            View All Users     
        </h1>

<div class="col-xs-12">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Picture</th>
                <th>Date</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th> 
                <th>Email</th>               
                <th>Role</th>
                <th><small>UPGRADE</small></th>
                <th><small>DOWNGRADE</small></th>
                <th><small>EDIT</small></th>
                <th><small>DELETE</small></th>                              
            </tr>
        </thead>
        <tbody>
            
               <?php 

                $query = "SELECT * FROM users";
                $all_users = mysqli_query($connect, $query);

                while($row = mysqli_fetch_assoc($all_users)) {
                $user_id = $row['user_id'];
                $user_image = $row['user_image'];
                $user_date = $row['user_date'];
                $user_name = $row['user_name'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];

                
                echo "<tr><small><td>{$user_id}</small></td>";
                echo "<td><img src='../images/{$user_image}' class='img-circle' height='70' width='70'></a></td>";
                echo "<td><small>{$user_date}</small></td>";

                    //table relation: posts <-comment_post_id-> comments
                    // $query2 = "SELECT * FROM posts WHERE post_id = $com_post_id";
                    // $select_post_title = mysqli_query($connect, $query2);

                    // while($row = mysqli_fetch_assoc($select_post_title)){
                    //     $post_title = $row['post_title'];
                    //     $post_id = $row['post_id'];
                    //     echo "<td><a href='../post.php?p-id={$post_id}' target='_blank'>{$post_title}</a></td>";
                    // }
                
                echo "<td>{$user_name}</td>";
                echo "<td>{$user_firstname}</td>";
                echo "<td>{$user_lastname}</td>";
                echo "<td>{$user_email}</td>";
                echo "<td>{$user_role}</td>";

                echo "<td class='text-center'><a href='user.php?be-admin={$user_id}'><small></small><span class='glyphicon glyphicon-triangle-top' aria-hidden='true'></span></a></td>";
                echo "<td class='text-center'><a href='user.php?be-subscriber={$user_id}'><small></small><span class='glyphicon glyphicon-triangle-bottom' aria-hidden='true'></span></a></td>";
                echo "<td class='text-center'><a href='user.php?source=edit&id={$user_id}'><small></small><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>";
                echo "<td class='text-center'><a onClick=\"javascript:return confirm('Confirm delete {$user_name}?')\" href='user.php?delete={$user_id}'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td></tr>";
                }

                ?>

                // <?php
                if(isset($_GET['be-admin'])){
                    // echo "deleting...";
                    $the_user_id = $_GET['be-admin'];

                    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$the_user_id}";
                    $query_be_admin = mysqli_query($connect, $query);
                    header("Location: user.php");
                }

                if(isset($_GET['be-subscriber'])){
                    // echo "deleting...";
                    $the_user_id = $_GET['be-subscriber'];

                   $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = {$the_user_id}";
                    $query_unapproved_com = mysqli_query($connect, $query);
                    header("Location: user.php");
                }

                    if(isset($_GET['delete'])){
                    // echo "deleting...";
                    $this_user_id = $_GET['delete'];

                    $query = "DELETE FROM users WHERE user_id = {$this_user_id}";
                    $query_delete_com = mysqli_query($connect, $query);
                    header("Location: user.php");
                
                    if(!$query_delete_post){
                        die("fail to delete post");
                    }else{
                        echo "$user_name deleted";
                    }
                }

                ?>

            
        </tbody>
    </table>
</div>