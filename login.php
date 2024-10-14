<?php
// Inicializar Firebase
require_once __DIR__ . '/firebase-php-init.php';

// Función de autenticación
function autenticar_usuario($correo, $contraseña) {
  $db = new FirestoreClient();
  $query = $db->collection('usuarios')->where('correo', '=', $correo);
  $documents = $query->documents();
  foreach ($documents as $document) {
    $usuario = $document->data();
    if ($usuario['contraseña'] === $contraseña) {
      return true;
    }
  }
  return false;
}

// Página de acceso
if (isset($_POST['correo']) && isset($_POST['contraseña'])) {
  $correo = $_POST['correo'];
  $contraseña = $_POST['contraseña'];
  if (autenticar_usuario($correo, $contraseña)) {
    // Mostrar formulario de registro
    ?>
    <form action="registro.php" method="post">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre"><br><br>
      <label for="apellidos">Apellidos:</label>
      <input type="text" id="apellidos" name="apellidos"><br><br>
      <label for="dni">DNI:</label>
      <input type="text" id="dni" name="dni"><br><br>
      <input type="submit" value="Registrar">
    </form>
    <?php
  } else {
    echo "Correo electrónico o contraseña incorrectos";
  }
}
?>