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


    //Si se usa el botton submit del formulario
    if (isset($_POST['submit'])) {
        /*Si se usa el boton submit recoje los datos del formulario, los actualiza en el registro con id recogido, y da un 
        mensaje avisando.*/
        $query->update_producto($_POST['id'], $_POST['nombre'], $_POST['nombre_corto'], $_POST['descripcion'], $_POST['pvp'], $_POST['familia']);
        echo "Producto modificado";
    }

    /*Se guarda en $producto los datos recogidos de la tabla producto que correspondad al id que nos ha pasado el formulario de 
    listado.php al hacen click en el boton Actualizar*/
    $producto = $query->get_productos_id($_GET['id']);

    /*Cuando encuentra el registro entra al if*/
    if ($producto->num_rows > 0) {
        /*Recojo el registro devuelto*/
        $rows = mysqli_fetch_array($producto);

    ?>
        <!--Meto en un div todos los elemtos para ajustar al 70% de la pagina -->
        <div class="container" style="max-width: 70%">

            <!--El formulario se mandara por el metodo post-->
            <form action="" method="post">

                <h3>Modificar Producto</h3>

                <!--Guardo el id en input hidden para que el usuario no pueda modificarlo pero la aplicacion pueda operar en base a el-->
                <input type="hidden" value="<?php echo $rows['id']; ?>" name="id" class="form-control"></label>

                <!-- form-row reduce el tamaño entre las columnas que crea la propiedad de bootstrap row-->
                <div class="form-row">
                    <!--form-group ayuda a agrupar etiquetas, en este caso el input-->
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre:</label>
                        <input type="text" value="<?php echo $rows['nombre']; ?>" name="nombre" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nombre_corto">Nombre corto:</label>
                        <input type="text" value="<?php echo $rows['nombre_corto']; ?>" name="nombre_corto" class="form-control">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pvp">Precio(€):</label>
                        <input type="number" value="<?php echo $rows['pvp']; ?>" name="pvp" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <!--El despleglable del tipo de familia-->
                        <label for="familia">Familia:</label>
                        <select class="custom-select custom-select-md mb-3" name="familia" id="familia" ?>" >
                            <option value="CAMARA">CAMARA</option>
                            <option value="CONSOL">CONSOL</option>
                            <option value="EBOOK">EBOOK</option>
                            <option value="IMPRES">IMPRES</option>
                            <option value="MEMFLA">MEMFLA</option>
                            <option value="MP3">MP3</option>
                            <option value="MULTIF">MULTIF</option>
                            <option value="NETBOK">NETBOK</option>
                            <option value="ORDENA">ORDENA</option>

                            <option value="PORTAT">PORTAT</option>
                            <option value="ROUTER">ROUTER</option>
                            <option value="SAI">SAI</option>
                            <option value="SOFTWA">SOFTWA</option>
                            <option value="TV">TV</option>
                            <option value="VIDEOC">VIDEOC</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $rows['descripcion']; ?></textarea>
                </div>


                <!--Los botones para operar sobre el formulario -->
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Modificar</button>

                <!--Anido un input que sirve de boton en un enlace para poder vover a la página de inicio-->
                <a class="btn bts-info" href="listado.php">
                    <input type='button' class='btn btn-info btn-sm' name='enviar' value='Volver'></a>

            </form>
        <?php
    }
        ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>