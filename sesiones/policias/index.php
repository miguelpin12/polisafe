<?php include("../../conexion.php");

if (isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
$sentencia=$conexion->prepare("DELETE FROM policias WHERE idPolicias=:id"); $sentencia->bindParam(":id", $txtID);
$sentencia->execute();
header("Location:index.php");
}
$setencia=$conexion->prepare("SELECT * FROM policias");
$setencia-> execute(); 
$lista_tbl_policias=$setencia->fetchAll(PDO::FETCH_ASSOC);


   ?>
<?php include("../../layout/header.php"); 
?>
<br/>
<h4>Policias</h4>
<div class="card">
    <div class="card-header">
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="crear.php"
            role="button"
            >Agregar policia</a
        >
        
    </div>

    <div class="card-body">
<div
    class="table-responsive-sm"
>
    <table
        class="table table-policia"
    >
        <thead>
            <tr>
                <th scope="col">ID Policia</th>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Genero</th>
                <th scope="col">Rol</th>
                <th scope="col">Telefono</th>
                <th scope="col">Edad</th>
                <th scope="col">Fecha de Ingreso</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($lista_tbl_policias as $registro){?>

            <tr class="">
            <td scope="row"><?php echo $registro['idPolicias'];?></td>
            <td>Foto.jpg</td>
            <td><?php echo $registro['Nombre'];?></td>
            <td><?php echo $registro['Apellido'];?></td>
            <td><?php echo $registro['Genero'];?></td>
            <td><?php echo $registro['Rol'];?></td>
            <td><?php echo $registro['Telefono'];?></td>
            <td><?php echo $registro['Edad'];?></td>
            <td><?php echo $registro['Fechaingreso'];?></td>
            <td><a
                class="btn btn-info"
                href="editar.php?txtID=<?php echo $registro['idPolicias'];?>" role="button">Editar</a>
            |<a
                id=""
                class="btn btn-danger"
                href="index.php?txtID=<?php echo $registro['idPolicias'];?>"
                role="button"
                >Eliminar</a
            >
            </td>

        </tr>
        
            <?php } ?>
            
        </tbody>
    </table>
</div>

    </div>
    
</div>
<?php include("../../layout/footer.php"); ?>