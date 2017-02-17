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
                            Admin Page
                            <small>Subheading</small>
                        </h1>

                       

                        <div class="container col-xs-5">

                <!-- ADD NEW CATEGORY -->
                            <?php add_new_category(); ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label> Add Category </label>
                                    <input class="form-control" type="text" name="cat_title"></input>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category"></input>
                                </div>
                            </form>


                <!-- EDIT CATEGORY NAME -->

                                <?php 
                                 if(isset($_GET['edit'])){
                                $cat_id_edit = $_GET['edit'];

                                include "includes/edit-categories.php"; 
                                }
                                ?>

                        </div>
            <!-- //SHOW DATA (CATEGORIES) IN TABLE [PHP] -->
                        <div class="col-xs-6">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                       <?php 

                                        all_categories(); 

                                        //DELETE CATEGORY
                                        delete_category();

                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



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

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/footer.php"; ?>
