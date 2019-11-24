<form class="basic-form" action="?action=formulario_cliente_insertar" method="post">
  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="cliente_id_insertar" maxlength="45" length="45" required/>
        <label for="cliente_id_insertar">Id</label>
    </div>

    <div class="input-field col s12 m6">
      <select name="tipo_doc">
        <option value="1">CEDULA DE CIUDADANIA</option>
        <option value="2">TARJETA DE IDENTIDAD</option>
        <option value="3">REGISTRO CIVIL</option>
      </select>
      <label>Tipo De Documento</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="eps" maxlength="100" length="100" required/>
        <label for="eps">eps</label>
    </div>

    <div class="input-field col s12 m6">
      <select name="sexo">
        <option value="1">MASCULINO</option>
        <option value="2">FEMENINO</option>
      </select>
      <label>Sexo</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="nombres" maxlength="100" length="100" required/>
      <label for="nombres">nombres</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="text" name="apellidos" maxlength="100" length="100" required/>
      <label for="apellidos">apellidos</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="date" class="datepicker" name="nacimiento">
      <label for="nacimiento">Fecha De Nacimiento</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="email" name="email" maxlength="45" length="45" required/>
        <label for="email">email</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="ocupacion" maxlength="100" length="100" required/>
        <label for="ocupacion">ocupacion</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="text" name="escolaridad" maxlength="100" length="100" required/>
        <label for="escolaridad">escolaridad</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <input type="text" name="acompanante" maxlength="100" length="100" required/>
        <label for="acompanante">acompanante</label>
    </div>

    <div class="input-field col s12 m6">
      <input type="text" name="parentezco" maxlength="100" length="100" required/>
        <label for="parentezco">parentezco</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m12">
        <select name="estado_civil">
          <option value="1">SOLTERO</option>
          <option value="2">CASADO</option>
          <option value="3">VIUDO</option>
          <option value="4">DIVORCIADO</option>
        </select>
        <label>Estado Civil</label>
    </div>
  </div>

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