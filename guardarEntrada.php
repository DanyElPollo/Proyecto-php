<?php
if (isset($_POST)) {
    require_once "includes/conexion.php";

    if (!isset($_SESSION)) {
        session_start();
    }

    $usuario_id = $_SESSION['usuario']['id'];
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $desc = isset($_POST['desc']) ? mysqli_real_escape_string($db, $_POST['desc']) : false;
    $categoria_id = isset($_POST['categoria']) ? $_POST['categoria'] : false;

    /*===== Array para el manejo de errores =====*/
    $errores = array();

    /*===== Validar los datos antes de guardalos en la BD =====*/
    //ID_USUARIO
    if (empty($usuario_id)) {
        $errores["usuario"] = "El usuario no es valido";
    }

    //ID_CATEGORIA
    if (empty($categoria_id) && !is_numeric($categoria_id)) {
        $errores["categoria"] = "La categoria no es valida";
    }

    //TITULO
    if (empty($titulo)) {
        $errores["titulo"] = "El titulo no es valido";
    }

    //DESCRIPCIÓN
    if (empty($desc)) {
        $errores["desc"] = "La descripcion no es valida";
    }

    if (count($errores) == 0) {
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            $sql = "UPDATE entradas SET titulo='$titulo', descrip='$desc', categoria_id=$categoria_id " .
                "WHERE id = $id AND usuario_id=$usuario_id;";
            $query = mysqli_query($db, $sql);
        } else {
            $sql = "INSERT INTO entradas VALUES(null, $usuario_id, $categoria_id, '$titulo', '$desc', CURDATE());";
            $query = mysqli_query($db, $sql);
        }


        header('Location: index.php');
    } else {
        $_SESSION['errores_entrada'] = $errores;
        header('Location: entrada.php');
    }
}
