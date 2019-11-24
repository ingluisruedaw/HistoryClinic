<form class="basic-form" action="?action=accion_cambiar_clave" method="post">
  <div class="row margin">
    <div class="input-field col s12 m12">
      <input type="text" name="usuario_id" value="<?php echo $_SESSION['username']; ?>" readonly/>
      <label for="usuario_id">Usuario</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m12">
      <input type="text" name="clave" maxlength="15" length="15" required/>
      <label for="clave">Nueva Clave</label>
    </div>
  </div>
  <br>
  <div class="row margin">
    <div class="input-field col s12">
      <button type="submit" class="waves-effect waves-light btn col s12 green" style="height: 80px">Actualizar</button>
    </div>
  </div>

  <br>
</form>