<form class="basic-form" action="?action=formulario_residencia_insertar" method="post">
  <div class="row margin">
    <div class="input-field col s12 m12">
      <input type="text" name="cliente_codigo" maxlength="20" length="20" required/>
      <label for="cliente_codigo">Codigo Del Cliente</label>
    </div>

  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="ciudad" maxlength="100" length="100" required/>
        <label for="ciudad">Ciudad</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="text" name="telefono" maxlength="45" length="45" required/>
        <label for="telefono">Telefono</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="direccion" maxlength="100" length="100" required/>
      <label for="direccion">Direccion</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="text" name="barrio" maxlength="100" length="100" required/>
      <label for="barrio">Barrio</label>
    </div>
  </div>
  <br><br>
  <div class="row margin">
    <div class="input-field col s6">
      <button type="reset" class="waves-effect waves-light btn col s12 blue" style="height: 80px;">Limpiar</button>
    </div>

    <div class="input-field col s6">
      <button type="submit" class="waves-effect waves-light btn col s12 green" style="height: 80px;">Guardar</button>
    </div>
  </div>

  <br>
</form>