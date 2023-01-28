<?php require_once "includes/redireccion.php"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once 'includes/aside.php'; ?>
<?php require_once 'includes/conexion.php'; ?>


<div id="principal">
    <h1>Crear Entradas</h1>
    <form action="guardarEntrada.php" method="POST">
        <p>Añade nuevas entradas al blog para que se pueda disfrutar en toda la comunidad</p>
        <br>

        <!-- Se valida los erroes y enviamos alertas segun el tipo -->
        <?php if (isset($_SESSION['completado'])) : ?>
            <div class='alerta alerta-exito'><?= $_SESSION['completado']; ?></div>
        <?php endif; ?>

        <hr></br>
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo"">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : " " ?>

        <label for=" desc">Descripcion:</label>
        <textarea name="desc" cols="50" rows="15"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'desc') : " " ?>

        <label for="categoria">Categoria:</label>
        <select name="categoria">
            <?php
            $categorias = listarCategorias($db);
            if (!empty($categorias)) :
                while ($categoria = mysqli_fetch_assoc($categorias)) :
            ?>
                    <option value="<?= $categoria['id']; ?>">
                        <?= $categoria['nombre']; ?>
                    </option>
            <?php
                endwhile;
            endif;
            ?>
        </select>

        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores();?>
</div>

<?php require_once "includes/footer.php"; ?>