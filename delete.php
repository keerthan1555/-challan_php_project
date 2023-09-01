<?php   
 $connection = mysqli_connect('localhost', 'root', '', 'traffic_challan_db');
 if (isset($_GET['ID'])) {  
      $id = $_GET['ID'];  
      $query = "DELETE FROM `challan` WHERE ID = '$id'";  
      $run = mysqli_query($connection,$query);  
      if ($run) {  
           header('location:modify.php');  
      }else{  
           echo "Error: ".mysqli_error($connection);  
      }  
 }  
 ?>  