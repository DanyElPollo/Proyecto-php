<?php require_once "includes/redireccion.php"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once 'includes/aside.php'; ?>
<?php require_once 'includes/conexion.php'; ?>

<?php

$entrada = detallesEntrada($db, $_GET['id']);
if (!empty($entrada)) :
    // var_dump($entrada);
    // die();
?>

<div id="principal">
    <h1>EditarEntradas</h1>
    <form action="guardarEntrada.php?editar=<?=$entrada['id']?>" method="POST">
        <p>Editando la entreda "<?= $entrada['titulo']?>"</p>
        <br>

        <!-- Se valida los erroes y enviamos alertas segun el tipo -->
        <?php if (isset($_SESSION['completado'])) : ?>
            <div class='alerta alerta-exito'><?= $_SESSION['completado']; ?></div>
        <?php endif; ?>

        <hr></br>
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?= $entrada['titulo']; ?>"></input>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : " " ?>

        <label for=" desc">Descripcion:</label>
        <textarea name="desc" cols="50" rows="15"><?= $entrada['descrip']; ?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'desc') : " " ?>

        <label for="categoria">Categoria:</label>
        <select name="categoria">
            <?php
            $categorias = listarCategorias($db);
            if (!empty($categorias)) :
                while ($categoria = mysqli_fetch_assoc($categorias)) :
            ?>
                    <option value="<?= $categoria['id']; ?>"
                    <?= ($categoria['id'] == $entrada['categoria_id']) ? 'selected="selected"':' '?>>
                        <?= $categoria['nombre']; ?>
                    </option>
            <?php
                endwhile;
            endif;
            ?>
        </select>

        <input type="submit" value="Actualizar">
    </form>
    <?php borrarErrores(); ?>
</div>
<?php endif;?>

<?php require_once "includes/footer.php"; ?>