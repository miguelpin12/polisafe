<?php
$servidor="localhost";
$basededatos="polisafe";
$usuario="root";
$contrasenia="";
try{
    $conexion=new PDO ("mysql:host=$servidor;dbname=$basededatos",$usuario,$contrasenia );
}catch(Exception $ex){
    echo $ex->getMesage();
}
?>