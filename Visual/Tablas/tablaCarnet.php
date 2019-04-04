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
				if(empty($carnetCliente)){
					?>
						<div class="alert alert-danger mensaje" role="alert">
			                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			                <span class="sr-only">Error:</span>No se ha encontrado ningún registro.
			            </div>
					<?php
				}else{
					?>
						<tbody class="tabla">
				        	<tr>
				        		<td class='text-left fila'><?php echo $carnetCliente[0];?></td>
				        		<td class='text-left fila'><?php echo $carnetCliente[1];?>, <?php echo $carnetCliente[2];?></td>
				        		<td class='text-right'>
				        			<form action="index.php?action=impresion_carnet" method="POST">
				        				<button class='btn btn-info' value="<?php echo $carnetCliente[0];?>" name='btnVer' type="submit" title='Ver'>
										<span class='glyphicon glyphicon-eye-open'></span>
										</button>
										<button class='btn btn-info' value="<?php echo $carnetCliente[0];?>" name='btnDescargar' type="submit" title='Descargar'>
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