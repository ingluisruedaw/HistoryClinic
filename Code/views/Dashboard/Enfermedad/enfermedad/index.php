<?php  
    require('views/Dashboard/verificar/index.php');
    if($_REQUEST['id']==null){
      header('Location: ?action=enfermedad_index');
  }
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
    <div>
      <?php 
        require('views/Dashboard/Enfermedad/enfermedad/rutas.php');
      ?>
      <div class="container">
        <?php require('views/Dashboard/Enfermedad/enfermedad/tabla.php');?>
      </div>
    </div>
  </div>
</div>
<br><br><br><br><br><br><br><br><br><br>

<?php 
  require('views/Dashboard/Footer.php');
  require('views/Dashboard/scripts/tablas.php');
?>
