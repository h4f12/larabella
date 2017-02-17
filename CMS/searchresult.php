<?php include "includes/header.php";?>


<body>
<?php include "includes/nav.php";?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



                <h2 class="page-header">
                    Search Results
                </h2>

                <!-- First Blog Post (search result as blog post) -->

                 <?php
                    if(isset($_POST['submit'])){

                    $search = $_POST['search'];

                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $search_query = mysqli_query($connect, $query);

                        if(!$search_query){
                            die("QUERY FAILED" . mysqli_error($connect));

                        }
                        
                        
                        $count = mysqli_num_rows($search_query);
                        if($count == 0){
                            echo "NO RESULT";
                        }
                        else{

                            //echo "GOT SOMETHING";
                             
                            while($row = mysqli_fetch_assoc($search_query)) {
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            

                            ?>

                            <h2>
                                <a href="#"><?php echo $post_title; ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author; ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                            <hr>
                            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                            <hr>
                            <p><?php echo $post_content; ?></p>
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>

                            <?php
                            }

                        }
                        }
                        ?>


               
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

            
        </div>


        <!-- /.row -->

       

        <?php include "includes/footer.php"; ?>

