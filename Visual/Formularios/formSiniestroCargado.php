<div class="formulario">
	<form action="index.php?action=siniestros" method="POST">
		<!-- -->
		<div class="contenedor-texto">
			<p class="text-left p-subtitulo-siniestro">DATOS ASEGURADO</p>
		</div>
		<div class="separador"></div>
		<!-- -->
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label>* N° de póliza:</label>
					<input class="form-control" type="text" name="numPoliza" value="<?php echo $siniestroBusqueda[1];?>" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Apellido: </label>
					<input class="form-control" type="text" name="apellido" value="<?php echo $siniestroBusqueda[2];?>" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Nombre: </label>
					<input class="form-control" type="text" name="nombre" value="<?php echo $siniestroBusqueda[3];?>" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Dominio:</label>
					<input class="form-control" type="text" name="dominio" value="<?php echo $siniestroBusqueda[4];?>" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Conductor: </label>
					<input class="form-control" type="text" name="conductor" value="<?php echo $siniestroBusqueda[5];?>" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Fecha Siniestro: </label>
					<input class="form-control" id="datepicker" type="text" name="fechaSiniestro" value="<?php echo date("d-m-Y",strtotime($siniestroBusqueda[12]));?>" required>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fecha de Denuncia Interna: </label>
					<input class="form-control" id="datepicker2" type="text" name="fechaDenunciaInterna" value="<?php echo date("d-m-Y",strtotime($siniestroBusqueda[13]));?>" required>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Exposición Policial: </label>
					<select class="form-control" name="exposicionPolicial">
	                    <option value="<?php echo $siniestroBusqueda[14];?>"><?php echo $siniestroBusqueda[14];?></option>
						<?php if($siniestroBusqueda[14] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotocopia DNI: </label>
					<select class="form-control" name="fotocopiaDni">
					<option value="<?php echo $siniestroBusqueda[15];?>"><?php echo $siniestroBusqueda[15];?></option>
						<?php if($siniestroBusqueda[15] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotocopia Cedula Verde: </label>
					<select class="form-control" name="fotocopiaCV">
	                    <option value="<?php echo $siniestroBusqueda[16];?>"><?php echo $siniestroBusqueda[16];?></option>
						<?php if($siniestroBusqueda[16] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotocopia Carnet Conductor: </label>
					<select class="form-control" name="fotocopiaCC">
	                    <option value="<?php echo $siniestroBusqueda[17];?>"><?php echo $siniestroBusqueda[17];?></option>
						<?php if($siniestroBusqueda[17] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotocopia VTV: </label>
					<select class="form-control" name="fotocopiaVTV">
	                    <option value="<?php echo $siniestroBusqueda[18];?>"><?php echo $siniestroBusqueda[18];?></option>
					<?php if($siniestroBusqueda[18] == "NO"){ ?>
								<option value="1">SI</option>
					<?php  }else{ ?>
								<option value="0">NO</option>
					<?php  } ?>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotos Asegurado: </label>
					<select class="form-control" name="fotosAsegurado">
	                    <option value="<?php echo $siniestroBusqueda[19];?>"><?php echo $siniestroBusqueda[19];?></option>
						<?php if($siniestroBusqueda[19] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Otros (Informe de transito): </label>
					<select class="form-control" name="otros">
	                    <option value="<?php echo $siniestroBusqueda[20];?>"><?php echo $siniestroBusqueda[20];?></option>
						<?php if($siniestroBusqueda[20] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
		</div>
		<!-- -->
		<div class="contenedor-texto">
			<p class="text-left p-subtitulo-siniestro">DATOS TERCERO</p>
		</div>
		<div class="separador"></div>
		<!-- -->
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Tercero:</label>
					<input class="form-control" type="text" name="terceroUno" value="<?php echo $siniestroBusqueda[6];?>" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Dominio Tercero:</label>
					<input class="form-control" type="text" name="dominioUno" value="<?php echo $siniestroBusqueda[7];?>" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Conductor Tercero:</label>
					<input class="form-control" type="text" name="conductorUno" value="<?php echo $siniestroBusqueda[8];?>" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Tercero (2):</label>
					<input class="form-control" type="text" value="<?php echo $siniestroBusqueda[9];?>" name="terceroDos">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Dominio (2):</label>
					<input class="form-control" type="text" value="<?php echo $siniestroBusqueda[10];?>" name="dominioDos">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Conductor (2):</label>
					<input class="form-control" type="text" value="<?php echo $siniestroBusqueda[11];?>" name="conductorDos">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Fecha Reclamo 3°</label>
					<input class="form-control" id="datepicker3" type="text" value="<?php echo date("d-m-Y",strtotime($siniestroBusqueda[21]));?>" name="fechaReclamoTercero">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Exposición Policial 3°: </label>
					<select class="form-control" name="exposicionPolicialTercero">
	                    <option value="<?php echo $siniestroBusqueda[22];?>"><?php echo $siniestroBusqueda[22];?></option>
						<?php if($siniestroBusqueda[22] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotocopia Cedula Verde 3°: </label>
					<select class="form-control" name="fotocopiaCVTercero">
	                    <option value="<?php echo $siniestroBusqueda[23];?>"><?php echo $siniestroBusqueda[23];?></option>
						<?php if($siniestroBusqueda[23] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotocopia Carnet Cond. 3°: </label>
					<select class="form-control" name="fotocopiaCCTercero">
	                    <option value="<?php echo $siniestroBusqueda[24];?>"><?php echo $siniestroBusqueda[24];?></option>
						<?php if($siniestroBusqueda[24] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Boleto Compra: </label>
					<select class="form-control" name="boletoCompra">
	                    <option value="<?php echo $siniestroBusqueda[25];?>"><?php echo $siniestroBusqueda[25];?></option>
						<?php if($siniestroBusqueda[25] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Certificado de Cobertura: </label>
					<select class="form-control" name="certificadoCobertura">
	                    <option value="<?php echo $siniestroBusqueda[26];?>"><?php echo $siniestroBusqueda[26];?></option>
						<?php if($siniestroBusqueda[26] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Denuncia Administrativa: </label>
					<select class="form-control" name="denunciaAdministrativa">
	                    <option value="<?php echo $siniestroBusqueda[27];?>"><?php echo $siniestroBusqueda[27];?></option>
						<?php if($siniestroBusqueda[27] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="form-group">
					<label>Cant. de Fotos 3°:</label>
					<input class="form-control" type="numeric" value="<?php echo $siniestroBusqueda[28];?>" name="fotosCantTercero">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Presupuesto:</label>
					<input class="form-control" type="numeric" value="<?php echo $siniestroBusqueda[29];?>" name="presupuesto">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Presupuesto (2):</label>
					<input class="form-control" type="numeric" value="<?php echo $siniestroBusqueda[30];?>" name="presupuestoDos">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Total Presupuesto:</label>
					<input class="form-control" type="numeric" value="<?php echo $siniestroBusqueda[31];?>" name="totalPresupuesto">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Gástos Médicos:</label>
					<input class="form-control" type="numeric" value="<?php echo $siniestroBusqueda[32];?>" name="gastosMedicos">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Informe Médico: </label>
					<select class="form-control" name="informeMedico">
	                    <option value="<?php echo $siniestroBusqueda[33];?>"><?php echo $siniestroBusqueda[33];?></option>
						<?php if($siniestroBusqueda[33] == "NO"){ ?>
									<option value="1">SI</option>
						<?php }else{ ?>
									<option value="0">NO</option>
						<?php } ?>
	                </select>
				</div>
			</div>
		</div>
		<!-- -->
		<div class="contenedor-texto">
			<p class="text-left p-subtitulo-siniestro">DATOS COMPAÑIA</p>
		</div>
		<div class="separador"></div>
		<!-- -->
		<div class="row">
			<div class="col-lg-3">
				<div class="form-group">
					<label>Fecha Envío Denuncia Interna:</label>
					<input class="form-control" id="datepicker4" type="text" value="<?php echo date("d-m-Y",strtotime($siniestroBusqueda[34]));?>" name="fechaEnvioDI">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Fecha Envío Reclamo Tercero:</label>
					<input class="form-control" id="datepicker5" type="text" value="<?php echo date("d-m-Y",strtotime($siniestroBusqueda[35]));?>" name="fechaEnvioRT">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Fecha Dictámen:</label>
					<input class="form-control" id="datepicker6" type="text" value="<?php echo date("d-m-Y",strtotime($siniestroBusqueda[36]));?>" name="fechaDictamen">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Ofrecimiento:</label>
					<input class="form-control" type="numeric" value="<?php echo $siniestroBusqueda[37];?>" name="ofrecimiento">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Vencimiento Reclamo:</label>
					<input class="form-control" id="datepicker7" type="text" value="<?php echo date("d-m-Y",strtotime($siniestroBusqueda[38]));?>" name="reclamoVence">
				</div>
			</div>
			<div class="col-lg-9">
				<div class="form-group">
					<label>Dictámen:</label>
					<textarea class="form-control" rows="3" value="<?php echo $siniestroBusqueda[39];?>" name="dictamen"></textarea>
				</div>
			</div>
		</div>
		<div class="col-lg-12 grupo-btn">
			<div class="caja-externa-boton">
				<div class="caja-boton-uno">
					<button class="btn btn-success boton" name="btnModificarSiniestro" value="<?php echo $siniestroBusqueda[0];?>" type="submit" >Modificar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</form>
	<form action="index.php?action=inicio" method="POST">
		<div class="caja-boton-dos">
			<button class="btn btn-default boton" name="btnSalir" type="submit" >Ir a Inicio<i class="fa fa-home icono-boton" aria-hidden="true"></i></button>
		</div>
	</form>
</div>