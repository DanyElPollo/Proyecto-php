<?php require_once "includes/redireccion.php"; ?>
<?php require_once "includes/header.php"; ?>
<?php require_once 'includes/aside.php'; ?>


<div id="principal">
    <h1>Crear Categorias</h1>
    <form action="guardarCategoria.php" method="POST">
        <p>Agrega el nombre de la categoria para realizar nuevas entradas</p>
        <br><hr></br>
        <label for="nombre">Nombre de la categoria</label>
        <input type="text" name="nombre"">

        <input type="submit" value="Guardar">
    </form>
</div>

<?php require_once "includes/footer.php"; ?>