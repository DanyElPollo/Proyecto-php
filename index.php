<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Blog de videojuegos </title>
    <!-- AQUI AGREGAMOS LA HOJA DE ESTILO -->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body>
    <!-- CABECERA -->
    <header id="cabecera">
        <!-- LOGO -->
        <div id="logo">
            <a href="index.php">
                Blog de videojuegos
            </a>
        </div>
        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php">Categoria 1</a></li>
                <li><a href="index.php">Categoria 2</a></li>
                <li><a href="index.php">Categoria 3</a></li>
                <li><a href="index.php">Categoria 4</a></li>
                <li><a href="index.php">Sobre mi</a></li>
            </ul>
        </nav>
    </header>

    <div id="contenedor">
        <!-- BARRA LATERAL -->
        <aside id="sidebar">
            <div id="login" class="bloque">
                <h3>Identificate</h3>
                <form action="login.php" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email" />
                    <!-- contraseña -->
                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" />

                    <input type="submit" value="Entrar">
                </form>
                <div id="registro" class="bloque">
                    <h3>Registrate</h3>
                    <form action="registro.php" method="post">
                        <!-- Nombre -->
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" />
                        <!-- Apellido -->
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" />
                        <!-- email -->
                        <label for="email">Email</label>
                        <input type="email" name="email" />
                        <!-- contraseña -->
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass" />
                        <!-- boton registro -->
                        <input type="submit" value="Registrar">
                    </form>
                </div>
        </aside>

        <!-- CAJA PRINCIPAL -->
        <div id="principal">
            <h1>Ultimas entradas</h1>
            <article class="entrada">
                <h2>Titulo de entrada</h2>
                <p>Suspendisse sed pulvinar enim, eget accumsan urna.
                    Fusce vestibulum velit in nunc imperdiet, eu dignissim sem sodales. Donec dapibus diam condimentum nisl scelerisque pellentesque. Suspendisse scelerisque nisi ut elit porttitor luctus. Sed eu euismod mauris, ut molestie augue. Cras volutpat faucibus viverra. Donec pulvinar eu est eget fringilla. Aenean at tellus condimentum, convallis augue at, rutrum sapien. Vestibulum dignissim rutrum vulputate.
                    Quisque vel dolor sapien. Nam ut lectus metus.</p>
            </article>
            <article class="entrada">
                <h2>Titulo de entrada</h2>
                <p>Suspendisse sed pulvinar enim, eget accumsan urna.
                    Fusce vestibulum velit in nunc imperdiet, eu dignissim sem sodales. Donec dapibus diam condimentum nisl scelerisque pellentesque. Suspendisse scelerisque nisi ut elit porttitor luctus. Sed eu euismod mauris, ut molestie augue. Cras volutpat faucibus viverra. Donec pulvinar eu est eget fringilla. Aenean at tellus condimentum, convallis augue at, rutrum sapien. Vestibulum dignissim rutrum vulputate.
                    Quisque vel dolor sapien. Nam ut lectus metus.</p>
            </article>
            <article class="entrada">
                <h2>Titulo de entrada</h2>
                <p>Suspendisse sed pulvinar enim, eget accumsan urna.
                    Fusce vestibulum velit in nunc imperdiet, eu dignissim sem sodales. Donec dapibus diam condimentum nisl scelerisque pellentesque. Suspendisse scelerisque nisi ut elit porttitor luctus. Sed eu euismod mauris, ut molestie augue. Cras volutpat faucibus viverra. Donec pulvinar eu est eget fringilla. Aenean at tellus condimentum, convallis augue at, rutrum sapien. Vestibulum dignissim rutrum vulputate.
                    Quisque vel dolor sapien. Nam ut lectus metus.</p>
            </article>
            <article class="entrada">
                <h2>Titulo de entrada</h2>
                <p>Suspendisse sed pulvinar enim, eget accumsan urna.
                    Fusce vestibulum velit in nunc imperdiet, eu dignissim sem sodales. Donec dapibus diam condimentum nisl scelerisque pellentesque. Suspendisse scelerisque nisi ut elit porttitor luctus. Sed eu euismod mauris, ut molestie augue. Cras volutpat faucibus viverra. Donec pulvinar eu est eget fringilla. Aenean at tellus condimentum, convallis augue at, rutrum sapien. Vestibulum dignissim rutrum vulputate.
                    Quisque vel dolor sapien. Nam ut lectus metus.</p>
            </article>
        </div>
    </div>


    <!-- PIE DE PAGINA -->
    <footer id="pie">
        <p>Desarrollado por Daniel Arenas &copy; 2018</p>
    </footer>


</body>

</html>