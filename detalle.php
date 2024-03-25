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

    /*Se guarda en $producto los datos recogidos de la tabla producto que correspondad al id que nos ha pasado el formulario de 
    listado.php al hacen click en el boton Actualizar*/
    $producto = $query->get_productos_id($_GET['id']);

    /*Cuando encuentra el registro entra al if*/
    if ($producto->num_rows > 0) {

        /*Recojo el registro devuelto*/
        $rows = mysqli_fetch_array($producto);
    ?>

        <h4>Detalle Producto</h4>

        <!--Uso propiedades de style inline para poder sobreescribir las de bootstrap y aplicarlas solo a esta tabla-->
        <table class="table-borederless" style="margin-top: 2%; width: 70%; color: white" align="center">
            <thead style="background-color: #049bae;">
                <tr>
                    <th>
                        <h6><?php echo $rows["nombre"] ?></h6>
                    </th>
                </tr>
            </thead>

            <tbody style="background-color: #07b8cf;">
                <tr>
                    <td>
                        <h5 style="text-align: center;"><?php echo "Código: " . $rows["id"] ?></h5>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <p><?php echo "Nombre: " . $rows["nombre"] ?></p>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <p><?php echo "Nombre corto: " . $rows["nombre_corto"] ?></p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p><?php echo "Familia: " . $rows["familia"] ?></p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p><?php echo "Pvp: " . $rows["pvp"] ?></p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p><?php echo "Descripcion: " . $rows["descripcion"] ?></p>
                    </td>
                </tr>

            </tbody>
        </table>

        <!--Anido en un contenedor el input para vover para poder centrarlo-->
        <div class="container" style="text-align: center">
            <!--Anido un input que sirve de boton en un enlace para poder vover a la página de inicio-->
            <a class="btn bts-success btn-sm" href="listado.php">
                <input type='submit' class='btn btn-success btn-sm' name='enviar' value='Volver' style="text-align: center;"></a>
        </div>

    <?php
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>