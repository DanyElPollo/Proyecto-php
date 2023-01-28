<?php
if (isset($_POST)) {

    require_once 'includes/conexion.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    $nombre = isset($_POST["nombre"]) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellido = isset($_POST["apellido"]) ? mysqli_real_escape_string($db, $_POST['apellido'])  : false;
    $email = isset($_POST['email']) ?  mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $pass = isset($_POST["pass"]) ?  mysqli_real_escape_string($db, $_POST['pass']) : false;

    /*===== Array para el manejo de errores =====*/
    $errores = array();

    /*===== Validar los datos antes de guardalos en la BD =====*/
    //NOMBRE
    if (!empty($nombre)  && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validate = true;
    } else {
        $nombre_validate = false;
    $errores["nombre"] = "El nombre no es valido";
    }

    // APELLIDO
    if (!empty($apellido)  && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {
        $apellido_validate = true;
    } else {
        $apellido_validate = false;
        $errores["apellido"] = "El apellido no es valido";
    }

    // EMAIL
    if (!empty($email)  && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validate = true;
    } else {
        $email_validate = false;
        $errores["email"] = "El email no es valido";
    }

    // PASS
    if (!empty($pass)) {
        $pass_validate = true;
    } else {
        $pass_validate = false;
        $errores["pass"] = "La password esta vacia";
    }

    $guardar_usuario = false;

    if (count($errores) == 0) {
        $guardar_usuario = true;
        /*===== Cifrar contraseñas =====*/
        $pass_encri = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);

        /*===== INSERTAR USUARIO EN LA BASE DE DATOS =====*/

        $sql = "INSERT INTO usuarios VALUES(null, '$nombre','$apellido','$email','$pass_encri')";
        $consulta = mysqli_query($db, $sql);


        if ($consulta) {
            $_SESSION['completado'] = "El registro fue un exito";
        } else {
            $_SESSION['errores']['general'] = "Fallo en el registro";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
}
header('Location: index.php');
