<?php
include 'info_conection_params.php';
include 'common_template.php';
?>








   
    
<body>
  
   


<?php

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["nombre_usuario"])) {
 echo '<div class="card container mt-5 text-center mb-3" style="width: 18rem;">
 <div class="card-body">
   <h5 class="card-title">¡HOLA!</h5>
   <p class="card-text">Para poder ver tu contenido de tareas debes de iniciar sesion</p>
   <p class="card-text">¿No tienes una cuenta?</p>
   <a href="signin.php" class="btn btn-primary">REGISTRATE</a>
 </div>
</div>'; 
}
else{
// Obtener el nombre de usuario almacenado en la sesión
$nombre_usuario = $_SESSION["nombre_usuario"];
$usuario_id = $_SESSION["usuario_id"];
?>


    
<div class="card container mb-3 text-center">
  <div class="card-header">
  <h2>Bienvenido, <?php echo $nombre_usuario; ?>!!</h2>
  </div>
  <div class="card-body">
<p class="card-text">Aqui podras ver,añadir o eleiminar tus tareas pendientes</p>
<a href="logout.php"><button class="btn btn-danger">Cerrar sesión</button></a>
  </div>
</div>

<div class="container text-center">
        <div class="reveal row row-cols-3 g-3">
<?php 
    $sql = "SELECT id, descripcion, fecha_limite FROM tareas_ WHERE usuario_id = $usuario_id";
    $resultado = $conexion->query($sql);
    while ($fila = $resultado->fetch_assoc()) {
		
	?>
    <div class="my-3">
    <div class="col ">
        <div class="card">
            <div class="card-body">
                <p class="card-text"><?php echo $fila["descripcion"] ?></p>
            </div>
            <div class="card-body">
                <p class="card-text">Fecha de realización:<?php echo $fila["fecha_limite"] ?></p>
            </div>

            <div class="card-footer ">
        <a href='delete.php?id="<?php echo $fila['id'] ?>"' class="btn btn-danger">BORRRAR</a>
  </div>
            
        </div>

 
    </div>
    </div>
    <?php 
        }
        ?>
</div>
</div>

<div class="card container text-center">

<div class="card-header">
<h2>AÑADE AQUI TUS TAREAS</h2>
  </div>
            <div class="card-body">
            <form action="insert_task.php" method="POST">

            <label  class="form-label">Descripción de la tarea</label>
     <input type="text" placeholder="Descripción"  name="descripcion"><br>
     <label  class="form-label"> Fecha límite</label>
    <input type="date" placeholder="Fecha límite" name="fecha_limite"><br>
    <button type="submit" class="btn btn-primary">Agregar tarea</button>
</form>

            </div>

            
        </div>

    
    

<?php
}
?>
<?php
if (!isset($_SESSION["html"])) {
    exit;
}
else{
    $html_info = $_SESSION["html"];
    echo $html_info;
}
?>
</body>


