<?php
include("../../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
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

    // Insertar los datos en la tabla policias
    $sql = "INSERT INTO policias (Nombre, Apellido, Genero, Rol, Telefono, Edad, FechaIngreso, Foto) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$nombre, $apellido, $genero, $rol, $telefono, $edad, $fechaIngreso, $foto]);
    $_SESSION['mensaje'] = "Policía agregado con éxito";
}
?>
<?php include("../../layout/header.php"); ?>
</br>
<h4>Registrar Policia </h4>
<div class="card">
    <div class="card-header">Datos del policia</div>
    <div class="card-body">
<form action="" method="post" enctype="multipart/form-data">
<div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input
        type="text"
        class="form-control"
        name="nombre"
        id="nombre"
        aria-describedby="helpId"
        placeholder=""
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">Apellido/s</label>
    <input
        type="text"
        class="form-control"
        name="apellido"
        id="apellido"
        aria-describedby="helpId"
        placeholder=""
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">Genero</label>
    <select
        class="form-select form-select-lg"
        name="idgenero"
        id="idgenero"
    >   <option selected>Selecciona</option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select>
</div>
<div class="mb-3">
    <label for="" class="form-label">Rol</label>
    <input
        type="text"
        class="form-control"
        name="rol"
        id="rol"
        aria-describedby="helpId"
        placeholder=""
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">Telefono</label>
    <input
        type="text"
        class="form-control"
        name="Telefono"
        id="Telefono"
        aria-describedby="helpId"
        placeholder=""
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">Edad</label>
    <input
        type="text"
        class="form-control"
        name="edad"
        id="edad"
        aria-describedby="helpId"
        placeholder=""
    /> 
</div>
<div class="mb-3">
    <label for="" class="form-label">Fecha de ingreso</label>
    <input
        type="date"
        class="form-control"
        name="fechadeingreso"
        id="fechadeingreso"
        aria-describedby="emailHelpId"
        placeholder="Fecha de ingreso"
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">Fotografia:</label>
    <input
        type="file"
        class="form-control"
        name="foto"
        id="foto"
        placeholder="foto"
        aria-describedby="fileHelpId"
    />
<button
    type="submit"
    class="btn btn-success"> Agregar registro</button>
    <a
        name=""
        id=""
        class="btn btn-primary"
        href="index.php"
        role="button"
        >Cancelar</a>
    

</form>
    </div>
    <?php
// Mostrar el mensaje si existe
if (isset($_SESSION['mensaje'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['mensaje'] . '</div>';
    // Eliminar el mensaje de la sesión después de mostrarlo
    unset($_SESSION['mensaje']);
}
?>
</div>
<?php include("../../layout/footer.php"); ?>