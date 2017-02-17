<?php
   

   $connection = mysqli_connect('localhost', 'root', '', 'Pengguna');
    if(!$connection) {
        die("Database connection failed");
    }

    