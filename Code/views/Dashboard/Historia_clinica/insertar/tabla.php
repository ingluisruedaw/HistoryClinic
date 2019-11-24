<script src="estilos/jquery.min.js" type="text/javascript"></script>
<table id="data-table-simple" class="responsive-table display" cellspacing="0">
              <thead>
                <tr>
                  <th>Cod</th>
                  <th>Id</th>
                  <th>Nombres</th>
                  <th>Sexo</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Pais</th>
                  <th>Nombres</th>
                  <th>Sexo</th>
                  <th>Acción</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach($modelCliente->Listar() as $r): ?>
                  <tr>
                    <td><?php echo $r->__GET('codigo'); ?></td>
                    <td><?php echo $r->__GET('id'); ?></td>
                    <td><?php echo $r->__GET('nombres').' '.$r->__GET('apellidos'); ?></td>
                    <td>
                      <?php
                        if ($r->__GET('sexo')==1) {
                           echo "MASCULINO";
                        }else{
                          echo "FEMENINO";
                        } 
                      ?>
                    </td>

                    <td class="boton">
                      <a type="button" class="btn-floating btn-small waves-effect waves-light green"><i class="mdi-content-add"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

             <form id="tuformulario" name="tuformulario" action="?action=formulario_historia_clinica_insertar" method="post">
              <input id="historia_clinica_insertar_Cliente" name="historia_clinica_insertar_Cliente" type="hidden" />
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

                      document.getElementById("historia_clinica_insertar_Cliente").value=seleccionada;
                      document.forms["tuformulario"].submit()
           
                      //alert(seleccionada);
                  });
              });
              </script>