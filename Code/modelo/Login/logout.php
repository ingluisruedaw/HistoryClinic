<?php
	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		session_unset();
		session_destroy();
		header('Location: ?action=login');
	} else {
		header('Location: ?action=login');
		exit;
	}
	$now = time();
	if($now > $_SESSION['expire']) {
		session_destroy();
		echo "Su sesion a terminado";
        header('Location: ?action=login');
		exit;
	}
?>
