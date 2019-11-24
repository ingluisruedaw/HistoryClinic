<script src="estilos/jquery.min.js" type="text/javascript"></script>
<table id="data-table-simple" class="responsive-table display" cellspacing="0">
              <thead>
                <tr>
                  <th>Cod. H-Clinica</th>
                  <th>Codigo Cliente</th>
                  <th>Cedula Cliente</th>
                  <th>Nombres Cliente</th>
                  <th>Fecha Registro</th>
                  <th>Llenar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Cod. H-Clinica</th>
                  <th>Codigo Cliente</th>
                  <th>Cedula Cliente</th>
                  <th>Nombres Cliente</th>
                  <th>Fecha Registro</th>
                  <th>Llenar</th>
                  <th>Eliminar</th>
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
                    <td class="btn_llenar">
                      <a type="button" class="btn-floating btn-small waves-effect waves-light green"><i class="mdi-content-content-paste"></i></a>
                    </td>
                    <td class="boton">
                      <a type="button" class="btn-floating btn-small waves-effect waves-light red"><i class="mdi-action-delete"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

            <form id="form_llenar" name="form_llenar" action="?action=formulario_Guayacan_insertar" method="post">
              <input id="id" name="id" type="hidden" />
            </form>

            <form id="tuformulario" name="tuformulario" action="?action=historia_clinica_eliminar" method="post">
              <input id="historia_clinica_eliminar_Id" name="historia_clinica_eliminar_Id" type="hidden" />
            </form>
            <script>
              $(document).ready(function(){
                  $(".boton").click(function(){
           
                      var valores="";
                      var seleccionada="";
                      var i=0;
           
                      // Obtenemos todos los valores contenidos en los <td> de la fila
                      // seleccionada
                      $(this).parents("tr").find("td").each(function(){
                          valores+=$(this).html()+"\n";
                          i=i+1;
                          if (i===1) {seleccionada=$(this).html();}
                      });

                      alertify.confirm('Mensaje De Alerta', 'Si La Historia Clínica Está Relacionada Con Otra Información En La Base De Datos, El Eliminado Fallara Para Proteger La Integridad De La Información, Ademas La Información Que Elimines De La Base De Datos Será Imposible Recuperarla, Teniendo Esto Presente, ¿Estás Seguro?', 
                      function(){
                        document.getElementById("historia_clinica_eliminar_Id").value=seleccionada;
                        document.forms["tuformulario"].submit()
                      }, 
                      function(){ 
                        alertify.error('ELIMINADO CANCELADO')
                      });
           
                      //alert(seleccionada);
                  });
              });
              </script>

              <script>
              $(document).ready(function(){
                  $(".btn_llenar").click(function(){
           
                      var valores="";
                      var seleccionada="";
                      var i=0;
           
                      // Obtenemos todos los valores contenidos en los <td> de la fila
                      // seleccionada
                      $(this).parents("tr").find("td").each(function(){
                          valores+=$(this).html()+"\n";
                          i=i+1;
                          if (i===1) {seleccionada=$(this).html();}
                      });

                      document.getElementById("id").value=seleccionada;
                      document.forms["form_llenar"].submit()
           
                      //alert(seleccionada);
                  });
              });
              </script>