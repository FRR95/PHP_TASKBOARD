<?php
include 'info_conection_params.php';
include 'common_template.php';
?>








   
    
<body>
<a href="signin.php">AQUI REGISTRARTE</a>  
<a href="login.php">AQUI INICIAR SESION</a>    
<a href="usersinfo.php">MIRAR DIFERENTE PERFILES</a> 

<?php

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["nombre_usuario"])) {
    exit;
}
else{
// Obtener el nombre de usuario almacenado en la sesión
$nombre_usuario = $_SESSION["nombre_usuario"];
$usuario_id = $_SESSION["usuario_id"];
?>
<h2>Bienvenido, <?php echo $nombre_usuario; ?></h2>
    <p>Esta es la página de inicio. Puedes mostrar aquí el contenido para el usuario después de iniciar sesión.</p>
    

    
    <table>
    <h2>Tareas del Usuario</h2>
        <tr>
            <th>Descripción</th>
            <th>Fecha Límite</th>
            <th>BORRAR</th>
        </tr>
        <?php
        $sql = "SELECT id, descripcion, fecha_limite FROM tareas_ WHERE usuario_id = $usuario_id";
        $resultado = $conexion->query($sql);
        while ($fila = $resultado->fetch_assoc()) {
        ?>
        <tr>
        <td><?php echo $fila["descripcion"]?></td>
        <td><?php echo $fila["fecha_limite"]?></td>
        <td><a href='delete.php?id="<?php echo $fila['id'] ?>"' id='btn'>BORRAR</a></td>  
        </tr>
        <?php
        }
        ?>
    </ble>
    <a href="logout.php">Cerrar Sesión</a>
    <h2>AÑADE AQUI TUS TAREAS</h2>
    <form action="insert_task.php" method="POST">
    Descripción de la tarea: <input type="text" name="descripcion"><br>
    Fecha límite: <input type="date" name="fecha_limite"><br>
    <input type="submit" value="Agregar Tarea">
</form>
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


