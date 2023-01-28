<?php
/*===== Iniciar la sesión y la conexion a la base de datos =====*/
require_once "includes/conexion.php";


if (isset($_POST)) {

    /*===== Borrar error antiguo =====*/
    if (isset($_SESSION['error-login'])) {
        unset($_SESSION['error-login']);
    }

    /*===== recoger los datos del formulario =====*/
    $email = trim($_POST['email']);
    $pass = $_POST['pass'];

    /*===== consulta para comprobar la contraseña =====*/
    $sql = "SELECT * FROM usuarios WHERE email like '$email';";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {

        $user = mysqli_fetch_assoc($login);
        $verify = password_verify($pass, $user['password']);

        if ($verify) {
            /*===== usar una sesion para guardar los datos recuperados =====*/
            $_SESSION['usuario'] = $user;
        } else {
            /*===== si algo falla usar una sesion para los errores =====*/
            $_SESSION['error-login'] = "Login incorrecto!";
        }
    } else {
        $_SESSION['error-login'] = "Login incorrecto!!";
    }
}
/*===== Redirigir al index.php =====*/
header('Location: index.php');
