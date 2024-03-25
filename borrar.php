<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    //Incluyo el fichero que continene la clase Querys
    include("Querys.php");

    /*Instancia el objeto querys. que es una clase que contiene unas funciones con las que realizar las operaciones deseadas sobre 
    la tabla proyecto*/
    $query = new Querys();
    $id=$_GET["id"];//le paso el id recogido en el formulario de listado.php

    //Llamo a la funcion get_productos_id para eliminar el registro de la tabla
    $query->delete_producto($id);
    

    /*Si se realiza correctamente, mostrara un mensaje informandolo, tambien lo hare en el caso de que no se realice, 
    por ejemplo si recargas el formulario del registro que acabas de borrar.*/
    if ($query) {
        echo "Producto de Código: " . $id . " Borrado correctamente.";
        ?>
        <a class="btn bts-success btn-sm" href="listado.php">
            <input type='submit' class='btn btn-success btn-sm' name='enviar' value='Volver'></a>
        <?php
    } else {
        echo "Se ha producido un error.";
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>