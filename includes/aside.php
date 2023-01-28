<!-- BARRA LATERAL -->
<aside id="sidebar">

    <div id="buscador" class="bloque">
        <h3>Buscador</h3>

        <form action="buscar.php" method="POST">
            <input type="text" name="busqueda" />
            <input type="submit" value="Buscar">
        </form>
    </div>
    
    <?php if (isset($_SESSION['usuario'])) : ?>
        <div id="usuario-logueado" class='bloque'>
            <h3>Bienvenido, <?= $_SESSION['usuario']['nombre'] . " " . $_SESSION['usuario']['apellido'] ?></h3>
            <!-- Botones -->
            <a href="entrada.php" class="boton boton-verde">Crear entradas</a>
            <a href="categoria.php" class="boton">Crear categorias</a>
            <a href="usuario.php" class="boton boton-naranja">Mis datos</a>
            <a href="cerrar.php" class="boton boton-rojo">Cerrar Session</a>
        </div>
    <?php endif; ?>

    <?php if (!isset($_SESSION['usuario'])) : ?>
        <div id="login" class="bloque">

            <?php if (isset($_SESSION['error-login'])) : ?>
                <div class='alerta alerta-error'>
                    <?= $_SESSION['error-login'] ?>
                </div>
            <?php endif; ?>

            <h3>Identificate</h3>
            <form action="login.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" />
                <!-- contraseña -->
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" />

                <input type="submit" value="Entrar">
            </form>
        </div>

        <!-- Registro -->
        <div id="registro" class="bloque">
            <h3>Registrate</h3>

            <!-- Mostrar Errores -->
            <?php if (isset($_SESSION['completado'])) : ?>
                <div class='alerta alerta-exito'><?= $_SESSION['completado']; ?></div>
            <?php elseif (isset($_SESSION['errores']['general'])) : ?>
                <div class='alerta alerta-error'><?= $_SESSION['errores']['general'] ?></div>
            <?php endif; ?>

            <form action="registro.php" method="post">
                <!-- Nombre -->
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : " "; ?>

                <!-- Apellido -->
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : " "; ?>
                <!-- email -->
                <label for="email">Email</label>
                <input type="email" name="email" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : " "; ?>
                <!-- contraseña -->
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'pass') : " "; ?>
                <!-- boton registro -->
                <input type="submit" name="submit" value="Registrar">
            </form>
            <?php borrarErrores() ?>
        </div>
    <?php endif; ?>
</aside>