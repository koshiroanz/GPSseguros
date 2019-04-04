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
	 ?>
	<div class="table-responsive" style="margin-top:10px">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-left fila">Dni</th>
                    <th class="text-left fila">Apellido</th>
                    <th class="text-left fila">Nombre</th>
                    <th class="text-left fila">Estado</th>
                    <th class="text-left fila">CUIT</th>
                    <th class="text-left fila">Tel&eacute;fono</th>
                    <th class="text-left fila">Direcci&oacute;n</th>
                    <th class="text-center fila">Opci&oacute;n</th>
                </tr>
            </thead>
            <tbody class="tabla">
                <?php
                if(!empty($arrayTabla)){
                    foreach ($arrayTabla as $tabla):
                ?>
                    <tr>
                        <td class="text-left fila"><?php echo $tabla['dni'];?></td>
                        <td class="text-left fila"><?php echo $tabla['apellido'];?></td>
                        <td class="text-left fila"><?php echo $tabla['nombre'];?></td>
                        <td class="text-left fila"><?php echo $tabla['polEstado'];?></td>
                        <td class="text-left fila"><?php echo $tabla['cuit'];?></td>
                        <td class="text-left fila"><?php echo $tabla['telefono'];?></td>
                        <td class="text-left fila"><?php echo $tabla['direccion'];?></td>
                        <td class="text-right fila">
                            <form class="form-col-1" action="index.php?action=editar_cliente" method="POST">
                                <button class='btn btn-warning' value="<?php echo $tabla['id'];?>" name='buscarCliente' type="submit" title='Ya se encuentra seleccionado' disabled>
                                    <span class='glyphicon glyphicon-pencil'></span>
                                </button>
                            </form>
                            <form class="form-col-2" action="index.php?action=clientes" method="POST">
                                <button class='btn btn-danger' value="<?php echo $tabla['id'];?>" name='btnEliminarCliente' type="submit" title='Eliminar' <?php echo $eliminar; ?>>
                                    <span class='glyphicon glyphicon-trash'></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                    endforeach
                ?>
            <?php
                }else{
            ?>
                    <div class="alert alert-danger" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only">Error:</span>
                      No se ha encontrado ningún registro de Cliente.
                    </div>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
	<form action="index.php?action=clientes" method="POST">		<!-- cambie actio=agregar_cliente por accion_cliente-->
		<div class="col-lg-4">
			<div class="form-group">
				<label for="">Dni: </label>
				<input class="form-control" name="dni" value="<?php echo $tabla['dni'];?>" type="text" placeholder="DNI" required>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
	        	<label for="">Apellido: </label>
				<input class="form-control" name="apellido" value="<?php echo $tabla['apellido'];?>" type="text" placeholder="Apellido">
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label for="">Nombre: </label>
				<input class="form-control" name="nombre" value="<?php echo $tabla['nombre'];?>" type="text" placeholder="Nombre">
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label for="">Fecha de Nacimiento: </label>
				<input class="form-control" id="datepicker" name="fechaNac" value="<?php echo date("d-m-Y",strtotime($tabla['fechaNac']));?>" type="text" placeholder="Fecha de Nacimiento">
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label for="">Tel&eacute;fono: </label>
				<input class="form-control" name="telefono" value="<?php echo $tabla['telefono'];?>" type="text" placeholder="N° de Tel&ecute;fono">
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label for="">CUIT: </label>
				<input class="form-control" name="cuit" value="<?php echo $tabla['cuit'];?>" type="text" placeholder="N° de C.U.I.T.">
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
				<label for="">Estado Civil: </label>
				<select class="form-control" value="estadoCivil" name="estadoCivil">
					<?php 
						switch($tabla['estadoCivil']){
							case 'SOLTERO/A':
					?>
								<option value='SOLTERO/A'><?php echo $tabla['estadoCivil'];?></option>
								<option value='CASADO/A'>CASADO/A</option>
								<option value='VIUDO/A'>VIUDO/A</option>
			  					<option value='DIVORCIADO/A'>DIVORCIADO/A</option>
  					<?php  
								break;
							case 'CASADO/A':
					?>
								<option value='CASADO/A'><?php echo $tabla['estadoCivil'];?></option>
								<option value='VIUDO/A'>VIUDO/A</option>
								<option value='DIVORCIADO/A'>DIVORCIADO/A</option>
								<option value='SOLTERO/A'>SOLTERO/A</option>
  					<?php
  								break;
							case 'VIUDO/A':
					?>
								<option value='VIUDO/A'><?php echo $tabla['estadoCivil'];?></option>
								<option value='CASADO/A'>CASADO/A</option>
			  					<option value='DIVORCIADO/A'>DIVORCIADO/A</option>
			  					<option value='SOLTERO/A'>SOLTERO/A</option>
  					<?php
  								break;
							case 'SEPARADO/A':
					?>
								<option value='DIVORCIADO/A'><?php echo $tabla['estadoCivil'];?></option>
								<option value='CASADO/A'>CASADO/A</option>
			  					<option value='VIUDO/A'>VIUDO/A</option>
			  					<option value='SOLTERO/A'>SOLTERO/A</option>
  					<?php
							default:
					?>
								<option value='<?php echo $tabla['estadoCivil'];?>'><?php echo $tabla['estadoCivil'];?></option>
					  			<option value='SOLTERO/A'>SOLTERO/A</option>
					  			<option value='CASADO/A'>CASADO/A</option>
					  			<option value='DIVORCIADO/A'>DIVORCIADO/A</option>
					  			<option value='VIUDO/A'>VIUDO/A</option>
		  			<?php
								break;
						}
					?>
					
				</select>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
	        	<label for="">Direcci&oacute;n: </label>
				<input class="form-control" name="direccion" value="<?php echo $tabla['direccion'];?>" type="text" placeholder="Direcci&oacute;n">
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
				<label for="">Ciudad: </label>
				<input class="form-control" name="ciudad" value="<?php echo $tabla['ciudad'];?>" type="text" placeholder="Ciudad">
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
				<label for="">Provincia: </label>
				<input class="form-control" name="provincia" value="<?php echo $tabla['provincia'];?>" type="text" placeholder="Provincia">
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label for="">Fecha Baja: </label>
				<input class="form-control" name="fechaBaja" value="<?php echo date("d-m-Y",strtotime($tabla['fechaBaja']));?>" type="text" placeholder="Fecha Baja">
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label for="">Productor: </label>
				<select class="form-control" name="productor">
                    <option value="<?php echo $tabla['idProductor'];?>" name="productor"><?php echo $tabla['ape'];?>, <?php echo $tabla['nom'];?></option>
                    <?php 
                        foreach ($arrayProductor as $productor):
                        	if($productor['id'] != $tabla['idProductor']){
            		?>
								<option value="<?php echo $productor['id'];?>" name="productor"><?php echo $productor['apellido'];?>, <?php echo $productor['nombre'];?></option>
					<?php
                        	}
                        endforeach;
                    ?>
                </select>
			</div>
		</div>
		<div class="col-lg-12 grupo-btn">
			<div class="caja-externa-boton">
				<div class="caja-boton-uno">
					<button class="btn btn-success boton" name="btnModificarCliente" value="<?php echo $tabla['id'];?>" type="submit">Aceptar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
				</div>
				<div class="caja-boton-dos">
					<button class="btn btn-danger boton" name="btnCancelar" value="" type="submit">Cancelar<i class="fa fa-times icono-boton" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</form>
</div>