<!-- registro.php -->

<?php
// Inicializar Firebase
require_once __DIR__ . '/firebase-php-init.php';

// Función de registro
function registrar_usuario($correo, $contraseña, $dni) {
  $db = new FirestoreClient();
  $usuario = [
    'correo' => $correo,
    'contraseña' => $contraseña,
    'dni' => $dni,
  ];
  $db->collection('usuarios')->add($usuario);
  echo "Registro exitoso";
}

// Registro
if (isset($_POST['correo']) && isset($_POST['contraseña']) && isset($_POST['dni'])) {
  $correo = $_POST['correo'];
  $contraseña = $_POST['contraseña'];
  $dni = $_POST['dni'];
  registrar_usuario($correo, $contraseña, $dni);
} else {
  // Mostrar formulario de registro
  ?>
  <h1>Registro de usuario</h1>
  <form action="" method="post">
    <label for="correo">Correo electrónico:</label>
    <input type="email" id="correo" name="correo" required><br><br>
    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="contraseña" required><br><br>
    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" required><br><br>
    <input type="submit" value="Registrar">
  </form>
  <?php
}
?>