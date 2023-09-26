<?php   

include 'info_conection_params.php';
?>

<h2>Tareas del Usuario</h2>
    <table>
        <tr>
            <th>Descripción</th>
            <th>Fecha Límite</th>
        </tr>
<?php   
if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "SELECT * FROM `tareas_` WHERE usuario_id = $id";  
      $run = mysqli_query($conexion,$query); 
      while($mostrar=mysqli_fetch_array($run)){
      ?> 


		<tr>
            
		    <td><?php echo $mostrar['descripcion'] ?></td>
			<td><?php echo $mostrar['fecha_limite'] ?></td>
            
	
		</tr>
		
      <?php   

}
}

 ?> 