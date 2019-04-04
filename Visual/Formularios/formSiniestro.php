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
					<input class="form-control" type="text" name="numPoliza" placeholder="N° Poliza" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Apellido: </label>
					<input class="form-control" type="text" name="apellido" placeholder="apellido" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Nombre: </label>
					<input class="form-control" type="text" name="nombre" placeholder="nombre" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Dominio:</label>
					<input class="form-control" type="text" name="dominio" placeholder="Dominio" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Conductor: </label>
					<input class="form-control" type="text" name="conductor" placeholder="Conductor" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Fecha Siniestro: </label>
					<input class="form-control" id="datepicker" type="text" name="fechaSiniestro" placeholder="Haz click aquí" required>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fecha de Denuncia Interna: </label>
					<input class="form-control" id="datepicker2" type="text" name="fechaDenunciaInterna" placeholder="Haz click aquí" required>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Exposición Policial: </label>
					<select class="form-control" name="exposicionPolicial" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotocopia DNI: </label>
					<select class="form-control" name="fotocopiaDni" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotocopia Cedula Verde: </label>
					<select class="form-control" name="fotocopiaCV" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotocopia Carnet Conductor: </label>
					<select class="form-control" name="fotocopiaCC" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotocopia VTV: </label>
					<select class="form-control" name="fotocopiaVTV" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotos Asegurado: </label>
					<select class="form-control" name="fotosAsegurado" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Otros (Informe de transito): </label>
					<select class="form-control" name="otros" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
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
					<input class="form-control" type="text" name="terceroUno" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Dominio Tercero:</label>
					<input class="form-control" type="text" name="dominioUno" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>* Conductor Tercero:</label>
					<input class="form-control" type="text" name="conductorUno" required>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Tercero (2):</label>
					<input class="form-control" type="text" name="terceroDos">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Dominio (2):</label>
					<input class="form-control" type="text" name="dominioDos">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Conductor (2):</label>
					<input class="form-control" type="text" name="conductorDos">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Fecha Reclamo 3°</label>
					<input class="form-control" id="datepicker3" type="text" name="fechaReclamoTercero">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Exposición Policial 3°: </label>
					<select class="form-control" name="exposicionPolicialTercero" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotocopia Cedula Verde 3°: </label>
					<select class="form-control" name="fotocopiaCVTercero" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Fotocopia Carnet Cond. 3°: </label>
					<select class="form-control" name="fotocopiaCCTercero" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Boleto Compra: </label>
					<select class="form-control" name="boletoCompra" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Certificado de Cobertura: </label>
					<select class="form-control" name="certificadoCobertura" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Denuncia Administrativa: </label>
					<select class="form-control" name="denunciaAdministrativa" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
	                </select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Cant. de Fotos 3°:</label>
					<input class="form-control" type="numeric" name="fotosCantTercero">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Presupuesto:</label>
					<input class="form-control" type="numeric" name="presupuesto">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Presupuesto (2):</label>
					<input class="form-control" type="numeric" name="presupuestoDos">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Total Presupuesto:</label>
					<input class="form-control" type="numeric" name="totalPresupuesto">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Gástos Médicos:</label>
					<input class="form-control" type="numeric" name="gastosMedicos">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>* Informe Médico: </label>
					<select class="form-control" name="informeMedico" required>
	                    <option value="">Opciones</option>
	                    <option value="1">SI</option>
	                    <option value="0">NO</option>
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
					<input class="form-control" id="datepicker4" type="text" name="fechaEnvioDI">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Fecha Envío Reclamo Tercero:</label>
					<input class="form-control" id="datepicker5" type="text" name="fechaEnvioRT">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Fecha Dictámen:</label>
					<input class="form-control" id="datepicker6" type="text" name="fechaDictamen">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Ofrecimiento:</label>
					<input class="form-control" type="numeric" name="ofrecimiento">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<label>Vencimiento Reclamo:</label>
					<input class="form-control" id="datepicker7" type="text" name="reclamoVence">
				</div>
			</div>
			<div class="col-lg-9">
				<div class="form-group">
					<label>Dictámen:</label>
					<textarea class="form-control" rows="3" name="dictamen"></textarea>
				</div>
			</div>
		</div>
		<div class="col-lg-12 grupo-btn">
			<div class="caja-externa-boton">
				<div class="caja-boton-uno">
					<button class="btn btn-success boton" name="btnAltaSiniestro" type="submit">Aceptar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
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