<?php  
    require('views/Dashboard/verificar/index.php');
?>

<link href="estilos/fondos_rutas.css" type="text/css" rel="stylesheet" media="screen,projection">

<?php 
    require('views/Dashboard/Nav.php');
?>

<div id="main">
    <div class="wrapper">
        <?php 
            require('views/Dashboard/AsideLateral.php');
            require('views/Dashboard/index/content/index.php');
        ?>
    </div>
</div>

<?php 
    require('views/Dashboard/Footer.php');
    require('views/Dashboard/scripts/index.php');
?>