<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado productos BBDD proyecto</title>
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

    ?>
    <!--Meto en un div todos los elemtos para ajustar al 70% de la pagina -->
    <div class="container" style="max-width: 70%">

        <h2>Gestión de Productos</h2>

        <!--Anido un input que sirve de boton en un enlace para poder accerder al archivo crear.php y crear un nuevo registro-->
        <a class="btn bts-success" href="crear.php">
            <input type='submit' class='btn btn-success btn-sm' name='enviar' value='Crear'></a>

        <!--Creo una tabla qu contendra la lista de productos-->
        <table class="table table-striped table-dark text-center">
            <thead>
                <tr>
                    <div class="col">
                        <th scope="col">Detalle</th>
                    </div>
                    <div class="col">
                        <th scope="col">Código</th>
                    </div>
                    <div class="col">
                        <th scope="col">Nombre</th>
                    </div>
                    <div class="col">
                        <th scope="col">Acciones</th>
                    </div>
                </tr>
            </thead>

            <tbody>
                <?php
                /* Hago uno de la funcion get listado para recuperar los datos de la lista. Cada vez que se ejecute el bucle, 
                sacara un registro a la tabla.
                */
                foreach ($query->get_listado() as $nuevo) {
                ?>
                    <tr>
                        <!--El input que enlaza al archivo detalle.php-->
                        <td><a class="btn bts-info btn-sm" href="detalle.php?id=<?php echo $nuevo["id"] ?>"><input type='button' class='btn btn-info btn-sm' name='enviar3' value='Detalles'></a>
                        </td>
                        <!--Mostrara en cada fila el identificador del producto-->
                        <td><?php echo $nuevo["id"] ?></td>
                        <!--Mostrara en cada fila el nombre del producto-->
                        <td><?php echo $nuevo["nombre"] ?></td>

                        <td>
                            <!--Agrupo los botones para que ocupen menos espacio. Cada input enlaza al archivo necesario.-->
                            <div class="btn-group" role="group">
                                <a class="btn bts-warning btn-sm" href="update.php?id=<?php echo $nuevo["id"] ?>">
                                    <input type='button' class='btn btn-warning btn-sm' name='enviar1' value='Actualizar'></a>
                                <a class="btn bts-danger btn-sm" href="borrar.php?id=<?php echo $nuevo["id"] ?>">
                                    <input type='submit' class='btn btn-danger btn-sm' name='enviar2' value='Borrar'></a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>