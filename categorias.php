<?php require_once "includes/header.php"; ?>

<?php require_once 'includes/aside.php'; ?>
<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Todas las entradas</h1>
    <?php
    $categoria = listarCategorias($db);

    while ($categorias = mysqli_fetch_assoc($categoria)) {
        if ($_GET['id'] == $categorias['id']) {
            $entradas = listarEntradas($db, $_GET['id']);
        }
    }

    if (!empty($entradas)) :
        while ($entrada = mysqli_fetch_assoc($entradas)) :
    ?>

            <article class="entrada">
                <a href="detalles.php?id=<?= $entrada['id'] ?>">
                    <h2><?= $entrada['titulo']; ?></h2>
                    <span class="fecha"><?= $entrada['categoria'] . " | " . $entrada['fecha']; ?></span>
                    <p>
                        <?= substr($entrada['descrip'], 0, 180) . "..." ?>
                    </p>
                </a>
            </article>

        <?php
        endwhile;
    elseif (empty($entradas)) :  ?>
        <!-- header('Location:index.php'); -->
        <br>
        <h3 class="alerta">Aun no hay entradas de esta categoria</h3>
    <?php
    endif;
    ?>

</div>



<?php require_once "includes/footer.php"; ?>