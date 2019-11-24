<!--<script src="estilos/alertifyjs/alertify.min.js"></script>
<link  rel="stylesheet" href="estilos/alertifyjs/css/alertify.css" />
<link  rel="stylesheet" href="estilos/alertifyjs/css/themes/default.css" />
<link  rel="stylesheet" href="estilos/alertifyjs/css/themes/semantic.min.css" />-->



<script src="estilos/jquery.min.js" type="text/javascript"></script>
<table id="data-table-simple" class="responsive-table display" >
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Cod. Cliente</th>
                  <th>Cliente</th>
                  <th>Ciudad</th>
                  <th>Direccion</th>
                  <th>Barrio</th>
                  <th>Telefono</th>
                  <th>Actualizar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Cod. Cliente</th>
                  <th>Cliente</th>
                  <th>Ciudad</th>
                  <th>Direccion</th>
                  <th>Barrio</th>
                  <th>Telefono</th>
                  <th>Actualizar</th>
                  <th>Eliminar</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach($modelResidencia->Listar() as $r): ?>
                  <tr>
                    <td><?php echo $r->__GET('id'); ?></td>
                    <td><?php echo $r->__GET('cliente_codigo'); ?></td>
                    <td><?php echo $r->__GET('cliente');?></td>
                    <td><?php echo $r->__GET('ciudad'); ?></td>
                    <td><?php echo $r->__GET('direccion'); ?></td>
                    <td><?php echo $r->__GET('barrio'); ?></td>
                    <td><?php echo $r->__GET('telefono'); ?></td>
                    <td class="btn_actualizar">
                      <a type="button" class="btn-floating btn-small waves-effect waves-light blue"><i class="mdi-editor-mode-edit"></i></a>
                    </td>
                    <td class="boton">
                      <a type="button" class="btn-floating btn-small waves-effect waves-light red"><i class="mdi-action-delete"></i></a>
                    </td>
                    <
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

            <form id="form_editar" name="form_editar" action="?action=residencia_actualizar" method="post">
              <input id="id" name="id" type="hidden" />
            </form>

            <form id="tuformulario" name="tuformulario" action="?action=residencia_eliminar" method="post">
              <input id="residencia_id_eliminar" name="residencia_id_eliminar" type="hidden" />
            </form>

            <script>
              $(document).ready(function(){
                  $(".boton").click(function(){
           
                      var seleccionada="";
                      var i=0;
           
                      // Obtenemos todos los valores contenidos en los <td> de la fila
                      // seleccionada
                      $(this).parents("tr").find("td").each(function(){
                          i=i+1;
                          if (i===1) {seleccionada=$(this).html();}
                      });

                      alertify.confirm('Mensaje De Alerta', 'La Información Que Elimines De La Base De Datos Será Imposible Recuperarla, Teniendo Esto Presente, ¿Estás Seguro?', 
                      function(){
                        document.getElementById("residencia_id_eliminar").value=seleccionada;
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
                  $(".btn_actualizar").click(function(){

                      var seleccionada="";
                      var i=0;
           
                      // Obtenemos todos los valores contenidos en los <td> de la fila
                      // seleccionada
                      $(this).parents("tr").find("td").each(function(){
                          i=i+1;
                          if (i===1) {seleccionada=$(this).html();}
                      });

                      document.getElementById("id").value=seleccionada;
                      document.forms["form_editar"].submit()
                  });
              });
              </script>
