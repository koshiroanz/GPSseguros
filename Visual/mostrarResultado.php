<div class="formulario">

	<div class="contenedor-texto contenedor-subtitulo">
		<p class="text-left subtitulo">DATOS</p>
	</div>
	<div class="separador"></div>

	<div class="table-responsive">
		
		<table class="table">
		  	<thead>
			    <tr>
			      <th class="text-left fila">N° Recibo</th>
			      <th class="text-left fila">Cuota</th>
			      <th class="text-left fila">Importe</th>
			      <th class="text-left fila">Fecha</th>
			      <th class="text-left fila">Vencimiento</th>
			      <th class="text-left fila">N° Grua</th>
			      <th class="text-left fila">Importe Grua</th>
			    </tr>
		  	</thead>
		  	<?php
		  		$habilitarBtnPoliza = 'enabled';
	  			$habilitarBtnPago = 'enabled';
		  		if(empty($clienteBusqueda)){
		  			$habilitarBtnPoliza = 'disabled';
		  			$habilitarBtnPago = 'disabled';
  			?>
					<div class="alert alert-danger mensaje" role="alert">
		                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		                <span class="sr-only">Error:</span>No se ha encontrado ninguna Póliza.
		            </div>
  			<?php  
		  		}else if(empty($pagoBusqueda)){
		  			$habilitarBtnPago = 'disabled';
		  			$habilitarBtnPoliza = 'disabled';
  			?>
	  				<div class="alert alert-danger mensaje" role="alert">
		                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		                <span class="sr-only">Error:</span>No se ha encontrado ningún Pago.
		            </div>
        	<?php
	            }else{
        	?>
				<tbody>
			  		<?php
			  			foreach($pagoBusqueda as $res){
		            ?>
				  			<tr>
								<td class="text-left fila"><?php echo $res['numRecibo'];?></td>
								<td class="text-left fila"><?php echo $res['numCuota'];?></td>
								<td class="text-left fila"><?php echo $res['importe'];?></td>
								<td class="text-left fila"><?php echo $res['fecha'];?></td>
								<td class="text-left fila"><?php //echo $pago->;?></td>
								<td class="text-left fila"><?php echo $res['reciboGrua'];?></td>
								<td class="text-left fila"><?php echo $res['importeGrua'];?></td>
							</tr>
					<?php   
		               	}
	            }
        	?>
			  	</tbody>
		</table>
	</div>
	<div class="form-group col-xs-12 col-md-6 col-lg-6">
		<label for="">Apellido: </label>
	    <div class="alert alert-success" role="alert"><?php echo $clienteBusqueda[0];?></div>
	</div>
	<div class="form-group col-xs-12 col-md-6 col-lg-6">
		<label for="">Nombre: </label>
	    <div class="alert alert-success" role="alert"><?php echo $clienteBusqueda[1];?></div>
	</div>
	<div class="form-group col-xs-12 col-md-6 col-lg-6">
		<label for="">Dominio: </label>
	    <div class="alert alert-success" role="alert"><?php echo $clienteBusqueda[2];?></div>
	</div>
	<div class="form-group col-xs-12 col-md-6 col-lg-6">
		<label for="">Estado: </label>
	    <div class="alert alert-success" role="alert"><?php echo $clienteBusqueda[3];?></div>
	</div>
	<div class="form-group col-xs-12 col-md-12 col-lg-6">
		<label for="">Número Poliza: </label>
	    <div class="alert alert-success" role="alert"><?php echo $clienteBusqueda[4];?></div>
	</div>
	<div class="col-sm-12 col-md-12 col-lg-12 grupo-btn">
		<!-- <div class="caja-externa-boton"> -->
			<div class="col-sm-6 col-md-3 col-lg-3" style="margin-top:10px !important;">
				<form action="index.php?action=editar_cliente" method="POST">
					<button class="btn btn-default" value="<?php echo $clienteBusqueda[5];?>" name="editar_cliente" type="submit">Ir a Cliente<i class="fa fa-user-circle icono-boton" aria-hidden="true"></i></button>
				</form>
			</div>

			<div class="col-sm-6 col-md-3 col-lg-3" style="margin-top:10px !important;">
				<form action="index.php?action=accion_vehiculo" method="POST">
					<button class="btn btn-default" value="<?php echo $clienteBusqueda[7];?>" name="buscar_vehiculo" type="submit">Ir a Veh&iacute;culo<i class="fa fa-car icono-boton" aria-hidden="true"></i></button>
				</form>
			</div>
			
			<div class="col-sm-6 col-md-3 col-lg-3" style="margin-top:10px !important;">
				<form action="index.php?action=accion_poliza" method="POST">
					<button class="btn btn-default" value="<?php echo $clienteBusqueda[6];?>" name="buscar_poliza" type="submit" <?php echo $habilitarBtnPoliza; ?>>Ir a P&oacute;liza<i class="fa fa-id-card-o icono-boton" aria-hidden="true"></i></button>
				</form>
			</div>
			
			<div class="col-sm-6 col-md-3 col-lg-3" style="margin-top:10px !important;">
				<form action="index.php?action=pagos" method="POST">
					<button class="btn btn-default" value="<?php echo $clienteBusqueda[7];?>" name="cargarPago" type="submit" <?php echo $habilitarBtnPago; ?>>Ir a Pago<i class="fa fa-money icono-boton" aria-hidden="true"></i></button>
				</form>
			</div>
			
		<!-- </div> -->
	</div>
			
</div>