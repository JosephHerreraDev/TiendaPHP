<?php
 try {
  $conexion = new PDO('mysql:host=127.0.0.1;dbname=supermercado', 'root', '');  

if(array_key_exists('boton-elimina', $_POST)) {
    $nombre = $_POST['Nombre-Elimina'];
    $consulta = $conexion->prepare('DELETE FROM producto WHERE nombre = :nombre');    
        
    $consulta->execute(array(":nombre" => $nombre));
}

  

} catch (PDOException $e) {
  echo "Vale madre: " . $e->getMessage();
}