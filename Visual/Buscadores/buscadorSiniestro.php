<div class="buscador">
	<form action="index.php?action=buscarSiniestro" method="POST">
		<div class="form-group" id="filtroInicio">
			<label for="">Filtro de búsqueda:</label>
			<select class="form-control" name="filtro">
				<option value="apellido">Apellido</option>
				<option value="dominio">Dominio</option>
			</select>
		</div>
		<div class="form-group">
			<input class="form-control" class="form-control" name="buscarSiniestro" id="" type="text" placeholder="Ingrese aquí" required>
		</div>
		<button class="btn btn-primary btnBuscar" name="btnBuscarSiniestro" type="submit">Buscar</button>
	</form>
</div>