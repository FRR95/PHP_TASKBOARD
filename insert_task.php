<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["nombre_usuario"])) {
    header("Location: login.php"); // Redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
    exit;
}

// Obtener los datos del formulario
$descripcion = $_POST["descripcion"];
$fecha_limite = $_POST["fecha_limite"];

// Validar los datos (puedes realizar una validación más robusta según tus necesidades)

// Conectar a la base de datos (reemplaza con tus datos de conexión)
include 'info_conection_params.php';

// Verificar la conexión
if ($conexion->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conexion->connect_error);
}

// Obtener el ID del usuario actual
$usuario_id = $_SESSION["usuario_id"];

// Insertar la tarea en la base de datos
$sql = "INSERT INTO tareas_ (descripcion, fecha_limite, usuario_id) VALUES ('$descripcion', '$fecha_limite', $usuario_id)";

if ($conexion->query($sql) === TRUE) {
    $_SESSION["html"] = "<div style='background-color:aqua;'>Tarea agregada con exito!!</div>";
    header("Location:index.php");
} else {
    echo "Error al agregar la tarea: " . $conexion->error;
}

$conexion->close();
?>
