
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Inicio de sesion</h1>
    <div class="container">
        <div class="logo">
         <h2 class="tittle">BIENVENIDO</h2>
            <img class="logo_img" src="img/logo.png" alt="">
        </div>
        <form method="post" class="form">
            <div class="form__usuario">
                <label for="">Usuario</label>
                <input id="usuario" type="text" class="usuario" name="usuario">
            </div>
            <div class="form__clave">
                <label for="">Contraseña</label>
                <input id="clave" type="password" class="clave" name="clave">
                <span id="ver" class="ver_clave"><i id="icono" class="fas fa-eye"></i></span>
                
            </div>
            <?php
            include("conexion.php");
            include("controlador.php"); ?>
            <div class="form__boton">
                <button class="boton">Ingresar</button>
            </div>
        </form>
    </div>
    <script src="js/main.js"></script>
</body>

</html>