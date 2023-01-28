<?php

if (isset($_POST)) {
    require_once "includes/conexion.php";

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

    /*===== Array para el manejo de errores =====*/
    $errores = array();

    /*===== Validar los datos antes de guardalos en la BD =====*/
    //NOMBRE
    if (!empty($nombre)  && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validate = true;
    } else {
        $nombre_validate = false;
        $errores["nombre"] = "El nombre no es valido";
    }

    if (count($errores) == 0) {
        $sql = "INSERT INTO categorias VALUES(null, '$nombre');";
        $query = mysqli_query($db, $sql);
    }
}

header('Location: index.php');
