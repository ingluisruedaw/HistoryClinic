<?php  
    require('views/Dashboard/verificar/index.php');
    if($_REQUEST['id']==null){
      header('Location: ?action=historia_clinica_llenar');
  }
?>

<link href="estilos/fondos_rutas.css" type="text/css" rel="stylesheet" media="screen,projection">

<?php 
  require('views/Dashboard/Nav.php');
?>

<div id="main">
  <?php 
    require('views/Dashboard/AsideLateral.php');
  ?>
  <section id="content">
    <?php 
      require('views/Dashboard/Guayacan/insertar/rutas.php');
    ?>
    <br>
    <div align="center">
      <?php require('views/Dashboard/Guayacan/insertar/formulario.php');?>
    </div>
  </section>
</div><!-- END MAIN -->

<br><br><br><br><br><br><br><br><br><br>

<?php 
  require('views/Dashboard/Footer.php');
  require('views/Dashboard/scripts/index.php');
?>












