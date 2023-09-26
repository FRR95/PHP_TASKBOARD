<?php   

include 'info_conection_params.php';
include 'common_template.php';
?>


 <div class="container mt-5 text-center">
 <?php
       if (isset($_GET['id'])) {  
        $id = $_GET['id'];  
        $query = "SELECT * FROM `usuarios_` WHERE id = $id";  
        $run = mysqli_query($conexion,$query); 
        while($mostrar=mysqli_fetch_array($run)){
    ?>
 <h2>Tareas de <?php echo $mostrar["nombre"]; ?> </h2>

 <?php
       }
    }
 ?>
        <div class="reveal row row-cols-3 g-3">
<?php 
   if (isset($_GET['id'])) {  
    $id = $_GET['id'];  
    $query = "SELECT * FROM `tareas_` WHERE usuario_id = $id";  
    $run = mysqli_query($conexion,$query); 
    while($mostrar=mysqli_fetch_array($run)){
		
	?>
    <div class="my-3">
    <div class="col ">
        <div class="card">
            <div class="card-body">
                <p class="card-text"><?php echo $mostrar["descripcion"] ?></p>
            </div>
            <div class="card-body">
                <p class="card-text">Fecha de realización:<?php echo $mostrar["fecha_limite"] ?></p>
            </div>
            
        </div>

 
    </div>
    </div>
    <?php 
        }
    }
        ?>
</div>
</div>