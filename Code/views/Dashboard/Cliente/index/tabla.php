<script src="estilos/jquery.min.js" type="text/javascript"></script>
<table id="data-table-simple" class="responsive-table display" cellspacing="0">
              <thead>
                <tr>
                  <th>Cod</th>
                  <th>Id</th>
                  <th>Eps</th>
                  <th>Nombres</th>
                  <th>Sexo</th>
                  <th>Actualizar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Pais</th>
                  <th>Eps</th>
                  <th>Nombres</th>
                  <th>Sexo</th>
                  <th>Actualizar</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach($modelCliente->Listar() as $r): ?>
                  <tr>
                    <td><?php echo $r->__GET('codigo'); ?></td>
                    <td><?php echo $r->__GET('id'); ?></td>
                    <td><?php echo $r->__GET('eps'); ?></td>
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
                    <td class="btn_actualizar">
                      <a type="button" class="btn-floating btn-small waves-effect waves-light blue"><i class="mdi-editor-mode-edit"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

            <form id="form_editar" name="form_editar" action="?action=cliente_actualizar" method="post">
              <input id="codigo" name="codigo" type="hidden" />
            </form>

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

                      document.getElementById("codigo").value=seleccionada;
                      document.forms["form_editar"].submit()
                  });
              });
              </script>