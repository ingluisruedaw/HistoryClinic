<?php 
  $almGuayacan->__SET('id',$_REQUEST['id']);
  $obj=$modelGuayacan->paciente($almGuayacan);
?>
<form class="basic-form" action="?action=guayacan_insertar" method="post">
  <div class="row margin">
    <div class="input-field col s12 m4">
      <input type="text" name="guayacan_historia_clinica_insertar" value="<?php echo $_REQUEST['id']; ?>" readonly/>
      <label for="guayacan_historia_clinica_insertar">Historia Clinica</label>
    </div>

    <div class="input-field col s12 m4">
      <input type="text" name="paciente" value="<?php echo $obj->__GET('nombres').' '.$obj->__GET('apellidos'); ?>" readonly/>
      <label for="paciente">Paciente</label>
    </div>

    <div class="input-field col s12 m4">
      <input type="text" name="eps" value="<?php echo $obj->__GET('eps'); ?>" readonly/>
      <label for="eps">Eps</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <textarea id="motivo" name="motivo" class="materialize-textarea"></textarea>
      <label for="motivo">Motivo De Consulta</label>
    </div>

    <div class="input-field col s12 m6">
      <textarea id="enfermedad" name="enfermedad" class="materialize-textarea"></textarea>
      <label for="enfermedad">Enfermedad Actual</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <textarea id="antecedentes" name="antecedentes" class="materialize-textarea"></textarea>
      <label for="antecedentes">Antecedentes</label>
    </div>

    <div class="input-field col s12 m6">
      <textarea id="revision" name="revision" class="materialize-textarea"></textarea>
      <label for="revision">Revision Por Sistemas</label>
    </div>
  </div>

  <div class="row margin">
    <div class="input-field col s12 m6">
      <textarea id="examen" name="examen" class="materialize-textarea"></textarea>
      <label for="examen">Examen Fisico</label>
    </div>

    <div class="input-field col s12 m6">
      <textarea id="impresion" name="impresion" class="materialize-textarea"></textarea>
      <label for="impresion">Impresion Diagnostica</label>
    </div>
  </div>


  <div class="row margin">
    <div class="input-field col s12 m6">
      <textarea id="tratamiento" name="tratamiento" class="materialize-textarea"></textarea>
      <label for="tratamiento">Tratamiento</label>
    </div>

    <div class="input-field col s12 m6">
      <textarea id="evolucion" name="evolucion" class="materialize-textarea"></textarea>
      <label for="evolucion">Evolucion</label>
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