<?php  
    require('views/Dashboard/verificar/index.php');
    if($_REQUEST['id']==null){
      header('Location: ?action=reporte_index');
  }
?>
<link rel="stylesheet" href="estilos/pure-min.css">
<link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/dashboard/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/dashboard/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/fondos_rutas.css" type="text/css" rel="stylesheet" media="screen,projection">

<?php 
  require('views/Dashboard/Reporte/reporte/rutas.php');
?>
  
  <div class="container">
    <?php require('views/Dashboard/Reporte/reporte/Formulario_Cliente.php');?>
  </div>

  <div class="container">
    <?php if (!empty($modelMotivo->Listar($_REQUEST['id']))) {
      require('views/Dashboard/Reporte/reporte/Tabla_Motivo.php');
    }?>
  </div>

  <div class="container">
    <?php 
      if (!empty($modelEnfermedad->Listar($_REQUEST['id']))) {
        require('views/Dashboard/Reporte/reporte/Tabla_Enfermedad.php');
      }?>
  </div>

  <div class="container">
    <?php 
      if (!empty($modelAntecedentes->Listar($_REQUEST['id']))) {
        require('views/Dashboard/Reporte/reporte/Tabla_Antecedentes.php');
      }
    ?>
  </div>

  <div class="container">
    <?php 
      if (!empty($modelRevision->Listar($_REQUEST['id']))) {
        require('views/Dashboard/Reporte/reporte/Tabla_Revision.php');
      }?>
  </div>

  <div class="container">
    <?php 
    if (!empty($modelExamen->Listar($_REQUEST['id']))) {
      require('views/Dashboard/Reporte/reporte/Tabla_Examen.php');
    }?>
  </div>

  <div class="container">
    <?php 
    if (!empty($modelImpresion->Listar($_REQUEST['id']))) {
      require('views/Dashboard/Reporte/reporte/Tabla_Impresion.php');
    }?>
  </div>

  <div class="container">
    <?php 
    if (!empty($modelTratamiento->Listar($_REQUEST['id']))) {
      require('views/Dashboard/Reporte/reporte/Tabla_Tratamiento.php');
    }?>
  </div>

  <div class="container">
    <?php 
      if (!empty($modelEvolucion->Listar($_REQUEST['id']))) {
        require('views/Dashboard/Reporte/reporte/Tabla_Evolucion.php');
      }
    ?>
  </div>

<br><br><br><br><br><br><br><br><br><br>

<?php 
  require('views/Dashboard/Footer.php');
  require('views/Dashboard/scripts/index.php');
?>
