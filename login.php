<?php
session_start();

include 'info_conection_params.php';
include 'common_template.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nombre = $_POST["nombre"];

  
    

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

<div class="container mt-5">
    <h2>Iniciar Sesión</h2>
    <form method="post" action="login.php">
  <div class="mb-3">
    <label  class="form-label">Email</label>
    <input type="email" placeholder="Tu Email" name="email" class="form-control">
    <div id="emailHelp" class="form-text text-danger">*Campo obligatorio</div>
  </div>
  <div class="mb-3">
    <label  class="form-label">Contraseña</label>
    <input type="password" placeholder="Tu Contraseña" name="password" class="form-control" >
    <div id="passwordHelp" class="form-text text-danger">*Campo obligatorio</div>
  </div>
  <button type="submit" class="btn btn-primary">Iniciar sesión</button>
</form>
</div>
</body>
</html>
