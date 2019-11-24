<form class="basic-form" action="?action=formulario_examen_actualizar" method="post">
  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="enfermedad_id" value="<?php echo $_REQUEST['id']; ?>" readonly/>
      <label for="enfermedad_id">Id Registro</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="text" name="nombres" value="<?php echo $_REQUEST['nombres_cliente']; ?>" readonly/>
      <label for="nombres">Id Registro</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m12">
      <textarea id="enfermedad_det" name="enfermedad_det" class="materialize-textarea"><?php echo $_REQUEST['det']; ?></textarea>
      <label for="enfermedad_det">Detalle Del Registro</label>
    </div>
  </div>
  
  <div class="row margin">
    <div class="input-field col s12">
      <button type="submit" class="waves-effect waves-light btn col s12 green" style="height: 80px">Actualizar</button>
    </div>
  </div>

  <br>
</form>