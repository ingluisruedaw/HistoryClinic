<?php  
    require('views/Dashboard/verificar/index.php');
?>

<link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/dashboard/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/dashboard/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/fondos_rutas.css" type="text/css" rel="stylesheet" media="screen,projection">

<?php 
  include 'views/Dashboard/Nav.php';
?>

<div id="main">
  <?php 
    include 'views/Dashboard/AsideLateral.php';
  ?>
  <div class="content">
      <?php 
        require('views/Dashboard/Historia_clinica/insertar/rutas.php');
      ?>
      <div class="container">
        <?php require('views/Dashboard/Historia_clinica/insertar/tabla.php');?>
      </div>
  </div>
</div>
<br><br><br><br><br><br><br><br><br><br>

<?php 
  require('views/Dashboard/Footer.php');
  require('views/Dashboard/scripts/tablas.php');
?>