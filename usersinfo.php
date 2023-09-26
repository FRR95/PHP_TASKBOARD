<div class="table_results">
    <table id="table">
	<thead>
		<tr>
            
		    <td>Nombre</td>
		
            
			
			
		</tr>
	</thead>
		<?php 
           // Conectar a la base de datos  
        include 'info_conection_params.php';;
		$sql="SELECT * FROM `usuarios_` ORDER BY id DESC";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>
    <tbody>
		<tr>
            <td><a href='users_info_tasks.php?id="<?php echo $mostrar['id'] ?>"' id='btn'><?php echo $mostrar['nombre'] ?></a></td>  
		</tr>
		</tbody>
	<?php 
	}
	 ?>

	</table>
    </div>