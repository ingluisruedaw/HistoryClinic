<script src="estilos/jquery.min.js" type="text/javascript"></script>
<table id="data-table-simple" class="responsive-table display" cellspacing="0">
              <thead>
                <tr>
                  <th>Id Registro</th>
                  <th>Motivo De Consulta</th>
                  <th>Fecha</th>
                  <th>Actualizar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id Registro</th>
                  <th>Motivo De Consulta</th>
                  <th>Fecha</th>
                  <th>Actualizar</th>
                  <th>Eliminar</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach($modelEvolucion->Listar($_REQUEST['id']) as $r): ?>
                  <tr>
                    <td><?php echo $r->__GET('id'); ?></td>
                    <td><?php echo $r->__GET('det'); ?></td>
                    <td><?php echo $r->__GET('fecha'); ?></td>
                    <td class="btn_actualizar">
                      <a type="button" class="btn-floating btn-small waves-effect waves-light blue"><i class="mdi-editor-mode-edit"></i></a>
                    </td>
                    <td class="btn_eliminar">
                      <a type="button" class="btn-floating btn-small waves-effect waves-light red"><i class="mdi-action-delete"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

            <form id="form_editar" name="form_editar" action="?action=evolucion_actualizar" method="post">
              <input id="id" name="id" type="hidden" />
              <input id="det" name="det" type="hidden" />
              <input id="nombres_cliente" name="nombres_cliente" type="hidden" value="<?php echo $_REQUEST['nombres_cliente'] ?>"/>
            </form>

            <form id="tuformulario" name="tuformulario" action="?action=evolucion_eliminar" method="post">
              <input id="accion_eliminar_evolucion" name="accion_eliminar_evolucion" type="hidden" />
            </form>

            <script>
              $(document).ready(function(){
                  $(".btn_eliminar").click(function(){
           
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

                      alertify.confirm('Mensaje De Alerta', 'La Información Que Elimines De La Base De Datos Será Imposible Recuperarla, Teniendo Esto Presente, ¿Estás Seguro?', 
                      function(){
                        document.getElementById("accion_eliminar_evolucion").value=seleccionada;
                        document.forms["tuformulario"].submit()
                      }, 
                      function(){ 
                        alertify.error('ELIMINADO CANCELADO')
                      });
                  });
              });
              </script>

              <script>
              $(document).ready(function(){
                  $(".btn_actualizar").click(function(){

                      var id="";
                      var det="";
                      var i=0;
           
                      // Obtenemos todos los valores contenidos en los <td> de la fila
                      // seleccionada
                      $(this).parents("tr").find("td").each(function(){
                          i=i+1;
                          if (i===1) {id=$(this).html();}
                          if (i===2) {det=$(this).html();}
                      });

                      document.getElementById("id").value=id;
                      document.getElementById("det").value=det;
                      document.forms["form_editar"].submit()
                  });
              });
              </script>