<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar nuevo producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    //Incluyo el fichero que continene la clase Querys
    include("Querys.php");
    /*Instancia el objeto querys. que es una clase que contiene unas funciones con las que realizar las operaciones deseadas sobre 
    la tabla proyecto*/
    $query = new Querys() ;  

    //Si se usa el botton submit del formulario
    if (isset($_POST['submit'])) {
        /*Se usa la clase get_productos_corto para comprobar que no se ha ingresado el producto antes, o al menos no con ese codigo 
        de nombre corto*/
        $producto = $query->get_productos_corto($_POST['nombre_corto']);

        /*Si se encuentra una coincidencia en nombre_corto, da un mensaje y no ingresa el nuevo registro, si no, recoje los datos 
        del formulario, los inserta y da un mensaje avisando.*/
        if ($producto->num_rows > 0) {
            echo "Ya existe un producto con ese nombre corto.";
        } else {
            $query->set_producto($_POST['nombre'], $_POST['nombre_corto'], $_POST['descripcion'], $_POST['pvp'], $_POST['familia']);
            echo "Producto registrado";
        }
    }

    ?>
    <!--Meto en un div todos los elemtos para ajustar al 70% de la pagina -->
    <div class="container" style="max-width: 70%">

        <!--El formulario se mandara por el metodo post-->
        <form action="" method="post">
            
            <h3>Crear Producto</h3>

            <!-- form-row reduce el tamaño entre las columnas que crea la propiedad de bootstrap row-->
            <div class="form-row">
                <!--form-group ayuda a agrupar etiquetas, en este caso el input-->
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="nombre_corto">Nombre corto:</label>
                    <input type="text" name="nombre_corto" class="form-control">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pvp">Precio(€):</label>
                    <input type="number" name="pvp" class="form-control">
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
                <textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
            </div>

            <!--Los botones para operar sobre el formulario -->
            <button type="submit" name="submit" class="btn btn-primary btn-sm">Crear</button>
            <button type="reset" name="submit" class="btn btn-success btn-sm">Limpiar</button>

            <!--Anido un input que sirve de boton en un enlace para poder vover a la página de inicio-->
            <a class="btn bts-info" href="listado.php">
                <input type='button' class='btn btn-info btn-sm' name='enviar' value='Volver'></a>
    </div>
    </form>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>