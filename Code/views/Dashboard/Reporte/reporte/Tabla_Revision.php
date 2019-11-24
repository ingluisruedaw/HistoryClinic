<br>
<table class="pure-table pure-table-horizontal">
	<thead>
		<tr><th colspan="2" style="text-align: center;">Revisión Por Sistemas Del Paciente</th></tr>
		<tr>
	   		<th style="text-align: center;">Detalle</th>
	   		<th style="text-align: center;">Fecha</th>
	 	</tr>
	</thead>
        <?php foreach($modelRevision->Listar($_REQUEST['id']) as $r): ?>
            <tr>
                <td><?php echo $r->__GET('det'); ?></td>
                <td style="text-align: center;"><?php echo $r->__GET('fecha'); ?></td>
            </tr>
        <?php endforeach; ?>
</table>