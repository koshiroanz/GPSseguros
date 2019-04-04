<div class="buscador">
	<form action="index.php?action=pedidos" method="POST">
		<div class="form-group" id="filtro">
			<label for="">Filtro de búsqueda:</label>
			<select class="form-control" name="filtro">
				<option value="dominio">Dominio</option>
				<option value="apellido">Apellido</option>
			</select>
		</div>
		<div class="form-group">
			<input class="form-control" class="form-control" name="valor" id="input" type="text" placeholder="Ingrese aquí" required>
		</div>
		<button class="btn btn-primary btnBuscar" name="btnBuscarPedido" type="submit">Buscar</button>
	</form>
</div>
	