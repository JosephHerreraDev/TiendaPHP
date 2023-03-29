<?php
$conexion = new PDO('mysql:host=127.0.0.1;dbname=supermercado', 'root', '');
if(array_key_exists('boton', $_POST)) {
    $nombre = $_POST['Nombre'];
    $precio = $_POST['Precio'];
    $consulta = $conexion->prepare('INSERT INTO producto VALUES (NULL, :nombre, :precio, 0)');    
    
    $consulta->execute(array(":nombre" => $nombre, ":precio" => $precio));
    }
?>