<?php
// Iniciar la sesión si aún no está iniciada
session_start();

// Destruir la sesión actual
session_destroy();

// Redirigir al usuario a la página de inicio o a donde desees después del cierre de sesión
header("Location: index.php"); // Cambia "index.php" por la página a la que deseas redirigir al usuario
exit;
?>
