
<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos están vacíos
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Los campos no están vacíos, aquí puedes realizar otras validaciones o procesar los datos según sea necesario
        // Por ejemplo, puedes obtener los valores de los campos así:
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        
        // Consulta SQL para verificar si el usuario existe en la base de datos
        $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'";
        
        // Ejecutar la consulta
        $resultado = $conexion->query($consulta);
        
        // Verificar el número de filas devueltas por la consulta
        $numFilas = $resultado->rowCount();
        
        // Verificar si se encontró un usuario con las credenciales proporcionadas
        if ($numFilas == 1) {
            // Inicio de sesión exitoso, redirigir a otra página por ejemplo "dashboard.php"
            header("Location: index.php");
            exit();
        } else {
            // El usuario no existe, mostrar mensaje de error
            echo '<script>alert("El usuario no existe.");</script>';
        }
        
        // Cerrar la conexión
        $conexion = null; // Cerramos la conexión PDO
    }
}
?>