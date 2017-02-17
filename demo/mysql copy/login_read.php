<!--

<?php include "functions.php";?>

<?php include "includes/header.php" ?>
-->
<?php include "db.php";?>

<div class="container">
    
    <div class="col-sm-6">

  <pre>
  <?php 
  
    //mysql query for pull data/values from the table
    $query = "SELECT * FROM username";  

    if(!$query){
    	
    	echo "query failed";
    }
    

    $result = mysqli_query($connection, $query);


	//use while loop to pull the data from each row (as array)
	while($row = mysqli_fetch_assoc($result)) {
			print_r($row);
		}
	?>	  
 </pre>
    </div>


<?php include "includes/footer.php" ?>