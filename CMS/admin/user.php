<?php include "includes/header.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/nav.php"; ?>

        <!-- /.navbar-collapse -->

        <div id="page-wrapper">

            <div class="container-fluid">

               

                        <?php 
                        
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                            }else {
                              $source = '';  
                            }

                            switch($source){

                                case 'add';
                                include "includes/add-user.php";
                                break;

                                case "edit";
                                include "includes/edit-user.php";
                                break;

                                default:
                                include "includes/view-all-users.php";
                                break;
                            }

                        


                        ?>


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
