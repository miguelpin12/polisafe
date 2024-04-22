<?php
include("../../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $genero = $_POST['idgenero'];
    $rol = $_POST['rol'];
    $telefono = $_POST['Telefono'];
    $edad = $_POST['edad'];
    $fechaIngreso = $_POST['fechadeingreso'];
    $foto = $_FILES['foto']['name']; // Obtener el nombre del archivo de la imagen

    // Ruta donde se guardarán las imágenes
    $ruta = "../../fotos/";

    // Mover la imagen cargada a la carpeta de fotos
    move_uploaded_file($_FILES['foto']['tmp_name'], $ruta . $foto);

    // Actualizar los datos del policía en la tabla policias
    $sql = "UPDATE policias SET Nombre=?, Apellido=?, Genero=?, Rol=?, Telefono=?, Edad=?, Fechaingreso=?, Foto=? WHERE idPolicias=?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$nombre, $apellido, $genero, $rol, $telefono, $edad, $fechaIngreso, $foto, $id]);
    $_SESSION['mensaje'] = "Policía actualizado con éxito";
}

// Obtener el ID del policía a editar desde la URL
$id = $_GET['txtID'];

// Obtener los datos del policía con ese ID
$statement = $conexion->prepare("SELECT * FROM policias WHERE idPolicias = ?");
$statement->execute([$id]);
$policia = $statement->fetch(PDO::FETCH_ASSOC);
?>

<?php include("../../layout/header.php"); ?>
<br/>
<h4>Editar Policia</h4>
<div class="card">
    <div class="card-header">Datos del policía</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Agregar un campo oculto para enviar el ID del policía -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $policia['Nombre']; ?>">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido/s</label>
                <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $policia['Apellido']; ?>">
            </div>
            <div class="mb-3">
                <label for="idgenero" class="form-label">Genero</label>
                <select class="form-select form-select-lg" name="idgenero" id="idgenero">
                    <option value="Masculino" <?php if ($policia['Genero'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                    <option value="Femenino" <?php if ($policia['Genero'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <input type="text" class="form-control" name="rol" id="rol" value="<?php echo $policia['Rol']; ?>">
            </div>
            <div class="mb-3">
                <label for="Telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="Telefono" id="Telefono" value="<?php echo $policia['Telefono']; ?>">
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="text" class="form-control" name="edad" id="edad" value="<?php echo $policia['Edad']; ?>">
            </div>
            <div class="mb-3">
                <label for="fechadeingreso" class="form-label">Fecha de ingreso</label>
                <input type="date" class="form-control" name="fechadeingreso" id="fechadeingreso" value="<?php echo $policia['Fechaingreso']; ?>">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Fotografía:</label>
                <input type="file" class="form-control" name="foto" id="foto">
            </div>
            <button type="submit" class="btn btn-success">Guardar cambios</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>
<?php include("../../layout/footer.php"); ?>
