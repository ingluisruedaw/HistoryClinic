<?php
  $almCliente->__SET('codigo',$_REQUEST['codigo']);
  $obj=$modelCliente->llenar($almCliente);
?>
<form class="basic-form" action="?action=formulario_cliente_actualizar" method="post">
  
<div class="row margin">
      <div class="input-field col s12 m12">
        <input type="text" name="codigo" value="<?php echo $_REQUEST['codigo']; ?>" readonly/>
        <label for="codigo">Codigo</label>
      </div>
    </div>
  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="id" maxlength="45" length="45" value="<?php echo $obj->id; ?>" required/>
        <label for="id">Id</label>
    </div>

    <div class="input-field col s12 m6">
      <select name="tipo_doc">
        <?php 
          if($obj->tipo_doc==1){?>
            <option value="1" selected>CEDULA DE CIUDADANIA</option>
            <option value="2">TARJETA DE IDENTIDAD</option>
            <option value="3">REGISTRO CIVIL</option>
          <?php }elseif ($obj->tipo_doc==2) {?>
            <option value="1">CEDULA DE CIUDADANIA</option>
            <option value="2" selected>TARJETA DE IDENTIDAD</option>
            <option value="3">REGISTRO CIVIL</option>
          <?php }else{?>
            <option value="1">CEDULA DE CIUDADANIA</option>
            <option value="2">TARJETA DE IDENTIDAD</option>
            <option value="3" selected>REGISTRO CIVIL</option>
          <?php }?>
      </select>
      <label>Tipo De Documento</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="eps" maxlength="100" length="100" value="<?php echo $obj->eps; ?>" required/>
        <label for="eps">eps</label>
    </div>

    <div class="input-field col s12 m6">
      <select name="sexo">
        <?php if ($obj->sexo==1) {?>
          <option value="1" selected>MASCULINO</option>
          <option value="2">FEMENINO</option>
        <?php }else{?>
          <option value="1">MASCULINO</option>
          <option value="2" selected>FEMENINO</option>
        <?php } ?>
      </select>
      <label>Sexo</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="nombres" maxlength="100" length="100" value="<?php echo $obj->nombres;?>" required/>
      <label for="nombres">nombres</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="text" name="apellidos" maxlength="100" length="100" value="<?php echo $obj->apellidos; ?>" required/>
      <label for="apellidos">apellidos</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="date" class="datepicker" name="nacimiento" value="<?php echo $obj->nacimiento; ?>" >
      <label for="nacimiento">Fecha De Nacimiento</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="email" name="email" maxlength="45" length="45" value="<?php echo $obj->email; ?>" required/>
        <label for="email">email</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="ocupacion" maxlength="100" length="100" value="<?php echo $obj->ocupacion; ?>" required/>
        <label for="ocupacion">ocupacion</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="text" name="escolaridad" maxlength="100" length="100" value="<?php echo $obj->escolaridad; ?>" required/>
        <label for="escolaridad">escolaridad</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="acompanante" maxlength="100" length="100" value="<?php echo $obj->acompanante; ?>" required/>
        <label for="acompanante">acompanante</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="text" name="parentezco" maxlength="100" length="100" value="<?php echo $obj->parentezco; ?>" required/>
        <label for="parentezco">parentezco</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m12">
        <select name="estado_civil">
          <?php if($obj->estado_civil==1){?>
            <option value="1" selected>SOLTERO</option>
            <option value="2">CASADO</option>
            <option value="3">VIUDO</option>
            <option value="4">DIVORCIADO</option>
          <?php }elseif ($obj->estado_civil==2) {?>
            <option value="1">SOLTERO</option>
            <option value="2" selected>CASADO</option>
            <option value="3">VIUDO</option>
            <option value="4">DIVORCIADO</option>
          <?php }elseif($obj->estado_civil==3){?>
            <option value="1">SOLTERO</option>
            <option value="2">CASADO</option>
            <option value="3" selected>VIUDO</option>
            <option value="4">DIVORCIADO</option>
          <?php }else{?>
            <option value="1">SOLTERO</option>
            <option value="2">CASADO</option>
            <option value="3">VIUDO</option>
            <option value="4" selected>DIVORCIADO</option>
          <?php }?>
        </select>
        <label>Estado Civil</label>
    </div>
  </div>

  <div class="row margin">

    <div class="input-field col s12">
      <button type="submit" class="waves-effect waves-light btn col s12 cyan">Actualizar</button>
    </div>
  </div>

  <br>
</form>