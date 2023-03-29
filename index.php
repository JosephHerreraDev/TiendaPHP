<?php
 try {
    $total = 0;
  $conexion = new PDO('mysql:host=127.0.0.1;dbname=supermercado', 'root', '');  
  $idUsuario = 0;

  $con = "SELECT Nombre, Precio FROM producto WHERE idUsuario = '".$idUsuario."'"; 

  $consulta = $conexion->query($con); 
  $consulta->execute(); 
  
  foreach($consulta as $fila){
    $Nota[] = array('Nombre' => $fila['Nombre'], 'Precio' => $fila['Precio']);
  }

  foreach($Nota as $fila){
    $total += $fila['Precio'];
}

} catch (PDOException $e) {
  echo "Vale madre: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link href="style.css" rel="stylesheet" />
    <link href="calendario.css" rel="stylesheet" />
    <title>Carrito</title>
  </head>
  <body>
    <main>
      <form action="agrega.php" method="post">
        <h3>Agregar</h3>
        <label for="Nombre">Nombre: </label>
        <input type="text" name="Nombre" id="Nombre"/>
        <label for="Precio">Precio: </label>
        <input type="text" name="Precio" id="Precio"/>
        <button name="boton" type="submit" class="btn btn-outline-primary">
            Guarda
        </button>
      </form>
      <form action="elimina.php" method="post">
        <h3>Elimina</h3>
        <label for="Nombre-Elimina">Nombre: </label>
        <input type="text" name="Nombre-Elimina" id="Nombre-Elimina"/>
        <button name="boton-elimina" type="submit" class="btn btn-outline-primary">
            Elimina
        </button>
      </form>
      <div class="contenedor">
        <div class="container-fluid">
            <!-- Show agenda elements dinamically -->
            <h3>Articulos</h3>
            <p><?php
                foreach($Nota as $fila){
                    echo "<h4> Nombre: ".$fila['Nombre']."</h4>";
                    echo "<p> Precio: ".$fila['Precio']."</p>";
                    echo "<br>";
                }
            ?></p>
            <p>Total:</p>
        </div>
      </div>
    </main>
    <script type="text/javascript">       
      var total="<?php echo $total; ?>";
      document.write(total);
    </script>
  </body>
</html>
