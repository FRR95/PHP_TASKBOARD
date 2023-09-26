<?php   
//DELETE

include 'info_conection_params.php';
if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `tareas_` WHERE id = $id";  
      $run = mysqli_query($conexion,$query);  
      if ($run) { 
          
        header("Location: http://localhost/LOGIN/index.php");
        
       
             
      }else{  
           echo "Error: ".mysqli_error($conexioninclude);  
      }  
 }

 ?> 