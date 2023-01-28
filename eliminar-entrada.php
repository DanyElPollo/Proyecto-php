<?php require_once 'includes/conexion.php' ?>
<?php require_once "includes/redireccion.php" ?>
<?php require_once "includes/helpers.php" ?>
<?php

if (isset($_SESSION['usuario']) && isset($_GET['id'])) {
    $respuesta = eliminarEntradas($db, $_GET['id']);
    if ($respuesta) {
        header('Location: index.php?error=1');
    }
}

?>
