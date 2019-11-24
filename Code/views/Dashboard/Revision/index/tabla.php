<script src="estilos/jquery.min.js" type="text/javascript"></script>
<table id="data-table-simple" class="responsive-table display" cellspacing="0">
  <thead>
    <tr>
      <th>Cod. H-Clinica</th>
      <th>Codigo Cliente</th>
      <th>Cedula Cliente</th>
      <th>Nombres Cliente</th>
      <th>Fecha Registro</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Cod. H-Clinica</th>
      <th>Codigo Cliente</th>
      <th>Cedula Cliente</th>
      <th>Nombres Cliente</th>
      <th>Fecha Registro</th>
      <th>Acción</th>
    </tr>
  </tfoot>
  <tbody>
    <?php foreach($modelHistoria_clinica->Listar() as $r): ?>
      <tr>
        <td><?php echo $r->__GET('id'); ?></td>
        <td><?php echo $r->__GET('cliente_codigo'); ?></td>
        <td><?php echo $r->__GET('cliente_cedula'); ?></td>
        <td><?php echo $r->__GET('nombres'); ?></td>
        <td><?php echo $r->__GET('fecha'); ?></td>
        <td class="boton">
          <a type="button" class="btn-floating btn-small waves-effect waves-light green"><i class="mdi-action-swap-horiz"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<form id="tuformulario" name="tuformulario" action="?action=revision" method="post">
              <input id="id" name="id" type="hidden" />
              <input id="nombres_cliente" name="nombres_cliente" type="hidden" />
            </form>

            <script>
              $(document).ready(function(){
                  $(".boton").click(function(){
           
                      var valores="";
                      var seleccionada="";
                      var Nombres="";
                      var i=0;
           
                      // Obtenemos todos los valores contenidos en los <td> de la fila
                      // seleccionada
                      $(this).parents("tr").find("td").each(function(){
                          valores+=$(this).html()+"\n";
                          i=i+1;
                          if (i===1) {seleccionada=$(this).html();}
                          if (i===4) {Nombres=$(this).html();}
                      });

                      document.getElementById("id").value=seleccionada;
                      document.getElementById("nombres_cliente").value=Nombres;
                      document.forms["tuformulario"].submit()
                  });
              });
              </script>