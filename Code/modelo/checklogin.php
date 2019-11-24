<?php
if (!isset($_SESSION)) session_start();
require_once ('conexion.php');
$conexion = new conexion();
$username = $_POST['usuario'];
$password = $_POST['clave']; 
$result = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ? ");
$result->execute(array($username));
$r = $result->fetch(PDO::FETCH_OBJ);

if (empty($r)) {
    die("<script type=\"text/javascript\">alertify.alert('ERROR', 'Usuario O Clave Errados', function(){ window.location='?action=cliente'; });</script>");
}else{
    if (password_verify($password, $r->clave)) { 
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60)*90;
        header('Location: ?action=webmaster');
    } else { 
        die("<script type=\"text/javascript\">alertify.alert('ERROR', 'Usuario O Clave Errados', function(){ window.location='?action=cliente'; });</script>");
    }
}
 ?>