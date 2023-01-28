<?php
if (isset($_POST)) {

    require_once 'includes/conexion.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    $usuario_id = $_SESSION['usuario']['id'];
    $nombre = isset($_POST["nombre"]) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellido = isset($_POST["apellido"]) ? mysqli_real_escape_string($db, $_POST['apellido'])  : false;
    $email = isset($_POST['email']) ?  mysqli_real_escape_string($db, trim($_POST['email'])) : false;

    /*===== Array para el manejo de errores =====*/
    $errores = array();

    /*===== Validar los datos antes de guardalos en la BD =====*/
    //NOMBRE
    if (!empty($nombre)  && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validate = true;
    } else {
        $nombre_validate = false;
        $errores["nombre"] = "El nombre esta vacio o no es valido";
    }

    // APELLIDO
    if (!empty($apellido)  && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {
        $apellido_validate = true;
    } else {
        $apellido_validate = false;
        $errores["apellido"] = "El apellido esta vacio o no es valido";
    }

    // EMAIL
    if (!empty($email)  && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validate = true;
    } else {
        $email_validate = false;
        $errores["email"] = "El email esta vacio o no es valido";
    }

    $guardar_usuario = false;

    if (count($errores) == 0) {
        $guardar_usuario = true;

        /*===== VERIFICAR EL EMAIL EN LA BASE DE DATOS =====*/
        $sql = "SELECT id, email FROM usuarios WHERE email = '$email'; ";
        // $isset_email = mysqli_query($db, $sql);
        // $query = mysqli_fetch_assoc($isset_email);
        $query = mysqli_fetch_assoc(mysqli_query($db, $sql));
    
        /*===== ACTUALIZAR USUARIO EN LA BASE DE DATOS =====*/
        if ($query['id'] == $usuario_id || empty($query)) {
            $sql = "UPDATE usuarios u SET u.nombre = '$nombre', u.apellido = '$apellido', u.email = '$email' " .
                "WHERE id = $usuario_id";
            $consulta = mysqli_query($db, $sql);

            if ($consulta) {
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellido'] = $apellido;
                $_SESSION['usuario']['email'] = $email;
                $_SESSION['completado'] = "Tus datos fueron actualizado con exito";
            } else {
                $_SESSION['errores']['general'] = "Fallo al actualizar tus datos";
            }
        } else {
            $_SESSION['errores']['general'] = "El usuario ya exito";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
}
header('Location: usuario.php');
