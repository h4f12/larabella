<?php include "includes/header.php";?>

<body>
<?php include "includes/nav.php";?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Welcome!
                    <small>Selamat Datang</small>
                </h1>

            
                <?php
                $query = "SELECT * FROM posts";
                $blog_posts = mysqli_query($connect, $query);

                while($row = mysqli_fetch_assoc($blog_posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,200);
                    $post_status = $row['post_status'];

                    if($post_status == 'published'){
                ?>
                        <h2>
                            <a href="post.php?p-id=<?php echo $post_id;?>" target="_blank"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                        <hr>
                        <a href="post.php?p-id=<?php echo $post_id;?>" target="_blank"><img class="img-responsive" src="images/<?php echo $post_image;?>" alt=""></a>
                        <hr>
                        <p><?php echo $post_content; ?>...</p>
                        <a class="btn btn-primary" href="post.php?p-id=<?php echo $post_id;?>" target="_blank">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

                <?php   }

                    } 
                    ?>

                

                
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php"; ?>
        
       