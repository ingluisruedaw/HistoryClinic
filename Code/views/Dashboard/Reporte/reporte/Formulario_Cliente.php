<?php 
  $almHistoria_clinica->__SET('id',$_REQUEST['id']);
  $obj=$modelHistoria_clinica->Buscar_Cliente($almHistoria_clinica);
?>
<form >
  <h1 align="center" style="text-decoration: underline;word-spacing: 4pt;line-height: 2;">Datos Del Paciente</h1>
  <div class="row margin">
    <div class="input-field col s12 m3">
      <input type="text" name="historia_clinica" value="<?php echo $_REQUEST['id']; ?>" readonly/>
      <label for="historia_clinica">Historia Clinica</label>
    </div>

    <div class="input-field col s12 m3">
      <input type="text" name="cliente_codigo" value="<?php echo $obj->__GET('cliente_codigo');?>" readonly/>
      <label for="cliente_codigo">Codigo Del Paciente</label>
    </div>

    <div class="input-field col s12 m3">
      <input type="text" name="cliente_tipo_doc" value="<?php if($obj->cliente_tipo_doc==1){echo "CEDULA DE CIUDADANIA";}elseif ($obj->tipo_doc==2) {echo "TARJETA DE IDENTIDAD";}else{ echo "REGISTRO CIVIL";} ?>" readonly/>
      <label for="cliente_tipo_doc">Tipo De Documento Del Paciente</label>
    </div>

    <div class="input-field col s12 m3">
      <input type="text" name="cliente_cedula" value="<?php echo $obj->__GET('cliente_cedula');?>" readonly/>
      <label for="cliente_cedula"># Identificación Del Paciente</label>
    </div>

  </div>

  <div class="row margin">
    <div class="input-field col s12 m3">
      <input type="text" name="nombres" value="<?php echo $obj->__GET('nombres');?>" readonly/>
      <label for="nombres">Nombres Del Paciente</label>
    </div>

    <div class="input-field col s12 m3">
      <input type="text" name="cliente_sexo" value="<?php if($obj->__GET('cliente_sexo')==1){echo "MASCULINO";}else{echo "FEMENINO";}?>" readonly/>
      <label for="cliente_sexo">Sexo Del Pertenece</label>
    </div>

    <div class="input-field col s12 m3">
      <input type="text" name="cliente_eps" value="<?php echo $obj->__GET('cliente_eps');?>" readonly/>
      <label for="cliente_eps">Eps A La Que Pertenece</label>
    </div>

    <div class="input-field col s12 m3">
      <input type="text" name="cliente_nacimiento" value="<?php echo $obj->__GET('cliente_nacimiento');?>" readonly/>
      <label for="cliente_nacimiento">Fecha De Nacimiento</label>
    </div>

  </div>

  <div class="row margin">
    <div class="input-field col s12 m3">
      <input type="text" name="cliente_email" value="<?php echo $obj->__GET('cliente_email');?>" readonly/>
      <label for="cliente_email">Email Del Paciente</label>
    </div>

    <div class="input-field col s12 m3">
      <input type="text" name="cliente_ocupacion" value="<?php echo $obj->__GET('cliente_ocupacion');?>" readonly/>
      <label for="cliente_ocupacion">Ocupación Del Paciente</label>
    </div>

    <div class="input-field col s12 m3">
      <input type="text" name="cliente_acompanante" value="<?php echo $obj->__GET('cliente_acompanante');?>" readonly/>
      <label for="cliente_acompanante">Acompañante Del Paciente</label>
    </div>

    <div class="input-field col s12 m3">
      <input type="text" name="cliente_parentezco" value="<?php echo $obj->__GET('cliente_parentezco');?>" readonly/>
      <label for="cliente_parentezco">Parentesco Del Paciente</label>
    </div>

  </div>

  <br>
</form>

