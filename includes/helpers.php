<?php

function mostrarError($errores, $campo)
{
    $alerta = "";
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . "</div>";
    }
    return $alerta;
}

function borrarErrores()
{
    $borrar = false;
    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $borrar = true;
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION["completado"] = null;
        $borrar = true;
    }

    if (isset($_SESSION['errores_entrada'])) {
        $_SESSION["errores_entrada"] = null;
        $borrar = true;
    }

    return $borrar;
}

function listarCategorias($conexion)
{
    $resultado = [];

    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $query = mysqli_query($conexion, $sql);

    if ($query && mysqli_num_rows($query) >= 1) {
        $resultado = $query;
    }

    return $resultado;
}

function listarEntradas($conexion, $categoria = null, $limit = null, $busqueda = null)
{
    $resultado = [];

    $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e  " .
        "JOIN categorias c on c.id = e.categoria_id ";

    if ($categoria) {
        $sql .= "WHERE c.id = '$categoria'";
    }

    if($busqueda){
        $sql .= "WHERE e.titulo like '%$busqueda%'";
    }
    
    $sql .= " ORDER BY e.id DESC ";

    if ($limit) {
        $sql .= " LIMIT 4";
    }

    $query = mysqli_query($conexion, $sql);

    if ($query && mysqli_num_rows($query) >= 1) {
        $resultado = $query;
    }

    return $resultado;
}


function detallesEntrada($conexion, $id)
{
    $resultado = [];

    $sql = "SELECT e.*, c.nombre as 'categoria', CONCAT(u.nombre,' ',u.apellido)as 'usuario' FROM entradas e  " .
        "JOIN categorias c on c.id = e.categoria_id " .
        "JOIN usuarios u on u.id = e.usuario_id " .
        "WHERE e.id = '$id';";

    $entrada = mysqli_query($conexion, $sql);

    if ($entrada && mysqli_num_rows($entrada) >= 1) {
        $resultado = mysqli_fetch_assoc($entrada);
    }

    return $resultado;
}

function eliminarEntradas($conexion, $id)
{
    $resultado = [];

    $sql = "DELETE FROM entradas e WHERE e.id = '$id';";
    $query = mysqli_query($conexion, $sql);

    if ($query) {
        $resultado = $query;
    }

    return $resultado;
}

