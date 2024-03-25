<?php

/**
 * La clase Querys se compone de las query que se mandan a la base de datos proyecto
 */
class Querys{
    /**
     * La funcion connection crea y comprueba la conexion con la >BBDD proyecto, pasandole información del usuario, 
     * contraseña, servidor y nombre de la base de datos
     *
     * @return $conn
     */
    public function connection(){
        error_reporting(E_ALL);//muestra errores en php
        $servername = "localhost";//o IP 127.0.0.1 o ::1 o nombre de dominio
        $database = "proyecto";
        $username = "gestor";
        $password = "secreto";
        // Crea la conexion
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Comprueba la conexion
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    
    /**
     * La funcion db_querys manda las querys
     *
     * @param [type] $query
     * @return $datos
     */
    public function db_querys($query){
        
        $datos=$this->connection();
        return $datos->query($query);
    }


    /**
     * La funcion get_listado hace una consulta y trae los registros de la tabla productos
     *
     * @return $this->db_querys
     */
    public function get_listado(){
        return $this->db_querys("SELECT * FROM productos");
    }


    /**
     * La funcion update_producto recibe las variable recogidas en el formulario update.php y las manda a la BBDD proyecto.
     * Por medio del id selecciona el registro que se quiere modificar.
     *
     * @param integer $id
     * @param string $nombre
     * @param string $nombre_corto
     * @param string $descripcion
     * @param float $pvp
     * @param string $familia
     * @return $this->db_querys
     */
    public function update_producto(int $id,string $nombre, string $nombre_corto, string $descripcion, float $pvp, string $familia){
        
        return $this->db_querys("UPDATE `productos` SET nombre='$nombre',nombre_corto='$nombre_corto',descripcion='$descripcion',pvp='$pvp',familia='$familia' WHERE `id` = '$id'");
    }


    /**
     *  La funcion get_productos_id pasa el id recogido lo compara con los de la tabla productos y seleciona y trae los 
     * registros del mismo
     *
     * @param [type] $id
     * @return $this->db_querys
     */
    public function get_productos_id($id){
        return $this->db_querys("SELECT *FROM productos WHERE id = '$id'");
    }


    /**
     *  La funcion get_productos_corto pasa el nombre_corto recogido lo compara con los de la tabla productos y seleciona y trae 
     * los registros del mismo
     *
     * @param [type] $nombre_corto
     * @return $this->db_querys
     */
    public function get_productos_corto($nombre_corto){
        return $this->db_querys("SELECT *FROM productos WHERE nombre_corto = '$nombre_corto'");
    }


    /**
     *  La funcion set_producto inserta un nuevo registro en la tabla productos con los datos recogidos en 
     * el formulario crear.php
     *
     * @param string $nombre
     * @param string $nombre_corto
     * @param string $descripcion
     * @param float $pvp
     * @param string $familia
     * @return $this->db_querys
     */
    public function set_producto(string $nombre, string $nombre_corto, string $descripcion, float $pvp, string $familia){
        return $this->db_querys("INSERT INTO productos (nombre, nombre_corto, descripcion, pvp, familia) VALUES ('$nombre', '$nombre_corto', '$descripcion', '$pvp', '$familia')");
    }
    

    /**
     *  La funcion delete_producto pasa el id recogido lo compara con los de la tabla productos y seleciona y elimina el
     * registro asociado al mismo
     *
     * @param [type] $id
     * @return $this->db_querys
     */
    public function delete_producto($id){
        return $this->db_querys("DELETE FROM productos WHERE id = '$id'");       
    }
   
}