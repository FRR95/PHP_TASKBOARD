<?php
include 'info_conection_params.php';
include 'common_template.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    
    

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
<div class="container mt-5">
    <h2>Regístrate</h2>
<form method="post" action="signin.php">

  <div class="mb-3">
    <label  class="form-label">Nombre</label>
    <input type="text" placeholder="Tu Nombre" name="nombre" class="form-control" >
    <div id="passwordHelp" class="form-text text-danger">*Campo obligatorio</div>
  </div>

  <div class="mb-3">
    <label  class="form-label">Email</label>
    <input type="text" placeholder="Tu Email" name="email" class="form-control">
    <div id="emailHelp" class="form-text text-danger">*Campo obligatorio</div>
  </div>

  <div class="mb-3">
    <label  class="form-label">Contraseña</label>
    <input type="password" placeholder="Tu Contraseña" name="password" class="form-control" >
    <div id="passwordHelp" class="form-text text-danger">*Campo obligatorio</div>
  </div>
  <button type="submit" class="btn btn-primary">Regístrate</button>
</form>
</div>
</body>
</html>
