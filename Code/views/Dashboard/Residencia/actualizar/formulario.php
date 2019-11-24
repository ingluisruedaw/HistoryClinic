<?php
  $almResidencia->__SET('id',$_REQUEST['id']);
  $obj=$modelResidencia->llenar($almResidencia);
?>
<form class="basic-form" action="?action=formulario_residencia_actualizar" method="post">
  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="residencia_id_actualizar" value="<?php echo $_REQUEST['id']; ?>" readonly/>
      <label for="residencia_id_actualizar">Id Registro</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="text" name="cliente_codigo" maxlength="20" length="20" value="<?php echo $obj->cliente_codigo; ?>" readonly/>
      <label for="cliente_codigo">Codigo Del Cliente</label>
    </div>

  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="ciudad" maxlength="100" length="100" value="<?php echo $obj->ciudad; ?>" required/>
        <label for="ciudad">Ciudad</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="text" name="telefono" maxlength="45" length="45" value="<?php echo $obj->telefono; ?>" required/>
        <label for="telefono">Telefono</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="direccion" maxlength="100" length="100" value="<?php echo $obj->direccion; ?>" required/>
      <label for="direccion">Direccion</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="text" name="barrio" maxlength="100" length="100" value="<?php echo $obj->barrio; ?>" required/>
      <label for="barrio">Barrio</label>
    </div>
  </div>
  <br>
  <div class="row margin">

    <div class="input-field col s12">
      <button type="submit" class="waves-effect waves-light btn col s12 green" style="height: 80px;">Actualizar</button>
    </div>
  </div>

  <br>
</form>