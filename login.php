<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nombre = $_POST["nombre"];

    // Conectar a la base de datos
    include 'info_conection_params.php';

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("La conexión a la base de datos ha fallado: " . $conexion->connect_error);
    }

    // Buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios_ WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        if (password_verify($password, $fila["password"])) {
            $_SESSION["usuario_id"] = $fila["id"];
            $_SESSION["nombre_usuario"] = $fila["nombre"];
            header("Location: index.php");
            //PAKITOPAKOELPAKO
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }

    $conexion->close();
}
?>
<html>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="post" action="login.php">
        Email: <input type="text" name="email"><br>
        Contraseña: <input type="password" name="password"><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
