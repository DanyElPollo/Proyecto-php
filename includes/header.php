<?php
require_once "conexion.php";
require_once "helpers.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Blog de videojuegos</title>
  <!-- AQUI AGREGAMOS LA HOJA DE ESTILO -->
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
</head>

<body>
  <header id="cabecera">
    <!-- LOGO -->
    <div id="logo">
      <a href="index.php"> Blog de videojuegos </a>
    </div>
    <!-- MENU -->
    <nav id="menu">
      <ul>
        <li><a href="index.php">Inicio</a></li>

        <!-- BARRA DEL MENU DE CATEGORIAS -->
        <?php
        $categorias = listarCategorias($db);
        if (!empty($categorias)) :
          while ($categoria = mysqli_fetch_assoc($categorias)) :
        ?>
            <li><a href="categorias.php?id=<?= $categoria['id']; ?>"><?= $categoria['nombre'] ?></a></li>
        <?php
          endwhile;
        endif;
        ?>

        <li><a href="index.php">Sobre mi</a></li>
      </ul>
    </nav>
    <div clase="clearfix"></div>
  </header>
  <div id="contenedor">