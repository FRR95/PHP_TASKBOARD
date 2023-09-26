<?php
include 'info_conection_params.php';
include 'common_template.php';
?>
<div class="container my-3">

<h2>LISTAS DE USUARIOS</h2>
 <ul class="list-group">

  <li class="list-group-item">
  <?php 
		$sql="SELECT * FROM `usuarios_` ORDER BY id DESC";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>
    
  <a href='users_info_tasks.php?id="<?php echo $mostrar['id'] ?>"'id='btn'><?php echo $mostrar['nombre'] ?></a>
  <?php 
        }
?>
</li>
</ul>

</div>
   