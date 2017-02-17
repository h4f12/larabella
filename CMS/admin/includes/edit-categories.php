                        <?php
                       

                            $query = "SELECT * FROM categories WHERE cat_id = $cat_id_edit";
                                        $query_cat_edit = mysqli_query($connect, $query);

                                        
                                        while($row = mysqli_fetch_assoc($query_cat_edit)) {
                                            $cat_id_edit = $row['cat_id'];
                                            $cat_title_edit = $row['cat_title'];

                                        }

                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label> Edit Category </label>
                                    <input value='<?php if(isset($cat_title_edit)){echo $cat_title_edit;} ?>'class="form-control" type="text" name="cat_title_edit"></input>
                                </div>

                                    
                                     <?php
                                        //EDIT CATEGORY NAME
                                        if(isset($_POST['edit'])){
                                        $cat_title_update = $_POST['cat_title_edit'];
                                           // echo "fetch value";



                                        $query = "UPDATE categories SET cat_title = '{$cat_title_update}' WHERE cat_id = $cat_id_edit";
                                        $query_update_cat_title = mysqli_query($connect, $query);
                                        //header("Location: categories.php");

                                        if(!$query_update_cat_title){
                                            echo "not connected to DB";
                                        }
                                        

                                    }
                                    ?>

                                <div class="form-group">
                                    <input class="btn btn-danger" type="submit" name="edit" value="EDIT"></input>
                                </div>
                            </form>

                       
