<?php require_once("includes/header.php"); ?>
<?php //if(!$session->is_signed_in()) {redirect("login.php");}  ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->

            <?php include("includes/top-nav.php"); ?>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php include("includes/sidebar.php"); ?>

            <!-- /.navbar-collapse -->

        </nav>

        <div id="page-wrapper">

                   <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome back
                        
                          <!--   <small>  -->

                            <?php
                            // if($database->connection){
                            //     echo "true";
                            // }

                            // $photos = Photo::find_all();
                            // foreach($photos as $photo){
                            // echo "<br>".$photo->photo_id;
                            // }


                            // $user = User::find_by_id(1);
                            // //  $user = User::instantiation($found_user);
                            
                            //     ///Echo the values as object-property:
                            //     echo $user->username ."!";
                            // ?>
                            // <small>
                            // <?php
                            //     echo "<br>Your ID = ".$user->id;
                            //     echo "<br> Your Name = ".$user->first_name;
                            //     echo " ".$user->last_name;


                            // $user = new User();

                            // $user->username = "Carem";
                            // $user->password = "111";
                            // $user->first_name = "Carom";
                            // $user->last_name = "Board";

                            // $user->create();

                            // $user = Photo::find_by_id(8);
                            // $user->title = "Nononoy";
                            // $user->update();

                            // $user = User::find_by_id(11);
                            // $user->delete();

                            $photo = new Photo();
                            $photo->title = "selfie";
                            $photo->save();

                            ?>
                        </small>
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
