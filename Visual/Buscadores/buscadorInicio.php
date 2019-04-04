<div class="buscador">
	<form action="index.php?action=inicio" method="POST">
		<div class="form-group" id="filtro_inicio">
			<label for="">Filtro de búsqueda:</label>
			<select class="form-control" name="filtro">
				<option value="apellido">Apellido</option>
				<option value="dominio">Dominio</option>
			</select>
		</div>
		<div class="form-group">
			<input class="form-control" class="form-control" name="valor" type="text" placeholder="Ingrese aquí" required>
		</div>
		<button class="btn btn-primary btnBuscar" name="btnBuscarInicio" type="submit">Buscar</button>
	</form>
</div>
	