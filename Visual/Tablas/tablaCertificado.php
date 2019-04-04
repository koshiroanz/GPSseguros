<div class="formulario">
	<div class="table-responsive">
		<table class="table">
		  	<thead>
			    <tr>
			      <th class="fila" title="ID">Dominio</th>
			      <th class="fila">Cliente</th>
			      <th class="text-center fila">Opciones</th>
			    </tr>
		  	</thead>
			<?php
				if(empty($certificadoCliente)){
					?>
						<div class="alert alert-danger mensaje" role="alert">
			                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			                <span class="sr-only">Error:</span>No se ha encontrado ningún registro.
			            </div>
					<?php
				}else{
					?>
						<tbody id="tabla_certificado">
				        	<tr>
				        		<td class="text-left fila"><?php echo $certificadoCliente[0];?></td>
				        		<td class="text-left fila"><?php echo $certificadoCliente[1];?>, <?php echo $certificadoCliente[2];?></td>
				        		<td class="text-right">
				        			<form action="index.php?action=impresion_certificado" method="POST">
				        				<button class='btn btn-info' value="<?php echo $certificadoCliente[0];?>" name='btnVer' type="submit" title='Ver'>
										<span class='glyphicon glyphicon-eye-open'></span>
										</button>
										<button class='btn btn-info' value="<?php echo $certificadoCliente[0];?>" name='btnDescargar' type="submit" title='Descargar'>
											<span class='glyphicon glyphicon-download'></span>
										</button>
				        			</form>
				        		</td>
				        	</tr>
					  	</tbody>
					<?php
				}
			 ?>
		</table>
	</div>
</div>