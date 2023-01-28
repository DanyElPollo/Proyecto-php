<?php require_once "includes/redireccion.php"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once 'includes/aside.php'; ?>

<div id="principal">
    <h1>Mis datos</h1>
    <?php if (isset($_SESSION['completado'])) : ?>
        <div class='alerta alerta-exito'><?= $_SESSION['completado']; ?></div>
    <?php endif; ?>

    <form action="actualizar-usuario.php" method="POST">
        <!-- Nombre -->
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre']; ?>" />
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : " "; ?>

        <!-- Apellido -->
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" value="<?= $_SESSION['usuario']['apellido']; ?>" />
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : " "; ?>

        <!-- email -->
        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $_SESSION['usuario']['email']; ?>" />
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : " "; ?>

        <!-- boton registro -->
        <input type="submit" name="submit" value="Actualizar">
    </form>
<?php borrarErrores();?>
</div>

<?php require_once "includes/footer.php"; ?>