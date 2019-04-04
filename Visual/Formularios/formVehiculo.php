<div class="formulario">
	<?php
        if($_SESSION['privilegio'] == 1){
            $modificar = 'disabled';
            $eliminar = 'disabled';
        }else if($_SESSION['privilegio'] == 2){
        	$modificar = '';
            $eliminar = 'disabled';
        }else{
        	$modificar = '';
        	$eliminar = '';
        }

        if((!$hayBusqueda)||(empty($arrayTabla))){ //Si no encuentra el vehículo buscado, mostrar mensaje.
    ?>
            <div class="alert alert-danger mensaje" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>No se ha encontrado ningún registro de Vehículo.
            </div>
    <?php
        }
    ?>
	<div class="table-responsive" style="margin-top:10px">
        <table class="table">
	      	<thead>
		        <tr>
		          	<th class="text-left fila">Dominio</th>
		          	<th class="text-left fila">Propietario</th>
	              	<th class="text-left fila">Carrocer&iacute;a</th>
	              	<th class="text-center fila">Opci&oacute;n</th>
		        </tr>
	      	</thead>
	      	<tbody class="tabla">
            	<?php
            		if(!empty($arrayTabla)){
            			foreach ($arrayTabla as $tabla){
    			?>
		    				<tr>
		        				<td class="text-left fila"><?php echo $tabla['dominio'];?></td>
		        				<td class="text-left fila"><?php echo $tabla['apellido'].' '.$tabla['nom'];?></td>
		    					<td class="text-left fila"><?php echo $tabla['nombre'];?></td>
		    					<td class="text-right fila">
		    						<form class="form-col-1" action="index.php?action=accion_vehiculo" method="POST">
				        				<button class='btn btn-warning' value="<?php echo $tabla['id'];?>" name='buscar_vehiculo' type="submit" title='Editar' <?php echo $modificar; ?>>
											<span class='glyphicon glyphicon-pencil'></span>
										</button>
									</form>
									<form class="form-col-2" action="index.php?action=vehiculos" method="POST">
										<button class='btn btn-danger' value="<?php echo $tabla['id'];?>" name='btnEliminarVehiculo' type="submit" title='Eliminar' <?php echo $eliminar; ?>>
		                                    <span class='glyphicon glyphicon-trash'></span>
		                                </button>
									</form>
								</td>
		    				</tr>
    			<?php
            			}
        			}
    			?>
	      	</tbody>
	  	</table>
	</div>
	<form action="index.php?action=vehiculos" enctype='multipart/form-data' method="POST">
		<div class="col-lg-4">
			<div class="form-group">
				<label>Dominio: </label>
				<input class="form-control" type="text" name="dominio" placeholder="Dominio" required>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group select_marca">
				<label>Marca: </label>
				<select class="form-control" name="marca" id="select_marca">
					<option value="" name="marca"> Seleccione una opci&oacute;n... </option>
					<?php
						foreach ($arrayMarca as $marcas){
					?>
							<option value="<?php echo $marcas['id'];?>" name="marca"><?php echo $marcas['nombre'];?></option>
					<?php 
						}
					?>
				</select>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group select_modelo">
				<label>Modelo: </label>
				<select class="form-control" name="modelo" id="select_modelo">
					<option> Seleccione una opción... </option>
				</select>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group select_carroceria">
				<label>Carrocer&iacute;a: </label>
				<select class="form-control" name="carroceria" id="select_carroceria">
					<option value="" name="marca"> Seleccione una opci&oacute;n... </option>
				</select>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label>Año: </label>
				<input class="form-control" type="text" name="anio" placeholder="Ej: AAAA" required>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label>Chasis: </label>
				<input class="form-control" type="text" name="chasis" placeholder="Chasis" required>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label>Motor: </label>
				<input class="form-control" type="text" name="motor" placeholder="Motor" required>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label>Valor: </label>
				<input class="form-control" type="text" name="valor" placeholder="$" required>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label>Propietario: </label>
				<select class="form-control" name="cliente">
					<?php
						if(isset($_POST['cliente'])){

					?>
							<option value="<?php echo $_POST['cliente'][0];?>" name="cliente"><?php echo $_POST['cliente'][1];?> <?php echo $_POST['cliente'][2];?> / <?php echo $_POST['cliente'][3];?></option>
					<?php
						}else{
							foreach ($arrayPropietario as $clientes){
					?>
								<option value="<?php echo $clientes['id'];?>" name="cliente"><?php echo $clientes['apellido'];?> <?php echo $clientes['nombre'];?> / <?php echo $clientes['dni'];?></option>
					<?php 
							}
						}
					?>
				</select>
			</div>
		</div>
		<!--
		<div class="col-lg-8">
			<div class='form-group'>
				<label>Imagen</label>
				<input class='form-control' name='archivo' type='file' multiple="multiple">
			</div>
		</div>
		-->
		<div class="col-lg-12 grupo-btn">
			<div class="caja-externa-boton">
				<div class="caja-boton-uno">
					<button class="btn btn-success boton" name="btnAltaVehiculo" type="submit">Aceptar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</form>
	<form action="index.php" method="POST">
        <div class="caja-boton-dos">
            <button class="btn btn-default boton" name="btnSalir" type="">Ir a Inicio<i class="fa fa-home icono-boton" aria-hidden="true"></i></button>
        </div>  
    </form>
</div>