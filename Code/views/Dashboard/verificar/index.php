<?php 
  if (!isset($_SESSION)) session_start();

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  }else {
    header('Location: ?action=login');
    exit;
  }

    $now = time();

    if($now > $_SESSION['expire']) {
        session_destroy();
        echo"<script type=\"text/javascript\">alert('Su sesion a terminado'); window.location='?action=login';</script>";
        exit;
    }
?>