<?php

function add_new_category(){

    global $connect;

    if(isset($_POST['submit'])){
    $cat_title = $_POST['cat_title'];

    if($cat_title == "" || empty($cat_title)){
    echo "This box can not be empty";
    }
    else{
    $query = "INSERT INTO categories(cat_title) VALUES('{$cat_title}')";
    $query_create_new_cat = mysqli_query($connect, $query);

    if(!$query_create_new_cat){
    die("CONNECTION FAIL"). mysqli_error($connect);                                   
    }
    else{
    echo "$cat_title successfully created";
    }
    }

    }

}

function all_categories(){

    global $connect;

    $query = "SELECT * FROM categories";
    $all_cat = mysqli_query($connect, $query);

    while($row = mysqli_fetch_assoc($all_cat)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    
    echo "<tr><td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td></tr>";                                 
    }

}



function delete_category(){

    global $connect;

    if(isset($_GET['delete'])){
    $cat_id_del = $_GET['delete'];

    $query = "DELETE FROM categories WHERE cat_id = {$cat_id_del}";
    $query_delete_cat = mysqli_query($connect, $query);
    header("Location: categories.php");

    }

}




?>