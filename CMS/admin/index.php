<?php include "includes/header.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/nav.php"; ?>

        <!-- /.navbar-collapse -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome back!
                            <small> <?php echo $_SESSION['username'] ?></small>
                        </h1>
                       <!--  <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li> -->
                        </ol>
                    </div>
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM posts  WHERE post_status = 'published'";
                                    $query_select_all_post = mysqli_query($connect, $query);
                                    $post_count = mysqli_num_rows($query_select_all_post);
                                    ?>
                                    <div class='huge'><?php echo $post_count; ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="post.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM comments";
                                    $query_select_all_comments = mysqli_query($connect, $query);
                                    $comment_count = mysqli_num_rows($query_select_all_comments);
                                    ?>                                    
                                     <div class='huge'><?php echo $comment_count; ?></div>
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comment.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM users";
                                    $query_select_all_users = mysqli_query($connect, $query);
                                    $user_count = mysqli_num_rows($query_select_all_users);
                                    ?>  
                                    <div class='huge'><?php echo $user_count; ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="user.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $query_select_all_categories = mysqli_query($connect, $query);
                                    $cat_count = mysqli_num_rows($query_select_all_categories);
                                    ?>  
                                        <div class='huge'><?php echo $cat_count; ?></div>
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <?php
                $query = "SELECT * FROM users WHERE user_role = 'Subscriber'";
                $query_select_subscriber = mysqli_query($connect, $query);
                $subscriber_count = mysqli_num_rows($query_select_subscriber);

                $query = "SELECT * FROM users WHERE user_role = 'Admin'";
                $query_select_admin = mysqli_query($connect, $query);
                $admin_count = mysqli_num_rows($query_select_admin);

                ?>

                <div class="row">

                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Data', 'Count'],  
                        <?php
                        $element_text = ['Active Posts', 'comments', 'All Users', 'Subscriber', 'Admin', 'Categories'];
                        $element_count = [$post_count, $comment_count, $user_count, $subscriber_count, $admin_count, $cat_count];

                        for($i=0; $i<6; $i++){
                            echo "['{$element_text[$i]}'".",". "{$element_count[$i]}],";
                            }
                        ?>

                       
                          // ['Posts', 100],
                          // ['Comments', 10],

                        
                        ]);

                        var options = {
                          chart: {
                            title: 'Dashboard Stats',
                            subtitle: 'live count',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, options);
                      }
                    </script>
                  
                    <div id="columnchart_material" style="width: auto; height: 500px; margin: 35px;" class="container"></div>

                </div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/footer.php"; ?>
