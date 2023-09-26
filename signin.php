<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Conectar a la base de datos
    include 'info_conection_params.php';

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("La conexión a la base de datos ha fallado: " . $conexion->connect_error);
    }

    // Insertar usuario en la base de datos
    $sql = "INSERT INTO usuarios_ (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
    if ($conexion->query($sql) === TRUE) {
        echo "Registro exitoso";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }


    $conexion->close();
}
?>
<html>
<body>
    <h2>Registro de Usuario</h2>
    <form method="post" action="signin.php">
        Nombre: <input type="text" name="nombre"><br>
        Email: <input type="text" name="email"><br>
        Contraseña: <input type="password" name="password"><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
