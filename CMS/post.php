<?php include "includes/header.php";?>

<body>
<?php include "includes/nav.php";?>




    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php
            if(isset($_GET['p-id'])){
                $the_post_id = $_GET['p-id'];
                //echo $the_post_id;
            }

            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $show_all_post = mysqli_query($connect, $query);
                if(!$show_all_post){
                die("$show_all_post ".mysqli_error($connect));
                }
            while($row = mysqli_fetch_assoc($show_all_post)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
            }

            ?>

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title;?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author;?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p style="display: inline-block;"><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date;?></p> 
                <div style="display: inline-block;">
                    <?php
                        if(isset($_SESSION['role'])){
                            if(isset($_GET['p-id'])){
                                $edit_post_id2 = $_GET['p-id'];

                                echo "<a role='button' class='btn btn-warning btn-xs text-right' href='admin/post.php?source=edit&p-id={$edit_post_id2}'>Edit Post</a>";
                        }    
                        }
                        ?>
                </div>
               

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive center-block" src="images/<?php echo $post_image;?>" alt="">

                <hr>

                <!-- Post Content -->
                 <div style="display: inline-block;">
                    <?php
                        if(isset($_SESSION['role'])){
                            if(isset($_GET['p-id'])){
                                $edit_post_id2 = $_GET['p-id'];

                                echo "<a role='button' class='btn btn-warning btn-xs text-right' href='admin/post.php?source=edit&p-id={$edit_post_id2}'>Edit Post</a>";
                        }    
                        }
                        ?>
                </div>
                <br>

                <p style="display: inline-block;"><?php echo $post_content;?></p> 

               
                
                <hr>

                

            <!-- Blog Comments -->

                <!-- Comments Form -->
                <?php
                if(isset($_POST['submit_comment'])){
                    $com_content = $_POST['com_content'];
                    $com_author = $_POST['com_author'];
                    $com_email = $_POST['com_email'];

                    //echo "yes";
                    if(!empty($com_content) && !empty($com_author) && !empty($com_author)){
                
                    $query = "INSERT INTO comments(com_content, com_author, com_email, com_date, com_post_id, com_status) ";
                    $query .= "VALUES('$com_content', '$com_author', '$com_email', now(), '$the_post_id', 'pending reivew')";
                    $query_submit_com = mysqli_query($connect, $query);

                        if(!$query_submit_com){
                        die("NOT CONNECTED TO DB!" . mysqli_error($connect));
                        }
                        else{
                        echo "<h4>Thanks for your contribution!</h4>";
                        }
                    
                    $query2 = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id";
                    $query_update_comment_count = mysqli_query($connect, $query2);
                        if(!$query_update_comment_count){
                        die("FAIL UPDATE COMMENT COUNT!" . mysqli_error($connect));
                        }
                    }else{
                        echo "<script>alert('Fileds Can Not Be Empty')</script>";
                    }
                }
                ?>


                <div class="well">
                    <h4 class="">Leave a Comment</h4>
                    <form role="form" action="" method="post" >

                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="com_content"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" class="form-control" name="com_author" cols="2"></input>
                        </div>                        

                        <div class="form-group">
                            <label>Your Email</label>
                            <input type="email" class="form-control" name="com_email"></input>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" name="submit_comment" >Submit</button>
                        </div>

                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                $query = "SELECT * FROM comments WHERE com_post_id = $the_post_id AND com_status = 'approved' ORDER BY com_id DESC ";
                $show_approved_comment = mysqli_query($connect, $query);
                    if(!$show_approved_comment){
                        die("CONNECTION FAILDED ". mysqli_error($connect));
                    }

                while($row = mysqli_fetch_assoc($show_approved_comment)){
                    $com_author = $row['com_author'];
                    $com_date = $row['com_date'];
                    $com_content = $row['com_content'];
                    //echo "<h1>$com_author</h1>";                
                ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $com_author; ?>
                            <small><?php echo $com_date; ?></small>
                        </h4>
                        <?php echo $com_content; ?>
                    </div>
                </div>
                <?php
                }
                ?>

                <!-- Comment
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <Nested Comment> 
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        
                    </div>
                </div>
                 End Nested Comment -->
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

                    <!-- /.row -->
                
        </div>
    </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <div class="container">
            <?php include "includes/footer.php"; ?>
        </div>

