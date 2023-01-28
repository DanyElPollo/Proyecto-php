<?php require_once 'includes/conexion.php'; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once 'includes/aside.php'; ?>

<?php

$entradas = detallesEntrada($db, $_GET['id']);

if (!isset($entradas['id'])) {
    header('Location: index.php');
}
?>

<div id='principal'>
    <h1><?= $entradas["titulo"] ?></h1>
    <a href="categorias.php?id=<?= $entradas['categoria_id'] ?>">
        <h2><?= $entradas["categoria"] ?></h2>
    </a>
    <h4><?= $entradas["fecha"] ?>| <?=$entradas['usuario'] ?></h4>
    <p><?= $entradas["descrip"] ?></p>

    <?php if (isset($_SESSION['usuario'])  && $_SESSION['usuario']['id'] == $entradas['usuario_id']) : ?>
        <a href="editar-entradas.php?id=<?= $entradas['id'] ?>" class="boton boton-verde">Editar Entrada</a>
        <a href="eliminar-entrada.php?id=<?= $entradas['id'] ?>" class="boton">Eliminar Entrada</a>
    <?php endif; ?>
</div>